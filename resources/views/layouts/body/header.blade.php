    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="{{ route('home') }}"><span>Com</span>pany</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">

                <ul>

                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="">Team</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Portfolio</a></li>
                    <li><a href="">Pricing</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="">Contact</a></li>

                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{-- <li><a href="{{ route('register') }}">Register</a></li> --}}

                </ul>

            </nav>

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
            </div>

        </div>
    </header><!-- End Header -->
