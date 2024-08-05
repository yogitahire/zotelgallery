<!DOCTYPE html>
<html lang="en">

@include('layout.header')

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_sidebar.html -->
        @include('layout.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            @include('layout.navbar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content', 'Default Content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('layout.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src={{ asset('assets/vendors/js/vendor.bundle.base.js') }}></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src={{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}></script>
    <script src={{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}></script>
    <script src={{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src={{ asset('assets/js/off-canvas.js') }}></script>
    <script src={{ asset('assets/js/hoverable-collapse.js') }}></script>
    <script src={{ asset('assets/js/misc.js') }}></script>
    <script src={{ asset('assets/js/settings.js') }}></script>
    <script src={{ asset('assets/js/todolist.js') }}></script>
    <script src={{ asset('assets/js/todolist.js') }}></script>

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src={{ asset('assets/js/dashboard.js') }}></script>
</body>

</html>
