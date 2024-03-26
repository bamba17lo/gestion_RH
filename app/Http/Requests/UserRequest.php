<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom_prenom'=> 'required',
            'email'=>$this->method()=="POST" ? ['required','email','unique:users,email']:
            [Rule::unique('users','email')->ignore($this->user)], 
            'profil' => 'required',
            'password'=> 'required|confirmed',
            'password_confirmation'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'nom_prenom.required'=> "Ce champs ne doit pas etre vide",
            'email.required'=> "Ce champs ne doit pas etre vide",
            'profil.required'=> "Ce champs ne doit pas etre vide",
            'password.required'=> "Ce champs ne doit pas etre vide",
            'password_confirmation.required'=> "Ce champs ne doit pas etre vide",
            'password_confirmation.confirmed'=> "Ce champs ne doit pas etre vide",
            'role.required'=> 'Ce champs ne doit pas etre vide',

            'email.email'=> 'Veuillez respecter le format mail. ex: it.global@gmail.com',
            'email.unique'=> 'Cet email existe deja',

            'password.comfirmed'=> "les mot de passe doivent etre identique"
        ];
    }
}
