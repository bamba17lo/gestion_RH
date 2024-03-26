<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDataProRequest extends FormRequest
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
            
            'emploi'=>'required',
            'salaire'=>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'emploi.required'=> "Choisissez le poste occupe",
            'salaire.required'=> "Remplissez ce champs",
            'salaire.numeric'=> " Ce champs est de type numeric",
            
        ];
    }
}
