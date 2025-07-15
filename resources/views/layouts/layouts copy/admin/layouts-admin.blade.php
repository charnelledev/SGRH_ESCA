{{-- resources/views/pages/dashboard-app.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite([
              'resources/css/app.css',
              'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/index.js',
               ])

        @endif
    </head>
    <body 
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
         darkMode = JSON.parse(localStorage.getItem('darkMode'));
         $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
  >
    <!-- ===== Preloader Start ===== -->
      {{-- @include('pages.partials.preloader') --}}

    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
      @include('layouts.admin.sidebar-admin')
      <!-- ===== Sidebar End ===== -->

      <!-- ===== Content Area Start ===== -->
      <div
        class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto"
      >
        <!-- Small Device Overlay Start -->
        {{-- <include src="./partials/overlay.html" /> --}}
      {{-- @include('pages.partials.overlay') --}}

        <!-- Small Device Overlay End -->

        <!-- ===== Header Start ===== -->
         @include('layouts.admin.header-admin')
        <!-- ===== Header End ===== -->

       
        <!-- ===== Main Content Start ===== -->
      <main>
         <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">      
           @yield('content')
         </div>
       </main>
        <!-- ===== Main Content End ===== -->


      </div>
      <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
  </body>
</html>
