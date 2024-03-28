<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataRequest;
use App\Http\Requests\UserRequest;
use App\Models\Departement;
use App\Models\Donnee_Personnelle;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
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
    return view('index',compact('data','nbrAdmin','nbrGestionnaire','nbrUtilisateur','nbrDepartement'));
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
}
