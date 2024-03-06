<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Nabung</title>

    {{-- Assets --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    {{-- Custom CSS --}}
    @yield('css')

    {{-- Icon --}}
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

</head>

<body>
    <div id="app">


        {{-- Sidebar : Start --}}
        @include('backend.layout.sidebar.index')
        {{-- Sidebar : End --}}

        {{-- Main : Start --}}
        <div id="main">

            {{-- Navbar : Start --}}
            @include('backend.layout.navbar.index')
            {{-- Navbar : End --}}

            <div class="main-content container-fluid">

                {{-- Page Title Section : Start --}}
                <div class="page-title">
                    <h3>@yield('page-title')</h3>
                    <p class="text-subtitle text-muted">@yield('page-description')</p>
                </div>
                {{-- Page Title Section : End --}}

                {{-- Main Section : Start --}}
                <section class="section">
                    @yield('content')
                </section>
                {{-- Main Section : End --}}

            </div>

            {{-- Footer : Start --}}
            @include('backend.layout.footer.index')
            {{-- Footer : End --}}

        </div>
        {{-- Main : End --}}

    </div>

    {{-- Javascript Assets --}}
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>



</body>

</html>
