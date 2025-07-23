@extends('employee.layouts.app')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-800 dark:text-white">Bienvenue sur votre espace personnel</h2>
        <p class="text-sm text-gray-500 dark:text-gray-300">Vous êtes connecté en tant qu’employé.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        {{-- 🧑 Mes informations --}}
        <div class="bg-blue-100 dark:bg-blue-800 p-6 rounded-2xl shadow-xl">
            <h3 class="text-xl font-semibold mb-3 text-blue-900 dark:text-white">Mes informations</h3>
            <ul class="text-gray-800 dark:text-gray-100 text-sm space-y-2">
                <li><strong>Nom :</strong> {{ Auth::user()->last_name }} {{ Auth::user()->name }}</li>
                <li><strong>Email :</strong> {{ Auth::user()->email }}</li>
                <li><strong>Emploi :</strong> {{ Auth::user()->emploi->titre ?? '-' }}</li>
            </ul>
        </div>

        {{-- ✅ Fonctionnalités disponibles --}}
        <div class="bg-cyan-100 dark:bg-cyan-800 p-6 rounded-2xl shadow-xl">
            <h3 class="text-xl font-semibold mb-3 text-cyan-900 dark:text-white">Fonctionnalités disponibles</h3>
            <ul class="list-disc pl-5 text-gray-800 dark:text-gray-100 text-sm space-y-1">
                <li>Consulter mes informations</li>
                <li>Accéder à mon historique</li>
                <li>Télécharger mon historique RH</li>
            </ul>
        </div>

        {{-- 📄 Téléchargement PDF --}}
        <div class="bg-purple-100 dark:bg-purple-800 p-6 rounded-2xl shadow-xl">
            <h3 class="text-xl font-semibold mb-3 text-purple-900 dark:text-white">Téléchargement</h3>
            <p class="text-sm text-gray-800 dark:text-gray-100 mb-2">Générez un document PDF de votre historique RH :</p>
            <a href="{{ route('employee.export.pdf') }}"
               class="inline-block bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded shadow transition">
               📄 Télécharger (PDF)
            </a>
        </div>
    </div>

    {{-- 🕓 Historique de l’employé (dernier poste) --}}
    <div class="mt-10">
        @php
            $historique = Auth::user()->historiqueEmployes ?? collect();
            $lastHistorique = $historique->last();
        @endphp

        @if ($lastHistorique)
            <div class="bg-green-100 dark:bg-green-800 p-6 rounded-2xl shadow-xl">
                <h3 class="text-xl font-semibold mb-3 text-green-900 dark:text-white">Mon dernier poste</h3>
                <ul class="text-sm text-gray-800 dark:text-gray-100 space-y-2">
                    <li><strong>Titre :</strong> {{ $lastHistorique->emploi->titre ?? '-' }}</li>
                    <li><strong>Date de début :</strong> {{ $lastHistorique->date_debut }}</li>
                </ul>
            </div>
        @else
            <div class="bg-yellow-100 dark:bg-yellow-800 p-6 rounded-2xl shadow-xl">
                <h3 class="text-xl font-semibold mb-3 text-yellow-900 dark:text-white">Aucun historique disponible</h3>
                <p class="text-sm text-gray-800 dark:text-gray-100">Aucune affectation enregistrée pour l’instant.</p>
            </div>
        @endif
    </div>
@endsection
