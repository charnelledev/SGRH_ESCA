@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-4 sm:p-6">

    {{-- En-tête avec badge et bouton d’ajout --}}
    <div class="flex flex-col sm:flex-row justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
            Régions 
            <span class="bg-blue-600 text-white dark:bg-violet-600 dark:text-white px-3 py-1 rounded-full text-sm font-semibold shadow">
                {{ $regions->total() }}
            </span>
        </h1>

        <a href="{{ route('admin.regions.create') }}"
           class="mt-4 sm:mt-0 bg-gradient-to-r from-pink-500 to-violet-600 hover:from-pink-600 hover:to-violet-700 text-white px-5 py-2 rounded shadow-md transition duration-300 flex items-center gap-2">
            <i class="fas fa-plus-circle"></i> Ajouter une région
        </a>
    </div>

    {{-- Message succès --}}
    @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulaire de recherche --}}
    <form method="GET" action="{{ route('admin.regions.index') }}"
          class="mb-6 flex flex-wrap gap-2 items-center">
        <input type="text" name="search" placeholder="Recherche..."
               value="{{ request('search') }}"
               class="border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white px-4 py-2 rounded shadow-sm w-64 focus:ring-2 focus:ring-blue-400" />

        <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white px-4 py-2 rounded transition shadow">
            🔍 Rechercher
        </button>

        @if (request('search'))
            <a href="{{ route('admin.regions.index') }}"
               class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white px-4 py-2 rounded transition shadow">
                ✖ Réinitialiser
            </a>
        @endif
    </form>

    {{-- Tableau stylisé --}}
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-violet-500 to-blue-600 dark:from-violet-700 dark:to-blue-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-center text-sm font-bold uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($regions as $region)
                    <tr class="hover:bg-blue-50 dark:hover:bg-violet-800 text-gray-900 dark:text-gray-100 transition duration-200">
                        <td class="px-6 py-4 font-medium">{{ $region->nom }}</td>
                        <td class="px-6 py-4">{{ $region->description ?? '—' }}</td>
                        <td class="px-6 py-4 text-center flex justify-center gap-2">
                            <a href="{{ route('admin.regions.show', $region->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded shadow" title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.regions.edit', $region->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded shadow" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST"
                                  onsubmit="return confirm('Confirmer la suppression ?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded shadow"
                                        title="Supprimer">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4 text-gray-500 dark:text-gray-300">
                            Aucune région trouvée.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $regions->withQueryString()->links() }}
    </div>
</div>
@endsection
