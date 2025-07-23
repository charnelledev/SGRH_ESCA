<?php

namespace App\Exports;

use App\Models\User;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployesExport implements FromView, WithHeadings
{
    public function View():View
    {
        $employes=User::with(['region', 'emploi.grade'])->get();
        return view('admin/employes/export', compact('employes'));
           
    }

    public function headings(): array
    {
        return ['Nom', 'Email', 'Téléphone', 'Région', 'Emploi', 'Grade'];
    }
}
