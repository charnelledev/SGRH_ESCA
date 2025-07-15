@extends('layouts.admin.layouts-admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
        Détail de la région
    </h1>

    <div class="space-y-4 text-gray-800 dark:text-white">
        <p><strong>Nom :</strong> {{ $region->nom }}</p>
        <p><strong>Description :</strong> {{ $region->description ?? '—' }}</p>
    </div>

    {{-- <div class="mt-6">
        <a href="{{ route('admin.regions.index') }}"
           class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded shadow inline-block">
            <i class="fas fa-arrow-left mr-2"></i> Retour
        </a>
    </div> --}}
       <div class="mt-6 flex justify-between">
        <a href="{{ route('admin.regions.index') }}"
           class="text-blue-600 hover:underline">←Retour</a>

        <div class="flex gap-3">
            <a href="{{ route('admin.regions.edit', $region->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Modifier
            </a>
        </div>
    </div>
</div>
@endsection
