@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Détails de l'emploi</h1>

    <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
        <p><strong>Titre :</strong> {{ $emploi->titre }}</p>

        <p class="mt-2"><strong>Description :</strong><br>
            {!! nl2br(e($emploi->description)) ?: '—' !!}
        </p>

        <p class="mt-2"><strong>Grade :</strong> {{ $emploi->grade->nom ?? '—' }}</p>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('admin.emplois.index') }}"
           class="text-blue-600 hover:underline">← Retour à la liste</a>

        <div class="flex gap-3">
            <a href="{{ route('admin.emplois.edit', $emploi->id) }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
                Modifier
            </a>
        </div>
    </div>
</div>
@endsection
