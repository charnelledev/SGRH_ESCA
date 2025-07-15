@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">
            Liste des emplois <span class="text-gray-500 text-2xl">({{ $emplois->total() }})</span>
        </h1>
        <a href="{{ route('admin.emplois.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            + Ajouter
        </a>
    </div>

    <form method="GET" action="{{ route('admin.emplois.index') }}" class="mb-6 flex flex-wrap items-center gap-2 max-w-md">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Recherche par titre ou description..."
               class="border border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded px-3 py-2 w-full sm:w-64 focus:outline-none" />

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Rechercher
        </button>

        @if (request('search'))
            <a href="{{ route('admin.emplois.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Réinitialiser
            </a>
        @endif
    </form>

    <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="py-3 px-6 text-left">Titre</th>
                <th class="py-3 px-6 text-left">Description</th>
                <th class="py-3 px-6 text-left">Grade</th>
                <th class="py-3 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm text-gray-700 dark:text-gray-200">
            @forelse ($emplois as $emploi)
                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="py-3 px-6">{{ $emploi->titre }}</td>
                    <td class="py-3 px-6">{{ Str::limit($emploi->description, 50) }}</td>
                    <td class="py-3 px-6">{{ $emploi->grade->nom ?? '—' }}</td>
                    <td class="py-3 px-6 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.emplois.show', $emploi->id) }}"
                           class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full" title="Voir">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.emplois.edit', $emploi->id) }}"
                           class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-full" title="Modifier">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.emplois.destroy', $emploi->id) }}" method="POST"
                              onsubmit="return confirm('Confirmer la suppression ?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full"
                                    title="Supprimer">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500 dark:text-gray-400">
                        Aucun emploi trouvé.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $emplois->withQueryString()->links() }}
    </div>
</div>
@endsection
