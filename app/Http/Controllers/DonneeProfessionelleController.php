<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataProRequest;
use App\Models\Departement;
use App\Models\Document;
use App\Models\Donnee_Professionelle;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DonneeProfessionelleController extends Controller
{
    public function create_dataPro()
    {
        $departements = Departement::all();
        
        return view('admin.create_dataPro', compact('departements'));
    }

    public function store_dataPro(UserDataProRequest $request)
    {
        $data= $request->validated();
        $data['user_id'] = $request->user_id;
        $data['contrat_id'] = $request->contrat_id;
        $data['departement_id'] = $request->departement_id;

        if($request->hasFile('cv') && $request->file('cv')->isValid()){
   
            if (Storage::exists('CV/'.$request->user_id)) {
                Storage::deleteDirectory('CV/'.$request->user_id);
            }
            $extension  = $request->file('cv')->extension();
            $filename = 'CV_'. $request->user_id .'.'.$extension;
            $cv = $request->file('cv');
            $path = $cv->storeAs('CV/'.$request->user_id,$filename);
                               
            $data['cv'] = $filename;
            $data['path'] = $path;

        } 
          
        Donnee_Professionelle::create($data);

        $user = User::where('id',$request->user_id)->first();
        $htmlContrat= view('document.contrat', ['user' => $user])->render();
        $htmlAttestion= view('document.attestation', ['user' => $user])->render();

        // Générez le PDF à partir du contenu HTML
        $dompdfC = new Dompdf();
        
        $dompdfC->loadHtml($htmlContrat);
        $dompdfC->setPaper('A4', 'portrait');
        $dompdfC->render();

        // attest
        $dompdfA = new Dompdf();
        $dompdfA->loadHtml($htmlAttestion);
        $dompdfA->setPaper('A4', 'portrait');
        $dompdfA->render();

       
       

    $cheminContrat = 'document/contrat_' . $user->id . '.pdf';
    $cheminAttestation = 'document/attestation_' . $user->id . '.pdf';

    Storage::put($cheminContrat, $dompdfC->output());
    Storage::put($cheminAttestation, $dompdfA->output());

    // Créez l'entrée dans la table Document
    Document::create([
        'user_id' => $user->id,
        'contrat' => $cheminContrat,
        'attestation' => $cheminAttestation,
    ]);
        return redirect('/index');

    }
}
