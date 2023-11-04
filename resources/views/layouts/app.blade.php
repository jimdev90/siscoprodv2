<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    @stack('styles_vendor')
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    @stack('styles_custom')

</head>
<body id="kt_body" class="header-fixed header-mobile-fixed sidebar-enabled page-loading">
@include('layouts.common.header_mobile')
<div class="d-flex flex-column flex-root" id="app">
    <div class="d-flex flex-row flex-column-fluid page">
        @include('layouts.common.aside')
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            @include('layouts.common.header')
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
                    <div
                        class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                        <div class="d-flex align-items-center flex-wrap mr-1">
                            <div class="d-flex align-items-baseline flex-wrap mr-5">
                                <h5 class="text-dark font-weight-bold my-1 mr-5">@yield("nombre_modulo")</h5>
                                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                                    @yield('content_submenu')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column-fluid">
                    @yield('content')
                </div>
            </div>
            @include('layouts.common.footer')
        </div>

    </div>
</div>
@include('layouts.common.panel_profile')
<script>
    const HOST_URL = "{{ config('app.url') }}";
    const URL_FOTO_PERSONAL_SAGA = "{{ config('app.url_foto_saga') }}";
</script>
<script>
    const KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#663259",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#F3F6F9",
                    "dark": "#212121"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#F4E1F0",
                    "secondary": "#ECF0F3",
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
                    "secondary": "#212121",
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
                "gray-200": "#ECF0F3",
                "gray-300": "#E5EAEE",
                "gray-400": "#D6D6E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#80808F",
                "gray-700": "#464E5F",
                "gray-800": "#1B283F",
                "gray-900": "#212121"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Theme Bundle-->
@stack('scripts_vendor')
<script src="{{ asset('js/app.js') }}"></script>
@if( session()->has('process_result') )
    <script>
        $(function () {
            toastr.{{ session('process_result')['status'] }}('{{ session('process_result')['content'] }}')
        });
    </script>
@endif
@stack('scripts_custom')
</body>
</html>
