<!DOCTYPE HTML>
<!--
 Aerial by HTML5 UP
 html5up.net | @ajlkn
 Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
    <title>Project Laravel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}" />

    <noscript>
        <link rel="stylesheet" href="{{ asset('assets/css/noscript.css') }}" />
    </noscript>
</head>

<body class="is-preload">
    <div id="wrapper">
        <div id="bg"></div>
        <div id="overlay"></div>
        <div id="main">

            <!-- Top Navigation -->
            <nav class="topnav" aria-label="Main Navigation">
                <div class="brand">Welcome</div>
                <div class="nav-buttons">

                    @if (Route::has('login'))

                        @auth
                            <a href="{{ url('/dashboard') }}" class="button small">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="button small">Log In</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="button alt small">Register</a>
                            @endif
                        @endauth

                    @endif
                </div>
            </nav>
            <!-- Header -->
            <header id="header">
                <h1>Direktori Portofolio</h1>
                <p>Created by Kelompok 7</p>
                <nav>
                    <ul>
                        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a>
                        </li>
                        <li><a href="#" class="icon brands fa-linkedin-in"><span
                                    class="label">LinkedIn</span></a></li>
                        <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a>
                        </li>
                        <li><a href="#" class="icon brands fa-github"><span class="label">Github</span></a></li>
                        <li><a href="#" class="icon solid fa-envelope"><span class="label">Email</span></a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
    <script>
        window.onload = function() {
            document.body.classList.remove('is-preload');
        }
        window.ontouchmove = function() {
            return false;
        }
        window.onorientationchange = function() {
            document.body.scrollTop = 0;
        }
    </script>
</body>

</html>
