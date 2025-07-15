@php $isEdit = isset($grade); @endphp

<div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded shadow">
    <form action="{{ $isEdit ? route('admin.grade.update', $grade->id) : route('admin.grade.store') }}" method="POST">
        @csrf
        @if ($isEdit)
            @method('PUT')
        @endif

        <div class="mb-4">
            <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-white">Nom du grade</label>
            <input type="text" name="nom" id="nom"
                   value="{{ old('nom', $grade->nom ?? '') }}"
                   class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 shadow-sm dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
                   required>
            @error('nom')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="libele" class="block text-sm font-medium text-gray-700 dark:text-white">Libellé</label>
            <textarea name="libele" id="libele" rows="3"
                      class="mt-1 block w-full border border-gray-300 dark:border-gray-600 rounded px-3 py-2 shadow-sm dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500"
            >{{ old('libele', $grade->libele ?? '') }}</textarea>
            @error('libele')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.grade.index') }}"
               class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white px-4 py-2 rounded">
                Annuler
            </a>
            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                {{ $isEdit ? 'Mettre à jour' : 'Créer' }}
            </button>
        </div>
    </form>
</div>
