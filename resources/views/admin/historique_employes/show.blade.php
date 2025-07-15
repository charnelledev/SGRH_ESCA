@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-4">Détails de l’historique</h2>
    <div class="bg-white dark:bg-gray-900 p-6 rounded shadow space-y-4">
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Employé :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->employe->name }}</p>
        </div>
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Employé :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->employe->last_name}}</p>
        </div>
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Employé :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->employe->telephone}}</p>
        </div>
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Employé :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->employe->salary_min }}</p>
        </div>
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Employé :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->employe->salary_max}}</p>
        </div>
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Emploi :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->emploi->titre }}</p>
        </div>
        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Emploi :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->grade->nom }}</p>
        </div>

        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Date de début :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->date_debut }}</p>
        </div>

        <div>
            <label class="font-semibold text-gray-700 dark:text-white">Date de fin :</label>
            <p class="text-gray-800 dark:text-gray-200">{{ $historiqueEmploye->date_fin ?? '—' }}</p>
        </div>
    </div>

    <div class="mt-6">
        <a href="{{ route('admin.historique_employes.index') }}"
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
            Retour
        </a>
    </div>
</div>
@endsection
