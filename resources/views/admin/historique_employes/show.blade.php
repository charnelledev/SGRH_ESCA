@extends('layouts.admin.layouts-admin')

@section('content')
<div class="max-w-5xl mx-auto p-6 sm:p-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 min-h-screen">
  
    <a href="{{ route('admin.historique.export.pdf') }}"
       class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
       📄 Export PDF
   </a>

   <a href="{{ route('admin.historique.export.excel') }}"
       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 ">
       📊 Export Excel
   </a>
    <!-- En-tête -->
    
    <div class="flex justify-between items-center mb-8">

        <h2 class="text-4xl font-extrabold text-gray-900 dark:text-white tracking-tight">Détails de l’historique</h2>
        <a href="{{ route('admin.historique_employes.index') }}"
           class="flex items-center bg-gray-700 hover:bg-gray-800 text-white px-4 py-2 rounded-full transition duration-300 shadow-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Retour
        </a>
    </div>

    <!-- Carte principale -->
    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl p-8 space-y-8 transform transition-all hover:shadow-2xl">
        <!-- Section Employé -->
        <div class="border-l-4 border-indigo-500 pl-6">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Informations de l'employé
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Nom</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->name ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Prénom</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->last_name ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Email</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->email ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Téléphone</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->telephone ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Région</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->region->name ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Salaire minimum</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->salary_min ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Salaire maximum</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->salary_max ?? 'Non défini' }}</p>
                </div>
            </div>
        </div>

        <!-- Section Emploi -->
        <div class="border-l-4 border-indigo-500 pl-6">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Détails de l'emploi
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Titre de l'emploi</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->emploi->titre ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Grade</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->employe->grade->nom ?? 'Non défini' }}</p>
                </div>
            </div>
        </div>

        <!-- Section Dates -->
        <div class="border-l-4 border-indigo-500 pl-6">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                <svg class="w-6 h-6 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Dates
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Date de début</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->date_debut ?? 'Non défini' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Date de fin</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->date_fin ?? '—' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Créé le</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->created_at ?? '—' }}</p>
                </div>
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-600 dark:text-gray-300">Mis à jour le</label>
                    <p class="text-lg text-gray-800 dark:text-gray-200 font-medium">{{ $historiqueEmploye->updated_at ?? '—' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Boutons d'action -->
    <div class="mt-8 flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 justify-center">
        @if ($historiqueEmploye->employe)
            <a href="{{ route('admin.historique_employes.create', ['user_id' => $historiqueEmploye->employe->id]) }}"
               class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full transition duration-300 shadow-md flex items-center justify-center transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Créer un historique pour cet employé
            </a>
        @else
            <p class="text-red-500 dark:text-red-400 font-medium">Aucun employé associé.</p>
        @endif
        <a href="{{ route('admin.historique_employes.index') }}"
           class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-full transition duration-300 shadow-md flex items-center justify-center transform hover:scale-105">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Retour
        </a>
    </div>
</div>
@endsection