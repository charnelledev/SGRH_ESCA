
<div class="bg-white dark:bg-gray-900 rounded-2xl shadow-xl p-8 transform transition-all hover:shadow-2xl">
    @error('employe_id')
        <p class="text-red-500 text-sm mt-2 animate-pulse">{{ $message }}</p>
    @enderror
    <form action="{{ isset($historiqueEmploye) ? route('admin.historique_employes.update', $historiqueEmploye->id) : route('admin.historique_employes.store') }}"
          method="POST" class="space-y-6">
        @csrf
        @if(isset($historiqueEmploye))
            @method('PUT')
        @endif

        <!-- Champ Employé -->
        <div>
            <label for="employe_id" class="flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Employé
            </label>
            <select name="employe_id" id="employe_id"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200">
                <option value="" disabled {{ old('employe_id', $historiqueEmploye->employe_id ?? $employeSelectionne?->id ?? '') ? '' : 'selected' }}>
                    Sélectionnez un employé
                </option>
                @if(isset($employes) && $employes->isNotEmpty())
                    @foreach ($employes as $employe)
                        <option value="{{ $employe->id }}"
                                {{ old('employe_id', $historiqueEmploye->employe_id ?? $employeSelectionne?->id ?? '') == $employe->id ? 'selected' : '' }}>
                            {{ $employe->name }} {{ $employe->last_name ?? '' }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled>Aucun employé disponible</option>
                @endif
            </select>
            @error('employe_id')
                <p class="text-red-500 text-sm mt-2 animate-pulse">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Emploi -->
        <div>
            <label for="emploi_id" class="flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Emploi
            </label>
            <select name="emploi_id" id="emploi_id"
                    class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200">
                <option value="" disabled {{ old('emploi_id', $historiqueEmploye->emploi_id ?? '') ? '' : 'selected' }}>
                    Sélectionnez un emploi
                </option>
                @if(isset($emplois) && $emplois->isNotEmpty())
                    @foreach ($emplois as $emploi)
                        <option value="{{ $emploi->id }}"
                                {{ old('emploi_id', $historiqueEmploye->emploi_id ?? '') == $emploi->id ? 'selected' : '' }}>
                            {{ $emploi->titre }}
                        </option>
                    @endforeach
                @else
                    <option value="" disabled>Aucun emploi disponible</option>
                @endif
            </select>
            @error('emploi_id')
                <p class="text-red-500 text-sm mt-2 animate-pulse">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Date de début -->
        <div>
            <label for="date_debut" class="flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Date de début
            </label>
            <input type="date" name="date_debut" id="date_debut"
                   value="{{ old('date_debut', $historiqueEmploye->date_debut ?? '') }}"
                   class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200">
            @error('date_debut')
                <p class="text-red-500 text-sm mt-2 animate-pulse">{{ $message }}</p>
            @enderror
        </div>

        <!-- Champ Date de fin -->
        <div>
            <label for="date_fin" class="flex items-center text-sm font-medium text-gray-600 dark:text-gray-300 mb-2">
                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                Date de fin
            </label>
            <input type="date" name="date_fin" id="date_fin"
                   value="{{ old('date_fin', $historiqueEmploye->date_fin ?? '') }}"
                   class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-gray-900 dark:text-gray-200 rounded-lg px-4 py-3 focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-200">
            @error('date_fin')
                <p class="text-red-500 text-sm mt-2 animate-pulse">{{ $message }}</p>
            @enderror
        </div>

        <!-- Boutons d'action -->
        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-4 sm:space-y-0 justify-end mt-8">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-full transition duration-300 shadow-md flex items-center justify-center transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                {{ isset($historiqueEmploye) ? 'Mettre à jour' : 'Créer' }}
            </button>
            <a href="{{ route('admin.historique_employes.index') }}"
               class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-full transition duration-300 shadow-md flex items-center justify-center transform hover:scale-105">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Annuler
            </a>
        </div>
    </form>
</div>
