
<script src="{{asset('frontEnd/js/jquery.min.js')}}"></script>
<script src="{{asset('frontEnd/js/popper.min.js')}}"></script>
<script src="{{asset('frontEnd/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontEnd/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontEnd/js/sal.min.js')}}"></script>
<script src="{{asset('frontEnd/js/main.js')}}"></script>
<script>
    function toggleLanguage() {
        const isArabic = document.getElementById("language-toggle").checked;
        const locale = isArabic ? "ar" : "en";

        const currentPath = 'ar';
        window.location.href = `/${locale}${currentPath}`;
    }
</script>
@yield('scripts')
