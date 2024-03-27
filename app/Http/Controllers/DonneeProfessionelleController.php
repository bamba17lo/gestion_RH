<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataProRequest;
use App\Models\Departement;
use App\Models\Donnee_Professionelle;
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
        return redirect('/');

    }
}
