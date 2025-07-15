@extends('layouts.admin.layouts-admin')

@section('content')
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="bg-white dark:bg-gray-900 text-gray-800 dark:text-white min-h-screen">
        <div class="mx-auto max-w-screen-xl p-4 md:p-6">
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">
                    {{ isset($employe) ? 'Modifier un employé' : 'Ajouter un employé' }}
                </h2>
                <a href="{{ route('admin.employes.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600">
                    ← Retour
                </a>
            </div>

            <form
                action="{{ isset($employe) ? route('admin.employes.update', $employe->id) : route('admin.employes.store') }}"
                method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                @csrf
                @if (isset($employe))
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Prénom --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Prénom</label>
                        <input type="text" name="name" value="{{ old('name', $employe->name ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nom --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Nom</label>
                        @error('last_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="last_name" value="{{ old('last_name', $employe->last_name ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />

                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Email</label>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="email" name="email" value="{{ old('email', $employe->email ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />

                    </div>

                    {{-- Mot de passe --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Mot de passe</label>
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="password" name="password"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />

                    </div>

                    {{-- Téléphone --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                        @error('telephone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="text" name="telephone" value="{{ old('telephone', $employe->telephone ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />

                    </div>

                    {{-- Date d’embauche --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Date d’embauche</label>
                        @error('date_embauche')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="date" name="date_embauche"
                            value="{{ old('date_embauche', isset($employe->date_embauche) ? $employe->date_embauche->format('Y-m-d') : '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />

                    </div>

                    {{-- Emploi --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Poste</label>
                        @error('emploi_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="emploi_id"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700">
                            <option value="">-- Sélectionnez un poste --</option>
                            @foreach ($emplois as $emploi)
                                <option value="{{ $emploi->id }}"
                                    {{ old('emploi_id', $employe->emploi_id ?? '') == $emploi->id ? 'selected' : '' }}>
                                    {{ $emploi->titre }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    {{-- Région --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Région</label>
                        @error('region_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="region_id"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700">
                            <option value="">-- Sélectionnez une région --</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}"
                                    {{ old('region_id', $employe->region_id ?? '') == $region->id ? 'selected' : '' }}>
                                    {{ $region->nom }}
                                </option>
                            @endforeach
                        </select>

                    </div>


                    {{-- Grade --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Grade</label>
                        @error('grade_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <select name="grade_id"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700">
                            <option value="">-- Sélectionnez un grade --</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}"
                                    {{ old('grade_id', $employe->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                                    {{ $grade->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    {{-- Salaire --}}
                    {{-- <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Salaire</label>
                        @error('salary')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="number" step="0.01" name="salary"
                            value="{{ old('salary', $employe->salary ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />

                    </div> --}}

                    {{-- Salaire Minimal --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Salaire Minimal</label>
                        @error('salary_min')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="number" step="0.01" name="salary_min"
                            value="{{ old('salary_min', $employe->salary_min ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />
                    </div>

                    {{-- Salaire Maximal --}}
                    <div>
                        <label class="block mb-1 font-medium text-gray-700 dark:text-gray-300">Salaire Maximal</label>
                        @error('salary_max')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <input type="number" step="0.01" name="salary_max"
                            value="{{ old('salary_max', $employe->salary_max ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg dark:bg-gray-800 dark:text-white dark:border-gray-700" />
                    </div>


                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg">
                        {{ isset($employe) ? 'Mettre à jour' : 'Enregistrer' }}
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
