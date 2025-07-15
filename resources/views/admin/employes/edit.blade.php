@extends('layouts.admin.layouts-admin')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-6">Éditer un employé</h2>

    <form action="{{ route('admin.employes.update', $employe->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        @include('admin.employes.form', ['employe' => $employe, 'emplois' => $emplois, 'regions' => $regions, 'niveauxPoste' => $grades, 'button' => 'Mettre à jour'])

    </form>
</div>
@endsection

{{-- @extends('layouts.application')

@section('content')
<h1 class="text-2xl font-bold mb-4">Éditer un employé</h1>

@include('admin.employes.form', ['employe' => $employe, 'emplois' => $emplois, 'regions' => $regions, 'niveauxPoste' => $niveauxPoste])

@endsection --}}
