@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Détails du grade</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow space-y-4">
        <div>
            <h2 class="text-gray-700 dark:text-white font-semibold">Nom :</h2>
            <p class="text-gray-800 dark:text-gray-300">{{ $grade->nom }}</p>
        </div>

        <div>
            <h2 class="text-gray-700 dark:text-white font-semibold">Libellé :</h2>
            <p class="text-gray-800 dark:text-gray-300">{{ $grade->libele ?? '—' }}</p>
        </div>
    </div>

    {{-- <a href="{{ route('admin.grade.index') }}"
       class="mt-6 inline-block bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
        ← Retour
    </a> --}}
    <div class="mt-6 flex justify-between">
        <a href="{{ route('admin.grade.index') }}"
           class="text-blue-600 hover:underline">←Retour</a>

        <div class="flex gap-3">
            <a href="{{ route('admin.grade.edit', $grade->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Modifier
            </a>
        </div>
    </div>
</div>
@endsection
