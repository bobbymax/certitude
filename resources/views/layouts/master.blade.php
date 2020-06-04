
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Vendors Min CSS -->
        <link rel="stylesheet" href="/assets/css/vendors.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="/assets/css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="/assets/css/responsive.css">

        <title>@yield('title', 'Welcome to the Certitude')</title>

        <link rel="icon" type="image/png" href="/assets/img/favicon.png">
        <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </head>

    <body>

        <!-- Start Sidemenu Area -->
        @include('layouts.partials.aside')
        <!-- End Sidemenu Area -->

        <!-- Start Main Content Wrapper Area -->
        <div class="main-content d-flex flex-column">

            <!-- Top Navbar Area -->
            @include('layouts.partials.top-bar')
            <!-- End Top Navbar Area -->
            
            <!-- Breadcrumb Area -->
            @include('layouts.partials.breadcrumb')
            <!-- End Breadcrumb Area -->

            <div class="flex-grow-1">
                @yield('content')
            </div>
			
            <!-- Start Footer End -->
            @include('layouts.partials.footer')
            <!-- End Footer End -->
        </div>
        <!-- End Main Content Wrapper Area -->
        

        <!-- Vendors Min JS -->
        <script src="/assets/js/vendors.min.js"></script>

        <!-- ApexCharts JS -->
        <script src="/assets/js/apexcharts/apexcharts.min.js"></script>
        <script src="/assets/js/apexcharts/apexcharts-stock-prices.js"></script>
        <script src="/assets/js/apexcharts/apexcharts-irregular-data-series.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-line-chart.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-pie-donut-chart.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-area-charts.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-column-chart.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-bar-charts.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-mixed-charts.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-radialbar-charts.js"></script>
        <script src="/assets/js/apexcharts/apex-custom-radar-chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <!-- ChartJS -->
        <script src="/assets/js/chartjs/chartjs.min.js"></script>
		<!-- To use template colors with Javascript -->
        <div class="chartjs-colors"> 
            <div class="bg-primary"></div>
            <div class="bg-primary-light"></div>
            <div class="bg-secondary"></div>
            <div class="bg-info"></div>
            <div class="bg-success"></div>
            <div class="bg-success-light"></div>
            <div class="bg-danger"></div>
            <div class="bg-warning"></div>
            <div class="bg-purple"></div>
            <div class="bg-pink"></div>
        </div>
        
        <!-- jvectormap Min JS -->
        <script src="/assets/js/jvectormap-1.2.2.min.js"></script>
        <!-- jvectormap World Mil JS -->
        <script src="/assets/js/jvectormap-world-mill-en.js"></script>
        <!-- Custom JS -->
        <script src="/assets/js/custom.js"></script>
        <script src="{{ asset('js/dropzone.js') }}"></script>
        @yield('scripts')
    </body>
</html>