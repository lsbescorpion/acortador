<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('pagina')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" />
        <link href="{{ asset('board/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('board/plugins/global/plugins.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('board/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('board/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('board/css/themes/layout/header/base/light.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('board/css/themes/layout/header/menu/light.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('board/css/themes/layout/brand/light.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('board/css/themes/layout/aside/light.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->  
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
        @yield('style')     <!--end::Layout Themes-->

        <link rel="shortcut icon" href="{{ asset('board/media/logos/favicon.ico') }}"/>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    </head>
    <body id="kt_body" class="SFG_body noBlocks firstLoad header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize aside-minimize-hoverable page-loading">
        @include('components.partials.headermovile')
        <div class="d-flex flex-column flex-root">
            <div class="d-flex flex-row flex-column-fluid page">
                @include('components.partials.sidebar')
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    @include('components.partials.navbarapp')
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                        <div class="d-flex flex-column-fluid">
                            <div class="container-fluid">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script>
    var KTAppSettings = {
    "breakpoints": {
        "sm": 576,
        "md": 768,
        "lg": 992,
        "xl": 1200,
        "xxl": 1400
    },
    "colors": {
        "theme": {
            "base": {
                "white": "#ffffff",
                "primary": "#3699FF",
                "secondary": "#E5EAEE",
                "success": "#1BC5BD",
                "info": "#8950FC",
                "warning": "#FFA800",
                "danger": "#F64E60",
                "light": "#E4E6EF",
                "dark": "#181C32"
            },
            "light": {
                "white": "#ffffff",
                "primary": "#E1F0FF",
                "secondary": "#EBEDF3",
                "success": "#C9F7F5",
                "info": "#EEE5FF",
                "warning": "#FFF4DE",
                "danger": "#FFE2E5",
                "light": "#F3F6F9",
                "dark": "#D6D6E0"
            },
            "inverse": {
                "white": "#ffffff",
                "primary": "#ffffff",
                "secondary": "#3F4254",
                "success": "#ffffff",
                "info": "#ffffff",
                "warning": "#ffffff",
                "danger": "#ffffff",
                "light": "#464E5F",
                "dark": "#ffffff"
            }
        },
        "gray": {
            "gray-100": "#F3F6F9",
            "gray-200": "#EBEDF3",
            "gray-300": "#E4E6EF",
            "gray-400": "#D1D3E0",
            "gray-500": "#B5B5C3",
            "gray-600": "#7E8299",
            "gray-700": "#5E6278",
            "gray-800": "#3F4254",
            "gray-900": "#181C32"
        }
    },
    "font-family": "Poppins"
    };
    </script>
    <script src="{{ asset('board/plugins/global/plugins.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('board/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('board/js/scripts.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('board/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.6') }}"></script>
    <!--script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM?v=7.0.6"></script>
    <script src="{{ asset('board/plugins/custom/gmaps/gmaps.js?v=7.0.6') }}"></script>
    <script src="{{ asset('board/js/pages/widgets.js?v=7.0.6') }}"></script-->
    <script type="text/javascript">
        "use strict";

        var KTIdleTimerDemo = function() {
            var _init = function() {
                var docTimeout = 1800000;
                $(document).on("idle.idleTimer", function(event, elem, obj) {
                    KTSessionTimeoutDemo.init();
                });
                
                $(document).idleTimer(docTimeout);
            }

            return {
                init: function() {
                    _init();
                }
            };
        }();



        var KTSessionTimeoutDemo = function() {
            var initDemo = function() {
                $.sessionTimeout({
                    title: "Session Timeout Notification",
                    message: "Your session is about to expire.",
                    keepAliveUrl: '#',
                    redirUrl: "{{route('Login')}}",
                    logoutUrl: "{{route('Login')}}",
                    warnAfter: 5000, //warn after 5 seconds
                    redirAfter: 15000, //redirect after 15 secons,
                    ignoreUserActivity: true,
                    countdownMessage: 'Redirecting in {timer} seconds.',
                    countdownBar: true
                });
            }

            return {
                //main function to initiate the module
                init: function() {
                    initDemo();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTIdleTimerDemo.init();
        });
        
    </script>
    @yield('script')
    </body>
</html>
