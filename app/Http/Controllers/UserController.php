<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDataRequest;
use App\Http\Requests\UserRequest;
use App\Models\Departement;
use App\Models\Donnee_Personnelle;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
