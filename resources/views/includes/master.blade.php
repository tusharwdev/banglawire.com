<!DOCTYPE html>
<html lang="en-US">
<head>
    @include('includes.head')
</head>
<body>
<!-- site wrapper -->
<div class="site-wrapper">
    <div class="main-overlay"></div>
    @include('includes.header')
    @yield('content')
</div>

</body>
@include('includes.footer')
@include('includes.scripts')
