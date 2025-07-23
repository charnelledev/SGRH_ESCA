@extends('layouts.admin.layouts-admin')

@section('content')
    <div class="p-6">
        <div class="flex justify-end gap-3 mb-4">
            <a href="{{ route('admin.historique.export.pdf') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                📄 Export PDF
            </a>

            <a href="{{ route('admin.historique.export.excel') }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 ">
                📊 Export Excel
            </a>
        </div>

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center gap-2">Historique des employés <span class="bg-blue-600 text-white dark:bg-violet-600 dark:text-white px-3 py-1 rounded-full text-sm font-semibold shadow"> ({{ $historiqueEmployes->total() }})</span></h1>
            <a href="{{ route('admin.historique_employes.create') }}"
                class="mt-4 sm:mt-0 bg-gradient-to-r from-pink-500 to-violet-600 hover:from-pink-600 hover:to-violet-700 text-white px-5 py-2 rounded shadow-md transition duration-300 flex items-center gap-2"><i class="fas fa-plus-circle"></i>
                Ajouter
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-200 text-green-800 rounded dark:bg-green-700 dark:text-white">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.historique_employes.index') }}"
            class="mb-6 flex flex-wrap items-center gap-2">
            <input type="text" name="search" placeholder="Recherche..." value="{{ request('search') }}"
                class="border rounded px-3 py-2 w-64 dark:bg-gray-800 dark:text-white dark:border-gray-600" />

            <button type="submit" class="bg-gradient-to-r from-blue-500 to-cyan-600 hover:from-blue-600 hover:to-cyan-700 text-white px-4 py-2 rounded transition shadow">
                 🔍 Rechercher
            </button>

            @if (request('search'))
                <a href="{{ route('admin.historique_employes.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                   ⟲ Réinitialiser
                </a>
            @endif
        </form>

        <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-700">
                <tr>
                    <th class="py-3 px-6 text-left">Employé</th>
                    <th class="py-3 px-6 text-left">Emploi</th>
                    <th class="py-3 px-6 text-left">Date début</th>
                    <th class="py-3 px-6 text-left">Date fin</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($historiqueEmployes as $historique)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $historique->employe->name ?? '-' }}</td>
                        <td class="py-3 px-6">{{ $historique->emploi->titre ?? '-' }}</td>
                        <td class="py-3 px-6">{{ $historique->date_debut }}</td>
                        <td class="py-3 px-6">{{ $historique->date_fin ?? '—' }}</td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-2">
                            <a href="{{ route('admin.historique_employes.show', $historique->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded" title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.historique_employes.edit', $historique->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.historique_employes.destroy', $historique->id) }}" method="POST"
                                onsubmit="return confirm('Confirmer la suppression ?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded"
                                    title="Supprimer">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500 dark:text-gray-300">Aucun historique
                            trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $historiqueEmployes->withQueryString()->links() }}
        </div>
    </div>
@endsection
