@extends('layouts.admin.layouts-admin')

@section('content')
<div class="p-6 max-w-3xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Ajouter un emploi</h1>
    @include('admin.emplois.form')
</div>
@endsection
