@extends('layouts.admin.layouts-admin')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold mb-6 text-black">Détails de l'employé</h2>

        <table class="min-w-full border border-black rounded-lg shadow-md bg-white dark:bg-gray-800">
            <tbody>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white w-1/3 border-r-2 border-black">
                        Nom complet
                    </th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                        {{ $employe->name }} {{ $employe->last_name }}
                    </td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">Email
                    </th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->email }}</td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">
                        Téléphone</th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->telephone ?? '—' }}</td>
                </tr>
                {{-- <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">
                        Téléphone</th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->salary_min ?? '—' }}</td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">
                        Téléphone</th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->salary_max ?? '—' }}</td>
                </tr> --}}
                 
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">Poste
                    </th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->emploi->titre ?? '—' }}</td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">Grade
                    </th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->grade->nom ?? '—' }}</td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">Région
                    </th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">{{ $employe->region->nom ?? '—' }}</td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">Salaire
                        minimal</th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                        {{ $employe->salary_min ? number_format($employe->salary_min, 0, ',', ' ') . ' FCFA' : '—' }}
                    </td>
                </tr>
                <tr
                    class="border-b border-black hover:bg-gray-100 dark:hover:bg-gray-700 even:bg-gray-50 dark:even:bg-gray-700">
                    <th class="text-left px-6 py-4 font-semibold text-black dark:text-white border-r-2 border-black">Salaire
                        maximal</th>
                    <td class="px-6 py-4 text-gray-900 dark:text-gray-200">
                        {{ $employe->salary_max ? number_format($employe->salary_max, 0, ',', ' ') . ' FCFA' : '—' }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-6 flex justify-between">
        <a href="{{ route('admin.employes.index') }}"
           class="text-blue-600 hover:underline">←Retour</a>

        <div class="flex gap-3">
            <a href="{{ route('admin.employes.edit', $employe->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Modifier
            </a>
        </div>
    </div>
    </div>
    @endsection
