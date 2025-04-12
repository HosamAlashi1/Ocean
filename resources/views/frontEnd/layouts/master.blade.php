<!DOCTYPE html>
<html

        @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale() == 'ar')
            lang="ar"
            dir="rtl"
        @else
            lang="en"
            dir="ltr"
        @endif
>
@include('frontEnd.layouts.head')

<body data-bs-spy="scroll" data-bs-target="#fixedNavbar">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX65DHS7"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- Navbar -->
@include('frontEnd.layouts.header')
<!-- Content Section -->

    @yield('content')
</div>

<!-- Footer -->
@include('frontEnd.layouts.footer')

@include('frontEnd.layouts.scripts')
</body>

</html>
