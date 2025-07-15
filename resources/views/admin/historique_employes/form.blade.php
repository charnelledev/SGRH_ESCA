<div class="bg-white dark:bg-gray-900 p-6 rounded shadow max-w-3xl mx-auto">
    @php $isEdit = isset($historiqueEmploye); @endphp

    <div class="mb-4">
        <label for="employe_id" class="block font-semibold text-gray-700 dark:text-white">Employé</label>
        <select name="employe_id" id="employe_id"
                class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded px-3 py-2">
            @foreach ($employes as $employe)
                <option value="{{ $employe->id }}" {{ old('employe_id', $historiqueEmploye->employe_id ?? '') == $employe->id ? 'selected' : '' }}>
                    {{ $employe->name }}
                </option>
            @endforeach
        </select>
        @error('employe_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="emploi_id" class="block font-semibold text-gray-700 dark:text-white">Emploi</label>
        <select name="emploi_id" id="emploi_id"
                class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded px-3 py-2">
            @foreach ($emplois as $emploi)
                <option value="{{ $emploi->id }}" {{ old('emploi_id', $historiqueEmploye->emploi_id ?? '') == $emploi->id ? 'selected' : '' }}>
                    {{ $emploi->titre }}
                </option>
            @endforeach
        </select>
        @error('emploi_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="date_debut" class="block font-semibold text-gray-700 dark:text-white">Date de début</label>
        <input type="date" name="date_debut" id="date_debut"
               value="{{ old('date_debut', $historiqueEmploye->date_debut ?? '') }}"
               class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded px-3 py-2">
        @error('date_debut') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="mb-4">
        <label for="date_fin" class="block font-semibold text-gray-700 dark:text-white">Date de fin</label>
        <input type="date" name="date_fin" id="date_fin"
               value="{{ old('date_fin', $historiqueEmploye->date_fin ?? '') }}"
               class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white rounded px-3 py-2">
        @error('date_fin') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>
