<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="QAoitTOQ0OoLBnQTiSDFgMLkh0A81c5ZaSp-dF9iuFA" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" type="image/x-icon" href="{{URL::asset('dashboard/icon/Group.svg')}}" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    @if(App::getLocale() == 'ar')
        {{--        <link href="{{asset('css/Landing.css')}}" rel="stylesheet">--}}
        <link href="{{asset('css/LandingRtl.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('css/Landing.css')}}" rel="stylesheet">
    @endif
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <meta name="google-site-verification" content="QAoitTOQ0OoLBnQTiSDFgMLkh0A81c5ZaSp-dF9iuFA" />
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-MX65DHS7');</script>
    <!-- End Google Tag Manager -->

    @yield('css')
    <style>
        /* Smooth animation for dropup content */
        .heading-container {
            background-color: black;
        }
        .dropup-content {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .dropup-content.show {
            display: block;
            opacity: 1;
        }

        /* When the user hovers over the dropup (the image), show the content */
        .dropup:hover .dropup-content {
            display: block;
            opacity: 1;
        }

        /* When user hovers over the image or the dropup content, keep it visible */
        .dropup:hover .dropup-content,
        .dropup-content:hover {
            display: block;
            opacity: 1;
        }

        html[dir='rtl'] .close-icon {
            right: 10px; /* Move the X icon to the right in RTL */
        }

        html[dir='rtl'] .dropup-content .switch-menu {
            direction: ltr; /* Ensure the switch is in left-to-right order */
        }

        html[dir='rtl'] #form {
            text-align: left; /* Align form to the left */
        }

    </style>

</head>
