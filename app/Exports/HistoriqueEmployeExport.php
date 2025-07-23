<?php

namespace App\Exports;

use App\Models\HistoriqueEmploye;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HistoriqueEmployeExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return HistoriqueEmploye::with(['employe', 'emploi', 'grade'])->get();
    }

    public function headings(): array
    {
        return [
            'Prénom',
            'Nom',
            'Email',
            'Emploi',
            'Grade',
            'salaire minimal',
            'salaire maximal',
            'Date début',
            'Date fin',
            'Créé le',
        ];
    }

    public function map($historique): array
    {
        return [
            $historique->employe->name,
            $historique->employe->last_name,
            $historique->employe->email,
            $historique->emploi->titre ?? 'N/A',
            $historique->employe->grade->nom ?? 'N/A',
            $historique->employe->salary_min,
            $historique->employe->salary_max,
            $historique->date_debut,
            $historique->date_fin ?? '—',
            $historique->created_at->format('d/m/Y'),
        ];
    }
}
