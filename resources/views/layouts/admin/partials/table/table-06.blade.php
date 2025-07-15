<div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="flex flex-col gap-2 mb-4 px-5 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">
                Employés Actifs
            </h3>
        </div>
        <div class="flex items-center gap-3">
            <a
                href="{{ route('admin.employes.index') }}"
                class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200"
            >
                Voir tout
            </a>
        </div>
    </div>

    <div class="max-w-full overflow-x-auto">
        <table class="min-w-full">
            <!-- table header start -->
            <thead>
                <tr class="border-b border-gray-100 dark:border-gray-800">
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Employé
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Grade
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Région
                            </p>
                        </div>
                    </th>
                    <th class="px-5 py-3 sm:px-6">
                        <div class="flex items-center">
                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                Salaire Minimum
                            </p>
                        </div>
                    </th>
                </tr>
            </thead>
            <!-- table header end -->
            <!-- table body start -->
            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                @forelse ($active_employees as $employee)
                    <tr>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="flex items-center gap-3">
                                    <div>
                                        <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                            {{ $employee->name ?? 'Non spécifié' }}
                                        </span>
                                        <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
                                            {{ $employee->emploi->title ?? 'Non spécifié' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    {{ $employee->emploi && $employee->emploi->grade ? $employee->emploi->grade->name : 'Non spécifié' }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    {{ $employee->region ? $employee->region->name : 'Non spécifié' }}
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    {{ $employee->emploi ? number_format($employee->emploi->salary_min ?? 0, 2) : '0.00' }}
                                </p>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-4 sm:px-6 text-center">
                            <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                Aucun employé trouvé.
                            </p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>