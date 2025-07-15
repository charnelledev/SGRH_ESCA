@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">
            Grades ({{ $grades->total() }})
        </h1>
        <a href="{{ route('admin.grade.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded">
            Ajouter
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- reste du contenu -->


    
    <form method="GET" action="{{ route('admin.grade.index') }}" class="mb-6 flex flex-wrap items-center gap-2">
        <input type="text" name="search" placeholder="Recherche..." value="{{ request('search') }}"
               class="border rounded px-3 py-2 w-64" />

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Rechercher
        </button>

        @if (request('search'))
            <a href="{{ route('admin.grade.index') }}">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded">
                    Réinitialiser
                </button>
            </a>
        @endif
    </form>

    <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th class="py-3 px-6 text-left">Nom</th>
                <th class="py-3 px-6 text-left">Libellé</th>
                <th class="py-3 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($grades as $grade)
            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="py-3 px-6">{{ $grade->nom }}</td>
                <td class="py-3 px-6">{{ $grade->libele ?? '—' }}</td>
                <td class="py-3 px-6 text-center flex justify-center space-x-2">
                    <a href="{{ route('admin.grade.show', $grade->id) }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded" title="Voir">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.grade.edit', $grade->id) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded" title="Modifier">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.grade.destroy', $grade->id) }}" method="POST"
                          onsubmit="return confirm('Confirmer la suppression ?')" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white p-2 rounded"
                                title="Supprimer">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center py-4 text-gray-500">Aucun grade trouvé.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $grades->withQueryString()->links() }}
    </div>
</div>
@endsection
