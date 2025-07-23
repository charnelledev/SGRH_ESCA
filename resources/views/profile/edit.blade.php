{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
{{-- 
@extends('employee.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white dark:bg-gray-800 p-6 rounded shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-blue-600 dark:text-blue-300">
        Mon profil
        <span class="text-sm text-gray-500 dark:text-gray-400">({{ Auth::user()->email }})</span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
        {{-- PHOTO --}}
{{-- <div class="text-center">
            @if ($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                     alt="Photo de profil"
                     class="w-40 h-40 rounded-full mx-auto shadow border">
            @else
                <div class="w-40 h-40 rounded-full bg-gray-300 dark:bg-gray-600 mx-auto flex items-center justify-center text-4xl">
                    👤
                </div>
            @endif
        </div> --}}

{{-- INFOS --}}
{{-- <div>
            <p><strong>Nom :</strong> {{ $user->last_name }}</p>
            <p><strong>Prénom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Téléphone :</strong> {{ $user->phone_number }}</p>
            <p><strong>Région :</strong> {{ $user->region->nom ?? '-' }}</p>
            <p><strong>Emploi :</strong> {{ $user->emploi->titre ?? '-' }}</p>
            <p><strong>Grade :</strong> {{ $user->grade->nom ?? '-' }}</p>
            <p><strong>Salaire min :</strong> {{ $user->salaire_min ?? '-' }} FCFA</p>
            <p><strong>Salaire max :</strong> {{ $user->salaire_max ?? '-' }} FCFA</p>
        </div>
    </div> --}}

{{-- BOUTON MODIFICATION --}}
{{-- <div class="mt-6 text-right">
        <a href="{{ route('profile.edit') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            ✏️ Modifier mes informations
        </a>
    </div>
</div>
@endsection --}}

@extends('employee.layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-blue-600 dark:text-blue-300">Modifier mes informations</h2>

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            {{-- PHOTO --}}

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Photo de profil</label>
                <input type="file" name="profile_photo" class="block w-full text-sm">
                @if ($user->profile_photo_path)
                    <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                        class="mt-2 w-24 h-24 rounded-full border">
                @endif
            </div>

            {{-- NOM --}}
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Nom</label>
                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
            </div>

            {{-- PRÉNOM --}}
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Prénom</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
            </div>

            {{-- TÉLÉPHONE --}}
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Téléphone</label>
                <input type="text" name="telephone" value="{{ old('telephone', $user->telephone) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
            </div>

            {{-- EMAIL --}}
            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full px-3 py-2 border rounded dark:bg-gray-700 dark:text-white">
            </div>

            <div class="flex justify-end space-x-2 mt-4">
    {{-- Bouton Retour --}}
    <a href="{{ route('profile.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
        ← Retour
    </a>

    {{-- Bouton Annuler (reset du formulaire) --}}
    <button type="reset" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">
        🔄 Annuler
    </button>

    {{-- Bouton Enregistrer --}}
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        💾 Enregistrer les modifications
    </button>
</div>


        </form>
    </div>
@endsection
