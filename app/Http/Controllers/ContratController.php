<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserContratRequest;
use App\Models\Contrat;
use App\Models\Departement;
use Illuminate\Http\Request;

class ContratController extends Controller
{
    public function create_contrat(){
        return view('admin.create_contrat');
    }
    
    public function store_contrat(UserContratRequest $request)
    {
        $data = $request->validated();
        $departements = Departement::all();
        
        $contrat = Contrat::create($data);
        $user = $request->user_id; 
        $contrat_id = $contrat->id;
        return view('admin.create_dataPro', compact('user','departements','contrat_id'));
    }

    
}
