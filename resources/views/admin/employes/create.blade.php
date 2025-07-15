@extends('layouts.admin.layouts-admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Ajouter un employé</h2>

    <form action="{{ route('admin.employes.store') }}" method="POST" class="space-y-4">
        @csrf

        @include('admin.employes.form', ['button' => 'Ajouter'])

    </form>
</div>
@endsection


{{-- @extends('layouts.application')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un employé</h1>

    <form method="POST" action="{{ route('admin.employes.store') }}">
        @csrf
        @include('admin.employes.form', [
            'employe' => null,
            'emplois' => $emplois,
            'regions' => $regions,
            'grades' => $grades
        ])
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
</div>
@endsection --}}
