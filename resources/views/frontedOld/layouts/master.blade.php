<!DOCTYPE html>
<html
        lang="ar"
        @if (App::getLocale() == 'ar')
            dir="rtl"
        @else
            dir="ltr"
        @endif
>
@include('frontedOld.layouts.head')
<body>
<!-- Navbar -->
@include('frontedOld.layouts.header')
<!-- Content Section -->
<div class="body-container">
    @yield('content')
</div>

<!-- Footer -->
@include('frontedOld.layouts.footer')

@include('frontedOld.layouts.scripts')
</body>
</html>
