<aside class="w-64 bg-white dark:bg-gray-800 shadow-lg min-h-screen">
    <div class="p-4 text-center font-bold text-lg text-blue-600 dark:text-blue-300">
        👤 Espace Employé
    </div>
    <nav class="mt-6 space-y-1">
        {{-- <a href="{{ route('') }}"
           class="block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white transition">
            🏠 Accueil
        </a> --}}
        <a href="{{ route('employee.dashboard') }}"
           class="block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white transition">
            📊 Tableau de bord
        </a>
        <a href="{{ route('profile.index') }}"
           class="block px-4 py-2 text-sm hover:bg-blue-500 hover:text-white transition">
            🧾 Mon profil
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="block w-full text-left px-4 py-2 text-sm hover:bg-red-600 hover:text-white transition">
                🚪 Déconnexion
            </button>
        </form>
    </nav>
</aside>

