
@extends('employee.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-8 bg-white dark:bg-gray-800 p-6 rounded shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-blue-600 dark:text-blue-300">
        Mon profil
        <span class="text-sm text-gray-500 dark:text-gray-400">({{ Auth::user()->email }})</span>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-center">
        {{-- PHOTO --}}
        <div class="text-center">
            @if ($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                     alt="Photo de profil"
                     class="w-40 h-40 rounded-full mx-auto shadow border">
            @else
                <div class="w-40 h-40 rounded-full bg-gray-300 dark:bg-gray-600 mx-auto flex items-center justify-center text-4xl">
                    👤
                </div>
            @endif
        </div>

        {{-- INFOS --}}
        <div>
            <p><strong>Nom :</strong> {{ $user->last_name }}</p>
            <p><strong>Prénom :</strong> {{ $user->name }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
            <p><strong>Région :</strong> {{ $user->region->nom ?? '-' }}</p>
            <p><strong>Emploi :</strong> {{ $user->emploi->titre ?? '-' }}</p>
            <p><strong>Grade :</strong> {{ $user->grade->nom ?? '-' }}</p>
            <p><strong>Salaire min :</strong> {{ $user->salaire_min ?? '-' }} FCFA</p>
            <p><strong>Salaire max :</strong> {{ $user->salaire_max ?? '-' }} FCFA</p>
        </div>
    </div>

    {{-- BOUTON MODIFICATION --}}
    <div class="mt-6 text-right">
        <a href="{{ route('profile.edit') }}"
           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            ✏️ Modifier mes informations
        </a>
    </div>
</div>
@endsection


