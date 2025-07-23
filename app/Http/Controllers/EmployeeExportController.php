<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EmployeeExportController extends Controller
{
    public function exportHistorique()
    {
        $user = Auth::user();
        $historiques = $user->historiqueEmployes()->with('emploi')->get();

        $pdf = Pdf::loadView('employee.pdf.historique_pdf', compact('user', 'historiques'));
        return $pdf->download('mon_historique.pdf');
    }
}

