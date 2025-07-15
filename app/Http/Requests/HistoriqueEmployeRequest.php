<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistoriqueEmployeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'employe_id' => 'required|exists:users,id',
            'emploi_id' => 'required|exists:emplois,id',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ];
    }

    public function messages(): array
    {
        return [
            'employe_id.required' => "L'employé est requis.",
            'employe_id.exists' => "L'employé sélectionné n'existe pas.",
            'emploi_id.required' => "L'emploi est requis.",
            'emploi_id.exists' => "L'emploi sélectionné n'existe pas.",
            'date_debut.date' => "La date de début doit être une date valide.",
            'date_fin.date' => "La date de fin doit être une date valide.",
            'date_fin.after_or_equal' => "La date de fin doit être postérieure ou égale à la date de début.",
        ];
    }
}
