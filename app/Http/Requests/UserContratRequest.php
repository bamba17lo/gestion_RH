<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserContratRequest extends FormRequest
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
            'type_contrat' => 'required',
            'date_debut'=>'required',
            'date_fin'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'type_contrat.required'=> "Choisissez le type de contrat",
            'date_debut.required'=> "Choisissez la date d'embauche",
            'date_fin.required'=> "Choisissez la date de fin du contrat",
        ];
    }
}
