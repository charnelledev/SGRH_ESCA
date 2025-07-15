@extends('layouts.admin.layouts-admin')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
        Modifier la région
    </h1>

    <form method="POST" action="{{ route('admin.regions.update', $region->id) }}" class="space-y-6">
        @csrf
        @method('PUT')

        @include('admin.regions.form', ['region' => $region])

        <div class="flex justify-end">
            <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold px-6 py-2 rounded shadow">
                <i class="fas fa-save mr-2"></i> Mettre à jour
            </button>
        </div>
    </form>
</div>
@endsection
