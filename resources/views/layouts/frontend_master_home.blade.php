<!DOCTYPE html>
<html lang="en">

@include('layouts.body.head')

<body>

    @include('layouts.body.header')

    <main id="main">

        @yield('content')

    </main>


    <footer id="footer">
        @include('layouts.body.footer')
    </footer>

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    @include('layouts.body.script')

</body>

</html>
