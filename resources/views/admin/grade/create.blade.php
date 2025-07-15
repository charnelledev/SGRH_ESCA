@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un grade</h1>

    @include('admin.grade.form')
</div>
@endsection
