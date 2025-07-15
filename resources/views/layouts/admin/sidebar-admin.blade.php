<aside
  :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
  class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col justify-between overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0"
>
  <!-- SIDEBAR HEADER -->
  <div class="pt-8 pb-4 sidebar-header">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2"
       :class="sidebarToggle ? 'justify-center' : 'justify-start'">
      <img class="dark:hidden h-8 max-w-[32px] object-contain" src="{{ asset('assets/images/logo/whatsapp.jpg') }}" alt="Logo" />
      <img class="hidden dark:block h-8 max-w-[32px] object-contain" src="{{ asset('assets/images/logo/whatsapp.jpg') }}" alt="Logo" />
      <span class="text-xl font-bold text-black dark:text-white transition-all duration-200"
            :class="sidebarToggle ? 'hidden' : 'inline'">ESCA</span>
    </a>
  </div>

  <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
    <nav>
      <div class="text-xs uppercase text-gray-400 dark:text-gray-500 mb-4">Menu</div>
      <ul class="space-y-1">
        {{-- DASHBOARD --}}
        <li>
          <a href="{{ route('admin.dashboard') }}"
             class="relative flex items-center gap-3 rounded-md px-3 py-2 transition
               {{ Request::is('dashboard') ? 'bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
            @if (Request::is('dashboard'))
              <span class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-md rounded-br-md"></span>
            @endif
            <svg class="h-5 w-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M3 12h18M3 6h18M3 18h18" />
            </svg>
            <span class="truncate">Dashboard</span>
          </a>
        </li>

        {{-- EMPLOYÉS --}}
        <li>
          <a href="{{ route('admin.employes.index') }}"
             class="relative flex items-center gap-3 rounded-md px-3 py-2 transition
               {{ Request::is('admin/employes*') ? 'bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
            @if (Request::is('admin/employes*'))
              <span class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-md rounded-br-md"></span>
            @endif
            <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m6-2a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span class="truncate">Employés</span>
          </a>
        </li>

        {{-- EMPLOIS --}}
        <li>
          <a href="{{ route('admin.emplois.index') }}"
             class="relative flex items-center gap-3 rounded-md px-3 py-2 transition
               {{ Request::is('admin/emplois*') ? 'bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
            @if (Request::is('admin/emplois*'))
              <span class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-md rounded-br-md"></span>
            @endif
            <svg class="h-5 w-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
            </svg>
            <span class="truncate">Emplois</span>
          </a>
        </li>

        {{-- HISTORIQUE --}}
        <li>
          <a href="{{ route('admin.historique_employes.index') }}"
             class="relative flex items-center gap-3 rounded-md px-3 py-2 transition
               {{ Request::is('admin/historique*') ? 'bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
            @if (Request::is('admin/historique*'))
              <span class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-md rounded-br-md"></span>
            @endif
            <svg class="h-5 w-5 text-cyan-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M12 8v4l3 3M4 4v16h16V4H4z" />
            </svg>
            <span class="truncate">Historique</span>
          </a>
        </li>

        {{-- GRADES --}}
        <li>
          <a href="{{ route('admin.grade.index') }}"
             class="relative flex items-center gap-3 rounded-md px-3 py-2 transition
               {{ Request::is('admin/niveaux-poste*') ? 'bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
            @if (Request::is('admin/niveaux-poste*'))
              <span class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-md rounded-br-md"></span>
            @endif
            <svg class="h-5 w-5 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M12 6v6l4 2M4 4v16h16V4H4z" />
            </svg>
            <span class="truncate">Grade</span>
          </a>
        </li>

        {{-- REGIONS --}}
        <li>
          <a href="{{ route('admin.regions.index')}}"
             class="relative flex items-center gap-3 rounded-md px-3 py-2 transition
               {{ Request::is('admin/regions*') ? 'bg-gray-200 dark:bg-gray-800 text-gray-900 dark:text-white font-semibold' : 'text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
            @if (Request::is('admin/regions*'))
              <span class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 dark:bg-blue-400 rounded-tr-md rounded-br-md"></span>
            @endif
            <svg class="h-5 w-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-width="2" d="M21 10H7m14 0a8 8 0 11-16 0 8 8 0 0116 0z" />
            </svg>
            <span class="truncate">Régions</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

  <!-- DECONNEXION -->
  <div class="pb-4">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit"
              class="w-full text-left relative flex items-center gap-3 rounded-md px-3 py-2 text-red-600 hover:bg-red-100 dark:hover:bg-red-900 transition">
        <svg class="h-5 w-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m0-8V7a2 2 0 114 0v1" />
        </svg>
        <span class="truncate">Déconnexion</span>
      </button>
    </form>
    <div class="mt-6 flex justify-center">
      <div class="h-1 w-10 rounded-full bg-gradient-to-r from-gray-300 via-gray-500 to-gray-300 dark:from-gray-600 dark:via-gray-400 dark:to-gray-600"></div>
    </div>
  </div>
</aside>
