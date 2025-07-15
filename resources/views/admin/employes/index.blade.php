@extends('layouts.admin.layouts-admin')

@section('content')
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
        <h2 class="text-4xl font-semibold text-black dark:text-white">
            Liste des Employés
            <span class="text-gray-700 dark:text-gray-400 text-2xl">
                ({{ $employes->total() > 0 ? $employes->total() : 'aucun' }})
            </span>
        </h2>

        <div class="flex gap-2">
            <a href="{{ route('employes.export.all.pdf') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                📄 Export PDF
            </a>

            <a href="{{ route('employes.export.all.excel') }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                📊 Export Excel
            </a>

            <a href="{{ route('admin.employes.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                + Ajouter un employé
            </a>
        </div>
    </div>

{{-- 
    <div class="flex justify-end gap-2 mb-6">
        <a href="{{ route('employes.export.all.pdf') }}"
            class="inline-flex items-center px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700">
            📄 Export PDF
        </a>

        <a href="{{ route('employes.export.all.excel') }}"
            class="inline-flex items-center px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">
            📊 Export Excel
        </a>
    </div> --}}

    <!-- Search -->
    <form method="GET" action="{{ route('admin.employes.index') }}" class="mb-4 flex items-center">
        <input type="text" name="search" value="{{ request('search') }}"
            class="px-4 py-2 border rounded w-1/3 focus:outline-none focus:ring focus:border-blue-300"
            placeholder="Rechercher par nom ou email...">
        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded ml-2">Rechercher</button>

        @if (request('search'))
            <a href="{{ route('admin.employes.index') }}" class="ml-4 text-sm text-blue-600 hover:underline">
                ⟲ Réinitialiser
            </a>
        @endif
    </form>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Nom</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Téléphone</th>
                    <th class="py-3 px-6 text-left">Emploi</th>
                    <th class="py-3 px-6 text-left">Région</th>
                    <th class="py-3 px-6 text-left">Grade</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 dark:text-gray-200 text-sm font-light">
                @forelse ($employes as $employe)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                        <td class="py-3 px-6">{{ $employe->name }} {{ $employe->last_name }}</td>
                        <td class="py-3 px-6">{{ $employe->email }}</td>
                        <td class="py-3 px-6">{{ $employe->telephone }}</td>
                        <td class="py-3 px-6">{{ $employe->emploi->titre ?? '—' }}</td>
                        <td class="py-3 px-6">{{ $employe->region->nom ?? '—' }}</td>
                        <td class="py-3 px-6">{{ $employe->grade->nom ?? '—' }}</td>
                        <td class="py-3 px-6 text-center flex justify-center space-x-2">
                            <a href="{{ route('admin.employes.show', $employe->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full" title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.employes.edit', $employe->id) }}"
                                class="bg-yellow-400 hover:bg-yellow-500 text-white p-2 rounded-full" title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.employes.destroy', $employe->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Confirmer la suppression ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full"
                                    title="Supprimer">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">Aucun employé trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $employes->withQueryString()->links() }}
    </div>
    </div>
    </div>
@endsection
