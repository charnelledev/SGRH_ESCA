@extends('layouts.application')

@section('content')
    <main class="p-4 mx-auto max-w-screen-xl md:p-6">
        <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">

            <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-6">
                Paramètres du compte
            </h2>

            {{-- Message de succès --}}
            @if (session('status') === 'profile-updated')
                <div class="mb-4 text-sm text-green-600 dark:text-green-400">
                    Profil mis à jour avec succès.
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600"
                        required>
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                    <input type="text" id="last_name" name="last_name"
                        value="{{ old('last_name', auth()->user()->last_name) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600"
                        required>
                    @error('last_name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600"
                        required>
                    @error('email')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="telephone"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                    <input type="text" id="telephone" name="telephone"
                        value="{{ old('telephone', auth()->user()->telephone) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    @error('telephone')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de
                        passe</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-800 dark:text-white dark:border-gray-600">
                    <p class="text-xs text-gray-500 mt-1 dark:text-gray-400">Laisse vide si tu ne veux pas changer le mot de
                        passe.</p>
                    @error('password')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-full">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 transition">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>

        </div>
    </main>
@endsection
