<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
    <!-- Nombre total d'employés -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
            <!-- Icône utilisateur -->
            <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.8 5.6C7.6 5.6 6.6 6.6 6.6 7.8s1 2.2 2.2 2.2S11 9 11 7.8s-1-2.2-2.2-2.2Zm-3.7 10.7c-.8.8-1.2 1.8-1.4 2.7-.1.3.1.5.3.7.1.1.3.2.5.2h9.3c.2 0 .4-.1.5-.2.2-.2.3-.4.3-.7-.2-.9-.6-1.9-1.4-2.7-.8-.7-2-1.3-3.9-1.3s-3.2.6-3.9 1.3Z"/>
            </svg>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Employés</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ $users_count }}
                </h4>
            </div>

            <span class="flex items-center gap-1 rounded-full bg-success-50 py-0.5 px-2.5 text-sm font-medium text-success-600 dark:bg-success-500/15 dark:text-success-500">
                <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.6 1.6a.6.6 0 011 .1L9.7 4.6a.6.6 0 01-.9.9L6.9 3.9v6.2a.6.6 0 01-1.2 0V3.9L3.2 5.6a.6.6 0 11-.9-.9l3-3Z"/>
                </svg>
                +11.01%
            </span>
        </div>
    </div>

    <!-- Deuxième statistique : Total des régions (ou autre) -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gray-100 dark:bg-gray-800">
            <!-- Icône bâtiment ou archive -->
            <svg class="fill-gray-800 dark:fill-white/90" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7 3.8c.2-.1.5-.1.7 0l6.4 3.2-6.4 3.2c-.2.1-.5.1-.7 0L5.3 7l6.4-3.2ZM4.3 8.2v7.9c0 .3.2.5.5.6l6.5 3.3V11.7a3.4 3.4 0 01-.3-.2L4.3 8.2Zm8.5 11.7 6.5-3.3a.6.6 0 00.4-.6V8.2l-6.4 3.2c-.1 0-.2.1-.4.2v8.3Z"/>
            </svg>
        </div>

        <div class="mt-5 flex items-end justify-between">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">Régions</span>
                <h4 class="mt-2 text-title-sm font-bold text-gray-800 dark:text-white/90">
                    {{ $regions_count }}
                </h4>
            </div>

            <span class="flex items-center gap-1 rounded-full bg-error-50 py-0.5 px-2.5 text-sm font-medium text-error-600 dark:bg-error-500/15 dark:text-error-500">
                <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.3 10.4a.6.6 0 00.9.1l3-3a.6.6 0 10-.9-.9L6.6 8V1.9a.6.6 0 10-1.2 0V8L3.2 6.3a.6.6 0 10-.9.9l3 3Z"/>
                </svg>
                -2.43%
            </span>
        </div>
    </div>
</div>
