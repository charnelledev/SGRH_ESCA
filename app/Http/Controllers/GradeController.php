<?php

namespace App\Http\Controllers;

use App\Http\Requests\GradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $grades = Grade::when($search, function ($query, $search) {
            $query->where('nom', 'like', "%{$search}%")
                  ->orWhere('libele', 'like', "%{$search}%");
        })->paginate(10);

        return view('admin.grade.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.grade.create');
    }

    public function store(GradeRequest $request)
    {
        Grade::create($request->validated());

        return redirect()->route('admin.grade.index')->with('success', 'Grade ajouté avec succès.');
    }

    public function show(Grade $grade)
    {
        return view('admin.grade.show', compact('grade'));
    }

    public function edit(Grade $grade)
    {
        return view('admin.grade.edit', compact('grade'));
    }

    public function update(GradeRequest $request, Grade $grade)
    {
        $grade->update($request->validated());

        return redirect()->route('admin.grade.index')->with('success', 'Grade modifié avec succès.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('admin.grade.index')->with('success', 'Grade supprimé avec succès.');
    }
}
