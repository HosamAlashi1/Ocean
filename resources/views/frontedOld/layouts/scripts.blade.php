<script>
    function openMenu() {
        document.getElementById("hamburgerMenu").classList.add("show");
    }

    function closeMenu() {
        document.getElementById("hamburgerMenu").classList.remove("show");
    }
</script>
<script>
    // Toggle Language function
    function toggleLanguage() {
        const isArabic = document.getElementById("language-toggle").checked;
        const locale = isArabic ? "ar" : "en";

        const currentPath = window.location.pathname.replace(/^\/(en|ar)/, '');
        window.location.href = `/${locale}${currentPath}`;
    }

    // Close the dropup menu
    function closeDropup() {
        const dropupContent = document.querySelector('.dropup-content');
        dropupContent.style.display = 'none';
    }

    // Show the dropup content when hovering over the image
    document.querySelector('.dropbtn').addEventListener('mouseenter', function() {
        const dropupContent = document.querySelector('.dropup-content');
        dropupContent.style.display = 'block';
    });

    document.querySelector('.dropup').addEventListener('mouseleave', function() {
        const dropupContent = document.querySelector('.dropup-content');
        dropupContent.style.display = 'none';
    });

</script>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MX65DHS7"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->



<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('scripts')
