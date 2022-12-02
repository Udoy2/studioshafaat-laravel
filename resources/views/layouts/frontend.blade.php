<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta property='og:title' content="Shafaat Khan">
    <meta property='og:site_name' content="Shafaat Khan">
    @switch(Route::current()->getName())
        @case('frontend.home')

            <meta property='og:description' content="Shafaat Khan | Home">
        @break
        @case('frontend.nutshell')

            <meta property='og:description' content="Shafaat Khan | Nutshell">
        @break
        @case('frontend.collectibles')
            <meta property='og:description' content="Shafaat Khan | Collectibles">

        @break
        @case('frontend.projects')
            <meta property='og:description' content="Shafaat Khan | Projects">

        @break
        @case('frontend.connect')
            <meta property='og:description' content="Shafaat Khan | Connect">

        @break
        @default

    @endswitch
    <meta property='og:url' content="https://www.studioshafaat.com">
    <meta property='og:image' content="{{ asset('/frontend/assets/images/share_link_banner.jpg') }}">

    {{-- favicons --}}
    <link rel="apple-touch-icon" sizes="57x57"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('/frontend/assets/images/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('/frontend/assets/images/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/frontend/assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96"
        href="{{ asset('/frontend/assets/images/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/frontend/assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/frontend/assets/images/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage"
        content="{{ asset('/frontend/assets/images/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
        body {

            background-color: #171717 !important;

        }

        .preloader {
            /* url("{{ asset('/frontend/assets/images/black_paper/black_paper.png') }}") */
            background: rgba(0, 0, 0.9);
            background-repeat: repeat;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 3000;
            transition: all 0.3s ease-in-out;
        }

        .preloader.close {
            opacity: 0;
            pointer-events: none;
        }

    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/frontend/css/navbar.css') }}" />

    <title>Shafaat Khan</title>
</head>

<body>
    @if (Route::current()->getName() == 'frontend.home')
        <div class="preloader" id="preloader">
            <img src="{{ asset('frontend/assets/videos/main_logo.gif') }}" alt="main logo" height="300px" />
        </div>
    @endif

    <!-- navbar of the page -->
    <header class="container">
        <!-- navbar wide screen visible part -->
        <div class="dark-overlay"></div>
        <nav class="navbar">
            <div class="navbar-wrapper">
                <a href="{{ route('frontend.home') }}" class="navbar-brand"><img
                        src="{{ asset('/frontend/assets/images/S-Logo.png') }}" alt="Navbar Logo" /></a>
                <div class="page_heading">

                    @if (str_ends_with(url()->current(), 'project'))
                        <h1>Project</h1>
                    @endif
                    @if (str_ends_with(url()->current(), 'connect'))
                        <h1>Connect</h1>
                    @endif
                    @if (str_ends_with(url()->current(), 'collectible'))
                        <h1>Collectible</h1>
                    @endif
                </div>
                <button class="navbar-toggler " type="button" id="navbar-toggler">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>


            <!-- navbar collapse part -->
            <div class="navbar-collapse" id="navbarcollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('frontend.nutshell') }}" class="nav-link"
                            data-name="NUTSHELL">NUTSHELL</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.projects') }}" class="nav-link"
                            data-name="PROJECT">PROJECT</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.collectibles') }}" class="nav-link"
                            data-name="COLLECTIBLE">COLLECTIBLE</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.connect') }}" class="nav-link"
                            data-name="CONNECT">CONNECT</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- main section of the page -->
    @yield('content')


    <!-- footer end of the page -->
    <footer class="container">
        <div class="footer">
            <p class="developer">
                <span>&copy;</span>

                Studio Shafaat 2021 | Developed by
                <a href="https://www.facebook.com/udoyrahman980" class="text_hover" target="_blank"
                    rel="Developer">Udoy Rahman</a>
            </p>
            <!-- <p class="copyright"><span>&copy;</span> Studio Shafaat | 2021</p> -->
        </div>
    </footer>

    <!-- scripts -->

    <script src="{{ asset('/frontend/js/script.js') }}"></script>
</body>

</html>
