<?php
namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::whereNotNull('emploi_id')->get()->map(function ($e) {
            return [
                'Nom' => $e->last_name,
                'Email' => $e->email,
                'Téléphone' => $e->telephone,
                'Région' => $e->region->name ?? '',
                'Emploi' => $e->emploi->titre ?? '',
                'grade' => $e->grade->nom ?? '',
            ];
        });
    }

    public function headings(): array
    {
        return ['Nom', 'Email', 'Téléphone', 'Région', 'Emploi', 'grade'];
    }
}




