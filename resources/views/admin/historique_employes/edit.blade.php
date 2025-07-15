@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold">Modifier l’historique</h2>
        <a href="{{ route('admin.historique_employes.index') }}"
           class="text-sm bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
           Retour
        </a>
    </div>
    <form method="POST" action="{{ route('admin.historique_employes.update', $historiqueEmploye->id) }}">
        @csrf
        @method('PUT')
        @include('admin.historique_employes.form')
        <div class="mt-6 text-right">
            <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
