@php $isEdit = isset($emploi); @endphp

<form method="POST" action="{{ $isEdit ? route('admin.emplois.update', $emploi) : route('admin.emplois.store') }}">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="mb-4">
        <label for="titre" class="block font-semibold mb-1">Titre *</label>
        <input id="titre" name="titre" type="text" value="{{ old('titre', $emploi->titre ?? '') }}"
               class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500"
               required>
        @error('titre')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block font-semibold mb-1">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500"
        >{{ old('description', $emploi->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="grade_id" class="block font-semibold mb-1">Grade *</label>
        <select id="grade_id" name="grade_id" required
                class="w-full border border-gray-300 dark:border-gray-700 dark:bg-gray-800 rounded px-3 py-2 focus:outline-none focus:ring focus:ring-blue-500">
            <option value="">-- Sélectionnez un grade --</option>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}"
                    {{ old('grade_id', $emploi->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                    {{ $grade->nom }}
                </option>
            @endforeach
        </select>
        @error('grade_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-end gap-2">
        <a href="{{ route('admin.emplois.index') }}"
           class="px-4 py-2 rounded bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white text-sm">
            Annuler
        </a>
        <button type="submit"
                class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white text-sm">
            {{ $isEdit ? 'Mettre à jour' : 'Enregistrer' }}
        </button>
    </div>
</form>
