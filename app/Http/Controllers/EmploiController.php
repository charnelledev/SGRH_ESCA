<?php

namespace App\Http\Controllers;

use App\Models\Emploi;
use App\Models\Grade;
use App\Http\Requests\EmploiRequest;

class EmploiController extends Controller
{
    public function index()
    {
        $emplois = Emploi::with('grade')->paginate(10);
        return view('admin.emplois.index', compact('emplois'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('admin.emplois.create', compact('grades'));
    }

    public function store(EmploiRequest $request)
    {
        Emploi::create($request->validated());
        return redirect()->route('admin.emplois.index')->with('success', 'Emploi ajouté avec succès.');
    }

    public function show(Emploi $emploi)
    {
        return view('admin.emplois.show', compact('emploi'));
    }

    public function edit(Emploi $emploi)
    {
        $grades = Grade::all();
        return view('admin.emplois.edit', compact('emploi', 'grades'));
    }

    public function update(EmploiRequest $request, Emploi $emploi)
    {
        $emploi->update($request->validated());
        return redirect()->route('admin.emplois.index')->with('success', 'Emploi mis à jour avec succès.');
    }

    public function destroy(Emploi $emploi)
    {
        $emploi->delete();
        return redirect()->route('admin.emplois.index')->with('success', 'Emploi supprimé avec succès.');
    }
}
