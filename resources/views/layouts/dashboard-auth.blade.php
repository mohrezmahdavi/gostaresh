<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.head-tags')

    <body class="loading">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    
                        @yield('content')
                        

                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        {{-- <footer class="footer footer-alt">
            <span>تمام حقوق این سامانه متعلق به شرکت</span>
            <a href="">شرکت راهکار کسب و کار هوشمند امین</a>
            <span>است.</span>
            <span> | </span>
            <span>طراحی و توسعه</span>
            <span> : </span>
            <a href="">تیم کاما</a>
        </footer> --}}

        @include('admin.partials.footer-scripts')
        
    </body>
</html>