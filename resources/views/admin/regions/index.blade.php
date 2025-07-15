@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-4 sm:p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">
        Régions ({{ $regions->total() }})
    </h1>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 dark:bg-green-200 dark:text-green-900 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulaire de recherche --}}
    <form method="GET" action="{{ route('admin.regions.index') }}" class="mb-4 flex flex-wrap gap-2 items-center">
        <input type="text" name="search" placeholder="Recherche..." value="{{ request('search') }}"
               class="border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white px-4 py-2 rounded w-64 shadow-sm" />

        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
            Rechercher
        </button>

        @if (request('search'))
            <a href="{{ route('admin.regions.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded transition">
                Réinitialiser
            </a>
        @endif
    </form>

    {{-- Bouton ajouter --}}
    <a href="{{ route('admin.regions.create') }}"
       class="inline-block bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded mb-4 transition">
        + Ajouter une région
    </a>

    {{-- Tableau responsive --}}
    <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Nom</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Description</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @forelse ($regions as $region)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-900 dark:text-gray-100">
                        <td class="px-6 py-4">{{ $region->nom }}</td>
                        <td class="px-6 py-4">{{ $region->description ?? '—' }}</td>
                        <td class="px-6 py-4 text-center space-x-2 flex justify-center">
                            <a href="{{ route('admin.regions.show', $region->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition" title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.regions.edit', $region->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded transition" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST"
                                  onsubmit="return confirm('Confirmer la suppression ?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded transition"
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
