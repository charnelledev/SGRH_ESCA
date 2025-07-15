<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
 * @method mixed route(string $param = null)
 */

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        
          $userId = optional($this->route('employe'))->id;

        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $userId,
            'telephone' => 'nullable|string|max:255',
            'emploi_id' => 'nullable|exists:emplois,id',
            'grade_id' => 'nullable|exists:grades,id',
            'region_id' => 'nullable|exists:regions,id',
            'salary_min' => 'nullable|string|numeric|min:0',
            'salary_max' => 'nullable|string|numeric|min:0|gte:salary_min',  // salary_max > salary_min
        ];
    }



    public function messages(): array
    {
        return [
            'name.required' => 'Le prénom est requis.',
            'last_name.required' => 'Le nom est requis.',
            'email.required' => 'L\'email est requis.',
            'email.email' => 'L\'email doit être une adresse valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'telephone.max' => 'Le numéro de téléphone ne peut pas dépasser 255 caractères.',
            'emploi_id.exists' => 'L\'emploi sélectionné n\'existe pas.',
            'grade_id.exists' => 'Le grade sélectionné n\'existe pas.',
            'region_id.exists' => 'La région sélectionnée n\'existe pas.',
            'salary_min.numeric' => 'Le salaire minimal doit être un nombre.',
            'salary_max.numeric' => 'Le salaire maximal doit être un nombre.',
            'salary_min.lt' => 'Le salaire minimal doit être inférieur au salaire maximal.',
            'salary_max.gt' => 'Le salaire maximal doit être supérieur au salaire minimal.',
        ];
    }
}
