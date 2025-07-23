@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
            Grades <span class="bg-blue-600 text-white dark:bg-violet-600 dark:text-white px-3 py-1 rounded-full text-sm font-semibold shadow">({{ $grades->total() }})</span>
        </h1>
        <a href="{{ route('admin.grade.create') }}"
           class="mt-4 sm:mt-0 bg-gradient-to-r from-pink-500 to-violet-600 hover:from-pink-600 hover:to-violet-700 text-white px-5 py-2 rounded shadow-md transition duration-300 flex items-center gap-2">
           <i class="fas fa-plus-circle"></i>
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

        <button type="submit" class="bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white px-4 py-2 rounded transition shadow">
            🔍 Rechercher
        </button>

        @if (request('search'))
            <a href="{{ route('admin.grade.index') }}">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded">
                   ⟲ Réinitialiser
                </button>
            </a>
        @endif
    </form>

    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 rounded-lg overflow-hidden">
        <thead class="bg-gradient-to-r from-violet-500 to-blue-600 dark:from-violet-700 dark:to-blue-800 text-white">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider">Nom</th>
                <th class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider">Libellé</th>
                <th class="px-6 py-3 text-left text-sm font-bold uppercase tracking-wider">Actions</th>
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
