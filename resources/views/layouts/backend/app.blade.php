<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   @include('layouts.backend.includes.head')
    @stack('css')
</head>

<body>

<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        @include('layouts.backend.includes.header')
    </div>

    <div class="app-main">
        @include('layouts.backend.includes.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')
            </div>
        @include('layouts.backend.includes.footer')
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript" src="{{ asset('assets/scripts/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/iziToast.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@stack('js')
@include('vendor.lara-izitoast.toast')
</body>


</html>
