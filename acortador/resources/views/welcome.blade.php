<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
        <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            Acortador Laravel
        </title>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
          <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
          <!-- CSS Files -->
        <link href="{{asset('assets/css/material-kit.min.css?v=2.2.0')}}" rel="stylesheet" />
    </head>
    <body class="profile-page sidebar-collapse">
        @include('components.partials.navbar')
        <div class="page-header header-filter" data-parallax="true" style="background-image: url({{asset('assets/img/city-profile.jpg')}});"></div>
        <div class="main main-raised" id="main_content">
            <div class="container">
                @yield('content')
            </div>
        </div>
        @include('components.partials.footer')
        <script src="{{asset('assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/core/popper.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
      <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
        <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{asset('assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
      <!--  Google Maps Plugin    -->
      <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
        <script src="{{asset('assets/js/material-kit.min.js?v=2.2.0')}}" type="text/javascript"></script>
        @yield('script')
    </body>
</html>
