{{-- <!doctype html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>esca</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

    <!-- ApexCharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- jsvectormap -->
    <link href="https://cdn.jsdelivr.net/npm/jsvectormap@1.2.2/dist/css/jsvectormap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap"></script>

    <!-- FullCalendar -->
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.15/main.min.js"></script>

<body x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode === true }">
    <!-- ===== Preloader Start ===== -->
    @include('layouts.admin.preloader-admin')
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        @include('layouts.admin.sidebar-admin')
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay Start -->
            @include('layouts.admin.overlay-admin')
            <!-- Small Device Overlay End -->

            <!-- ===== Header Start ===== -->
            @include('layouts.admin.header-admin')
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            
                 
        <main>
          <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
            <div class="grid grid-cols-12 gap-4 md:gap-6">
              <div class="col-span-12 space-y-6 xl:col-span-7">
                <!-- Metric Group One -->
             @include("layouts.admin.partials.metric-group-01-admin")
                <!-- Metric Group One -->

                <!-- ====== Chart One Start -->
             @include("layouts.admin.partials.chart-01-admin")
                <!-- ====== Chart One End -->
              </div>
              <div class="col-span-12 xl:col-span-5">
                <!-- ====== Chart Two Start -->
      @include("layouts.admin.partials.chart-02-admin")
                <!-- ====== Chart Two End -->
              </div>

              <div class="col-span-12">
                <!-- ====== Chart Three Start -->
      @include("layouts.admin.partials.chart-03-admin")
                <!-- ====== Chart Three End -->
              </div>

              <div class="col-span-12 xl:col-span-5">
                <!-- ====== Map One Start -->
                @include("layouts.admin.partials.map-01-admin")
                <!-- ====== Map One End -->
              </div>

              <div class="col-span-12 xl:col-span-7">
                <!-- ====== Table One Start -->
             @include("layouts.admin.partials.table-01-admin")
                <!-- ====== Table One End -->
              </div>
            </div>
          </div>
        </main>
                {{-- <div class="p-4 mx-auto max-w-screen-2xl md:p-6">
                    @yield('content')
                </div> --}}
        
            <!-- ===== Main Content End ===== -->
        {{-- </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->





</body>

</html> --}}

{{-- resources/views/pages/dashboard-app.blade.php --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ESCA</title>

        <!-- Fonts -->
        <!-- CSS dans public/assets/css/style.css -->
     <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Font Awesome (pour les icônes fas fa-...) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


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

    <!-- JS dans public/assets/js/index.js -->
<script src="{{ asset('assets/js/index.js') }}"></script>
<script src="{{ asset('assets/js/components/calendar-init.js') }}"></script>
<script src="{{ asset('assets/js/components/image-resize.js') }}"></script>
<script src="{{ asset('assets/js/components/map-01.js') }}"></script>
<script src="{{ asset('assets/js/components/charts/chart-01.js') }}"></script>
<script src="{{ asset('assets/js/components/charts/chart-02.js') }}"></script>
<script src="{{ asset('assets/js/components/charts/chart-02.js') }}"></script>
  </body>
</html>
