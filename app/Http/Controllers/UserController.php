<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataRequest;
use App\Http\Requests\UserRequest;
use App\Models\CongeAbsence;
use App\Models\Departement;
use App\Models\Donnee_Personnelle;
use App\Models\User;
use Exception;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

  public function connexion()
  {
    return view('auth.login');
  }
  public function index_view()
  {
    $nbrDepartement = Departement::count();
    $nbrAdmin = User::where('profil','admin')->count();
    $nbrGestionnaire = User::where('profil','admin')->count();
    $nbrUtilisateur = User::where('profil','admin')->count();
    $agent= User::count();
    $agentCDI = User::with(['donnee_professionnelle', 'donnee_professionnelle.contrat'])
                 ->whereHas('donnee_professionnelle.contrat', function ($query) {
                     $query->where('type_contrat', 'CDI');
                 })->count();

    $agentCDD = User::with(['donnee_professionnelle', 'donnee_professionnelle.contrat'])
                ->whereHas('donnee_professionnelle.contrat', function ($query) {
                $query->where('type_contrat', 'CDD');
                })->count();  
    $agentPresta = User::with(['donnee_professionnelle', 'donnee_professionnelle.contrat'])
                ->whereHas('donnee_professionnelle.contrat', function ($query) {
                $query->where('type_contrat', 'Prestation_Service');
                })->count();            
                
    $data = [
      'labels' => ['Nombre d\'agent ', 'Nombre d\'agent CDI', 'Nombre d\'agent CDD', 'Nombre d\'agent Prestataire de service'],
      'data' => [$agent, $agentCDI, $agentCDD, $agentPresta],
  ];
  $nbrnotification = CongeAbsence::where('lu',0)->Count();
    return view('index',compact('data','nbrAdmin','nbrGestionnaire','nbrUtilisateur','nbrDepartement','nbrnotification'));
  }

  public function index()
  {
    $admin = User::where('profil','admin')->paginate(5);
  
    return view('admin.index',compact('admin'));
  }

  public function index_gestio()
  {
    $gestionnaires = User::where('profil','gestionnaire')->with('donnee_personnelle')->paginate(6);
    return view('gestionnaire.index',compact('gestionnaires'));
  }

  public function index_utilisateur()
  {
    $utilisateurs = User::where('profil','utilisateur')->with('donnee_personnelle')->paginate(6);
    return view('utilisateur.index',compact('utilisateurs'));
  }
    public $userId = 0;
    
    public function create_user(){
        // Recuperation des departements
        $departements = Departement::all();

        return view('admin.create_user',compact('departements'));
    }

    public function create_data(){
        
        return view('admin.create_data');
    }

    public function delete(User $gestionnaire)
    {
           $sup = $gestionnaire->delete();
           return back();
    }

    public function deleteAdmin(User $admin)
    {
           $sup = $admin->delete();
           return back();
    }

    public function deleteUtilisateur(User $utilisateur)
    {
           $sup = $utilisateur->delete();
           return back();
    }
    

    public function store_user(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
        $this->userId = $user->id;
        
        return view('admin.create_data')->with('userId',$this->userId);
    }

    public function store_data(UserDataRequest $request)
    {   
        
      try {
        $data = $request->validated();
        $data['user_id'] = $request->user_id;
        Donnee_Personnelle::create($data);
        $this->userId = $request->user_id;
      } catch (Exception $e) {
        dd($e);
      }
      
      return view('admin.create_contrat')->with('user',$this->userId);
    }

    public function login(Request $request)
    {
      $dataForm = $request->only(['email','password']);
        
        if (Auth::attempt($dataForm)) {
            return redirect()->route('index.view');
        }else{
            return back()->with('error','Parametre de connexion non reconuue');
        }
    }

    public function compte()
    {
      $user = Auth::user();
      return view('auth.compte',compact('user'));
    }

    public function updatePassword(Request $request){
      $request->validate([
        'old_password' => 'required',
        'new_password' => 'required',
      ]);

      $user = Auth::user();
      if(!Hash::check($request->old_password, $user->password)){
        return back()->with('error','l\'ancien mot de passe est incorrect');
      }

      $user->password = Hash::make($request->new_password);
      $user->save();
      return back()->with('success', 'Mot de passe mis à jour avec succès.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function demande()
    {
      $user  = Auth::user();
      return view('congeAbsence.create',compact('user'));
    }
    public function notifications()
    {
      $nbrnotification = CongeAbsence::where('lu',0)->Count();
      $notifications  = CongeAbsence::where('lu',0)->paginate(4);
      return view('notifications.index',compact('notifications','nbrnotification'));
    }

    public function storeDemande(Request $request)
    {
      $data  = $request->validate([
        'type' => 'required',
        'date_debut' => 'required',
        'date_fin' => 'required',
        'motif' => 'required'
      ]);

      $data['user_id'] = $request->user_id;
      $data['statut'] = 'en_attente';
      $data['lu'] = 0;

      CongeAbsence::create($data);

      return redirect('/index');
    }

    public function updateNotifications(CongeAbsence $notification)
    {
      $notification->lu = 1;
      $notification->statut = "approuvee";
      $notification->save();
      return redirect('/notifications');
    }

    public function liste_des_demandes()
    {
      $user = Auth::user()->id;
      $demandeConges  = CongeAbsence::where('user_id',$user)->where('type','conges')->latest()->paginate(5);
      $demandeAbsence  = CongeAbsence::where('user_id',$user)->where('type','absence')->latest()->paginate(5);
      return view('congeAbsence.mes_demandes',compact('demandeConges','demandeAbsence'));
    }
}
