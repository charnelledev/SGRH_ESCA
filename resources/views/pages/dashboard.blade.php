@extends('layouts.admin.layouts-admin')

@section('content')
@if(session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
        {{ session('success') }}
    </div>
@endif

        <div class="grid grid-cols-12 gap-4 md:gap-6">
          <div class="col-span-12 space-y-6 xl:col-span-7">
            <!-- Metric Group One -->         
                @include('layouts.admin.partials.metric-group.metric-group-01')

            <!-- Metric Group One -->

            <!-- ====== Chart One Start -->
             @include('layouts.admin.partials.chart.chart-01')

            <!-- ====== Chart One End -->
          </div>
          <div class="col-span-12 xl:col-span-5">
            <!-- ====== Chart Two Start -->       
                @include('layouts.admin.partials.chart.chart-02')
            <!-- ====== Chart Two End -->
          </div>

          <div class="col-span-12">
            <!-- ====== Chart Three Start -->
              @include('layouts.admin.partials.chart.chart-03')

            <!-- ====== Chart Three End -->
          </div>

          <div class="col-span-12 xl:col-span-5">
            <!-- ====== Map One Start -->
            
            @include('layouts.admin.partials.map-01')

            <!-- ====== Map One End -->
          </div>

          <div class="col-span-12 xl:col-span-7">
            <!-- ====== Table One Start -->
          
              @include('layouts.admin.partials.table.table-01')

            <!-- ====== Table One End -->
          </div>
          <div class="col-span-12 xl:col-span-7">
            <!-- ====== Table One Start -->              
              @include('layouts.admin.partials.table.table-06')
            <!-- ====== Table One End -->
          </div>
        </div>
        {{-- <script>
  document.addEventListener("DOMContentLoaded", function () {
    const chartData = {
      months: @json($months), // Ex: ["Jan", "Feb", "Mar"]
      overview: @json($overviewValues), // Ex: [12, 10, 14]
      sales: @json($salesValues),       // Ex: [5, 3, 6]
      revenue: @json($revenueValues)    // Ex: [2000, 3000, 2500]
    };

    let chart;

    function renderChart(data, title = 'Overview') {
      const options = {
        chart: {
          type: 'area',
          height: 300,
          toolbar: { show: false }
        },
        series: [{
          name: title,
          data: data
        }],
        xaxis: {
          categories: chartData.months
        },
        colors: ['#6366f1'],
        dataLabels: { enabled: false },
        stroke: {
          curve: 'smooth',
          width: 2
        },
        grid: {
          borderColor: '#e5e7eb',
          strokeDashArray: 4
        },
        tooltip: {
          theme: document.documentElement.classList.contains('dark') ? 'dark' : 'light'
        }
      };

      if (chart) {
        chart.updateOptions(options);
      } else {
        chart = new ApexCharts(document.querySelector("#chartThree"), options);
        chart.render();
      }
    }

    renderChart(chartData.overview, 'Overview');

    // Écoute les clics sur les boutons d’onglet
    document.querySelectorAll('[x-data] button').forEach(button => {
      button.addEventListener('click', () => {
        const type = button.textContent.trim().toLowerCase();
        if (chartData[type]) {
          renderChart(chartData[type], button.textContent.trim());
        }
      });
    });
  });
</script> --}}

@endsection