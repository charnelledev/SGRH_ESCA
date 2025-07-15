@extends('layouts.admin.layouts-admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
        Ajouter une région
    </h1>

    <form method="POST" action="{{ route('admin.regions.store') }}" class="space-y-6">
        @csrf

        @include('admin.regions.form')

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded shadow">
                <i class="fas fa-save mr-2"></i> Enregistrer
            </button>
        </div>
    </form>
</div>
@endsection
