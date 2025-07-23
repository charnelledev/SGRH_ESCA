<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Emploi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\HistoriqueEmploye;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\HistoriqueEmployeExport;
use App\Http\Requests\HistoriqueEmployeRequest;

class HistoriqueEmployeController extends Controller
{
    public function index(Request $request)
{
    $query = HistoriqueEmploye::with(['employe', 'emploi']);

    if ($request->has('search') && $request->filled('search')) {
        $search = $request->input('search');

        $query->whereHas('employe', function ($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
        });
    }

    $historiqueEmployes = $query->paginate(10)->withQueryString();

    return view('admin.historique_employes.index', compact('historiqueEmployes'));
}




    public function create(Request $request)
    {
        $employes = User::all();
        $emplois = Emploi::all();
        $employeSelectionne = null;

        if ($request->has('user_id')) {
            $employeSelectionne = User::find($request->input('user_id'));
        }

        return view('admin.historique_employes.create', compact('employes', 'emplois', 'employeSelectionne'));
    }

    // public function store(HistoriqueEmployeRequest $request)
    // {
    //     HistoriqueEmploye::create($request->validated());
    //     return redirect()->route('admin.historique_employes.index')->with('success', 'Historique employé créé avec succès.');
    // }
    public function store(Request $request)
    {
        // dd($validated);

        $validated = $request->validate([
            'employe_id' => 'required|exists:users,id',
            'emploi_id' => 'required|exists:emplois,id',
            'grade_id' => 'required|exists:grades,id',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'created_at' => 'nullable|date',
            'updated_at' => 'nullable|date',
        ]);

        $employe = User::findOrFail($validated['employe_id']);

        $historique = new HistoriqueEmploye([
            'employe_id' => $employe->id,
            'emploi_id' => $employe->emploi_id,
            'region_id' => $employe->region_id ?? null,
            'grade_id' => $employe->grade_id ?? null,
            'salary_min' => $employe->salary_min ?? null,
            'salary_max' => $employe->salary_max ?? null,
            'date_debut' => $validated['date_debut'],
            'date_fin' => $validated['date_fin'] ?? null,
            'created_at' => $request->created_at ?? now(),
            'updated_at' => $request->updated_at ?? now(),



        ]);

        // Ajout manuel des timestamps si précisés
        if (array_key_exists('created_at', $validated)) {
            $historique->created_at = $validated['created_at'];
        }

        if (array_key_exists('updated_at', $validated)) {
            $historique->updated_at = $validated['updated_at'];
        }


        $historique->save();

        return redirect()->route('admin.historique_employes.index')
            ->with('success', 'Historique ajouté avec succès.');
    }

    public function show($id)
    {
        $historiqueEmploye = HistoriqueEmploye::with(['employe', 'emploi', 'region', 'grade'])->findOrFail($id);

        return view('admin.historique_employes.show', compact('historiqueEmploye'));
    }

    public function edit($id)
    {
        $historiqueEmploye = HistoriqueEmploye::findOrFail($id);
        $employes = User::all();
        $emplois = Emploi::all();
        return view('admin.historique_employes.edit', compact('historiqueEmploye', 'employes', 'emplois'));
    }

    public function update(HistoriqueEmployeRequest $request, HistoriqueEmploye $historiqueEmploye)
    {
        $historiqueEmploye->update($request->validated());
        return redirect()->route('admin.historique_employes.index')->with('success', 'Historique employé modifié avec succès.');
    }

    public function destroy(HistoriqueEmploye $historiqueEmploye)
    {
        $historiqueEmploye->delete();
        return redirect()->route('admin.historique_employes.index')->with('success', 'Historique employé supprimé avec succès.');
    }


    public function exportPdf()
    {
        $historiques = HistoriqueEmploye::with(['employe', 'emploi.grade', 'region'])->get();
        $pdf = Pdf::loadView('admin.historique_employes.export', compact('historiques'));
        return $pdf->download('historique_employes.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new HistoriqueEmployeExport, 'historique_employes.xlsx');
    }
}
