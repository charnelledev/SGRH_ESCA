<header class="bg-gray-200 dark:bg-gray-700 p-4 shadow-md flex justify-between items-center">
    <h1 class="text-xl font-semibold">Bienvenue, {{ Auth::user()->name }}</h1>
    <div>
        <span class="text-sm text-gray-600 dark:text-gray-300">{{ Auth::user()->email }}</span>
    </div>
</header>
