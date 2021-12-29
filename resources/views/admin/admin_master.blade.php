<!DOCTYPE html>
<html lang="en" dir="ltr">
@include('admin.body.head')

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

        @include('admin.body.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.body.header')
            <!--content-->
            <div class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
            </div>
            <!--content-->

            @include('admin.body.footer')
        </div>
    </div>

    @include('admin.body.script')
</body>

</html>
