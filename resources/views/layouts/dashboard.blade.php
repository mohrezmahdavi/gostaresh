<!DOCTYPE html>
<html lang="en">
@include('admin.partials.head-tags')

<!-- body start -->

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": false}'>

    <!-- Begin page -->
    <div id="wrapper">

        @include('admin.partials.top-bar')


        @include('admin.partials.left-sidebar')



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box page-title-box-alt">
                                <h4 class="page-title">@yield('page-title')</h4>
                                <div class="page-title-right">
                                    {{-- <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('titles.home')}}</a></li>
                                            <li class="breadcrumb-item active">@yield('breadcrumb-title')</li>
                                        </ol> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            @include('admin.partials.footer')

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->


    @include('admin.partials.footer-scripts')

</body>

</html>
