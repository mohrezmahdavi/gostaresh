<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <!-- LOGO -->
    <div class="logo-box bg-secondary">
        <a href="{{ route('admin.index') }}" class="logo logo-dark text-center">
            <span class="logo-sm">
                {{-- <img src="{{ asset('assets/admin/images/logo-sm-dark.png') }}" alt="" height="24"> --}}
                <span class="logo-lg-text-light">
                    صمت من
                </span>
            </span>
            <span class="logo-lg">
                {{-- <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="20"> --}}
                <span class="logo-lg-text-light">
                    صمت من
                </span>
            </span>
        </a>

        <a href="{{ route('admin.index') }}" class="logo logo-light text-center">
            <span class="logo-sm">
                {{-- <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="24"> --}}
                <span class="logo-lg-text-light">
                    صمت من
                </span>

            </span>
            <span class="logo-lg">
                {{-- <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="" height="20"> --}}
                <span class="logo-lg-text-light">
                    صمت من
                </span>

            </span>
        </a>
    </div>

    <div class="h-100" data-simplebar>

        {{-- <!-- User box -->
        <div class="user-box text-center">
            <img src="../assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="#" class="text-reset dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Nik Patel</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-reset">Admin Head</p>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">
                    <span>منو</span>
                    {{-- <span> : </span>
                    <span>
                        @foreach (__('titles.user_role') as $key => $value)
                            @if ($key == Auth::user()->user_role)
                                {{ $value }}
                            @endif
                        @endforeach
                    </span> --}}
                </li>

                <li>
                    <a href="{{ route('admin.index') }}">
                        <i class="mdi mdi-home"></i>
                        <span> خانه </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.profile.edit') }}">
                        <i class="ri-dashboard-line me-1"></i>
                        <span>پروفایل کاربری</span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarDashboardsUsers" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="sidebarDashboardsUsers" class="waves-effect">
                        <i class="mdi mdi-account-group"></i>
                        {{-- <span class="badge bg-success rounded-pill float-end">3</span> --}}
                        <span> کاربران </span>
                    </a>
                    <div class="collapse" id="sidebarDashboardsUsers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('admin.user.create') }}"><i
                                        class="ri-calendar-2-line align-middle me-1"></i> افزودن جدید</a>
                            </li>

                            <li>
                                <a href="{{ route('admin.users.list') }}"><i
                                        class="ri-message-2-line align-middle me-1"></i> لیست کاربران</a>
                            </li>


                        </ul>
                    </div>
                </li>

                




                {{-- <li>
                    <a href="widgets.html">
                        <i class="mdi mdi-gift-outline"></i>
                        <span> Widgets </span>
                    </a>
                </li> --}}

                {{-- <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse" aria-expanded="false"
                        aria-controls="sidebarDashboards" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="badge bg-success rounded-pill float-end">3</span>
                        <span> Dashboards </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index.html">Sales</a>
                            </li>
                            <li>
                                <a href="dashboard-crm.html">CRM</a>
                            </li>
                            <li>
                                <a href="dashboard-analytics.html">Analytics</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <li>
                    <a href="{{ route('logout') }}">
                        <i class="ri-dashboard-line me-1"></i>
                        <span>خروج</span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
