<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} - The Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/favicon.ico">

    <link href="{{ asset('dashboard') }}/assets/libs/morris.js/morris.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset('dashboard') }}/assets/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('dashboard') }}/assets/js/config.js"></script>
    @livewireStyles
</head>

<body>

    <!-- Begin page -->
    <div class="layout-wrapper">

        <!-- ========== Left Sidebar ========== -->
        <div class="main-menu">
            <!-- Brand Logo -->
            <div class="logo-box">
                <!-- Brand Logo Light -->
                <a class='logo-light' href='index.html'>
                    <h5 style="color: #ffffff;">{{ Illuminate\Support\Str::ucfirst(env('APP_NAME')) }}</h5>

                    {{-- <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" alt="logo" class="logo-lg" height="28">
                    <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28"> --}}
                </a>

                <!-- Brand Logo Dark -->
                <a class='logo-dark' href='index.html'>
                    <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="28">
                    <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="28">
                </a>
            </div>

            <!--- Menu -->
            <div data-simplebar>
                <ul class="app-menu">

                    <li class="menu-title">Menu</li>

                    <li class="menu-item">
                        <a class='menu-link waves-effect waves-light' href='index.html'>
                            <span class="menu-icon"><i class="bx bx-home-smile"></i></span>
                            <span class="menu-text"> Dashboards </span>
                            <span class="badge bg-primary rounded ms-auto">01</span>
                        </a>
                    </li>

                    <li class="menu-title">Task Management</li>

                    <li class="menu-item">
                        <a href="#menuExpages" data-bs-toggle="collapse" class="menu-link waves-effect waves-light">
                            <span class="menu-icon"><i class="bx bx-file"></i></span>
                            <span class="menu-text"> Task Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="menuExpages">
                            <ul class="sub-menu">
                                <li class="menu-item">
                                    <a class='menu-link' href='{{ route('task.index') }}'>
                                        <span class="menu-text">Show & Create</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </div>



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="page-content">

            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar">
                    <div class="topbar-menu d-flex align-items-center gap-lg-2 gap-1">

                        <!-- Brand Logo -->
                        <div class="logo-box">
                            <!-- Brand Logo Light -->
                            <a class='logo-light' href='index.html'>
                                <img src="{{ asset('dashboard') }}/assets/images/logo-light.png" alt="logo" class="logo-lg" height="22">
                                <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>

                            <!-- Brand Logo Dark -->
                            <a class='logo-dark' href='index.html'>
                                <img src="{{ asset('dashboard') }}/assets/images/logo-dark.png" alt="dark logo" class="logo-lg" height="22">
                                <img src="{{ asset('dashboard') }}/assets/images/logo-sm.png" alt="small logo" class="logo-sm" height="22">
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-4">

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('dashboard') }}/assets/images/users/avatar-4.jpg" alt="user-image" class="rounded-circle">
                                <span class="ms-1 d-none d-md-inline-block">
                                    {{ Auth::user()->name }}. <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span>My Account</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                <button class='dropdown-item notify-item' type="submit">
                                    <i class="fe-log-out"></i>
                                    <span class="test-danger">Logout</span>
                                </button>
                                </form>

                            </div>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->

            <div class="px-3">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div><script>document.write(new Date().getFullYear())</script> © {{ Illuminate\Support\Str::ucfirst(env('APP_NAME')) }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-none d-md-flex gap-4 align-item-center justify-content-md-end">
                                <p class="mb-0">Design & Develop by <a href="javascript:void(0)" target="_blank">{{ env('HOST_NAME') }}</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ asset('dashboard') }}/assets/js/vendor.min.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/app.js"></script>

    <!-- Knob charts js -->
    <script src="{{ asset('dashboard') }}/assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!-- Sparkline Js-->
    <script src="{{ asset('dashboard') }}/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <script src="{{ asset('dashboard') }}/assets/libs/morris.js/morris.min.js"></script>

    <script src="{{ asset('dashboard') }}/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init-->
    <script src="{{ asset('dashboard') }}/assets/js/pages/dashboard.js"></script>


    @livewireScripts
</body>


</html>
