<?php

namespace App\Http\Controllers;

use App\Models\HistoriqueEmploye;
use App\Models\User;
use App\Models\Emploi;
use Illuminate\Http\Request;
use App\Http\Requests\HistoriqueEmployeRequest;

class HistoriqueEmployeController extends Controller
{
    public function index()
    {
        $historiqueEmployes = HistoriqueEmploye::with(['employe', 'emploi'])->paginate(10);
        return view('admin.historique_employes.index', compact('historiqueEmployes'));
    }

    public function create()
    {
        $employes = User::all();
        $emplois = Emploi::all();
        return view('admin.historique_employes.create', compact('employes', 'emplois'));
    }

    public function store(HistoriqueEmployeRequest $request)
    {
        HistoriqueEmploye::create($request->validated());
        return redirect()->route('admin.historique_employes.index')->with('success', 'Historique employé créé avec succès.');
    }

    public function show(HistoriqueEmploye $historiqueEmploye)
    {
        return view('admin.historique_employes.show', compact('historiqueEmploye'));
    }

    public function edit(HistoriqueEmploye $historiqueEmploye)
    {
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
}
