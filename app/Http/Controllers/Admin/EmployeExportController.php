<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\EmployesExport;
use Maatwebsite\Excel\Facades\Excel;

class EmployeExportController extends Controller
{
    public function exportAllPdf()
    {
        $employes = User::with(['region', 'emploi.grade'])
            ->whereNotNull('emploi_id')
            ->get();

        $pdf = Pdf::loadView('admin.employes.export', compact('employes'));

        return $pdf->download('employes.pdf');
    }

    public function exportAllExcel()
    {
        return Excel::download(new EmployesExport, 'employes.xlsx');
    }
}
