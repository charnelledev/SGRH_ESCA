<div class="space-y-4">
    <div>
        <label for="nom" class="block text-sm font-medium text-gray-700 dark:text-white">Nom</label>
        <input type="text" name="nom" id="nom"
               value="{{ old('nom', $region->nom ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-900 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">
        @error('nom')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-900 dark:text-white dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $region->description ?? '') }}</textarea>
        @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>
</div>
