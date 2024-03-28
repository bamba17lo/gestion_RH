<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function index(){
        $departements = Departement::paginate(5);
        return view('departement.index',compact('departements'));
    }

    public function create(){
        
        return view('departement.create');
    }

    public function edit(Departement $departement){
        return view('departement.edit',compact('departement'));
    }

    public function store(Request $request)
    {
       $data =  $request->validate([
            'libelle'=>'required',
        ]);

        Departement::create($data);
        return redirect()->route('departement.index');
    }

    public function delete(Departement $departement)
    {
           $sup = $departement->delete();
           return back();
    }

    public function update(Request $request, Departement $departement)
    {
        $data =  $request->validate([
            'libelle'=>'required',
        ]);
        Departement::updateOrCreate(['id'=>$departement->id],$data);

        return redirect()->route('departement.index');
    }
}
