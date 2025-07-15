<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use App\Models\Emploi;
use App\Models\Region;
use App\Models\Grade; // ou NiveauPoste selon ton projet
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%");
            });
        }

        $employes = $query->paginate(10);

        return view('admin.employes.index', compact('employes'));
    }

    public function create()
    {
        $emplois = Emploi::all();
        $regions = Region::all();
        $grades = Grade::all(); // Si tu utilises "NiveauPoste", change ici

        return view('admin.employes.create', compact('emplois', 'regions', 'grades'));
    }

    public function store(EmployeeRequest $request)
    {

        $data = $request->validated();
        $data['password'] = bcrypt('password'); // mot de passe par défaut
        User::create($data);

        return redirect()->route('admin.employes.index')->with('success', 'Employé créé avec succès.');
    }
//     public function store(EmployeeRequest $request)
// {
//     $data = $request->validated();

//     // Hacher le mot de passe
//     $data['password'] = bcrypt($data['password']);

//     User::create($data);

//     return redirect()->route('admin.employes.index')->with('success', 'Employé ajouté avec succès.');
// }


    public function show(User $employe)
    {
        return view('admin.employes.show', compact('employe'));
    }

    public function edit(User $employe)
    {
        $emplois = Emploi::all();
        $regions = Region::all();
        $grades = Grade::all(); // Si tu utilises "NiveauPoste", change ici

        return view('admin.employes.edit', compact('employe', 'emplois', 'regions', 'grades'));
    }

   public function update(EmployeeRequest $request, User $employe)
{
    $data = $request->validated();

    // Si tu as un champ mot de passe (optionnel)
    if (!empty($data['password'])) {
        $data['password'] = bcrypt($data['password']);
    } else {
        unset($data['password']); // ne pas écraser l'ancien mot de passe
    }

    $employe->update($data);

    return redirect()->route('admin.employes.index')->with('success', 'Employé mis à jour avec succès.');
}

    

    public function destroy(User $employe)
    {
        $employe->delete();

        return redirect()->route('admin.employes.index')->with('success', 'Employé supprimé avec succès.');
    }
}
