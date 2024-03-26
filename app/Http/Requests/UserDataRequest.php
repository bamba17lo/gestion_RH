<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserDataRequest extends FormRequest
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
            
            'telephone' => $this->method()== "POST" ? ['required','telephone','unique:donnee__personelles,telephone']:
            [Rule::unique('donnee__personelles','telephone')->ignore($this->user)],
            'date_naissance' => 'required',
            'lieu_naissance' => 'required',
            'nationalite' => 'required',
            'sexe' => 'required',
            'adresse' => 'required',
            'telephone' => 'required'
        ];
    }

    public function messages()
    {
        return [            
            'date_naissance.required'=> "Ce champs ne doit pas etre vide",
            'telephone.required'=> 'Ce champs ne doit pas etre vide',
            'date_naissance.required'=> 'Ce champs ne doit pas etre vide',
            'lieu_naissance.required'=> 'Ce champs ne doit pas etre vide',
            'nationalite.required'=> 'Ce champs ne doit pas etre vide',
            'sexe.required'=> 'Ce champs ne doit pas etre vide',
            'adresse.required'=> 'Ce champs ne doit pas etre vide',
            'telephone.unique'=> "Ce numéro existe déja",      

        ];
    }
}
