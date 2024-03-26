<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataProRequest;
use App\Models\Departement;
use App\Models\Donnee_Professionelle;
use Illuminate\Http\Request;

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

        Donnee_Professionelle::create($data);
        return redirect('/');

    }
}
