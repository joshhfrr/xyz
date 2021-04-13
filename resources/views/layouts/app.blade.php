<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token()}}'}</script>
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('xyz.png') }}" type="image/x-icon">
    <!-- link href -->
    @include('includes.links')
    <!-- end link -->
<style>
.card-title {
    font-weight: bold;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">
    <div id="app">


        <div class="wrapper">

            {{-- @include('includes.navbar') --}}

            @include('includes.sidebar')

            <!-- Start Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                {{-- @include('includes.content-header') --}}

                <!-- START MAIN CONTENT -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
                <!--END MAIN CONTENT -->
            </div>
            <!-- End Content Wrapper. Contains page content -->
        
            <!-- START FOOTER -->
            @include('includes.footer')
            <!-- END FOOTER -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
            <!-- ./wrapper -->
            

    </div>
    
    <!-- START SCRIPTS LINK -->
    @include('includes.scripts')
    @yield('scripts')

</body>
</html>
