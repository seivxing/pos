<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                            <!--This is dark logo icon--><img src="{{ url('assets/plugins/images/admin-logo.png') }}"
                                alt="home" class="dark-logo" /><!--This is light logo icon--><img
                                src="{{ url('assets/plugins/images/admin-logo-dark.png') }}" alt="home"
                                class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="{{ url('assets/plugins/images/admin-text.png') }}"
                                alt="home" class="dark-logo" /><!--This is light logo text--><img
                                src="{{ url('assets/plugins/images/admin-text-dark.png') }}" alt="home"
                                class="light-logo" />
                        </span> </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i
                                    class="fa fa-search"></i></a>
                        </form>
                    </li>
                    <li>
                        <a class="profile-pic" href="#"> <img
                                src="{{ url('assets/plugins/images/users/varun.jpg') }}" alt="user-img" width="36"
                                class="img-circle"><b class="hidden-xs">Steave</b></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span
                            class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    @if (Auth::user()->role == 1)
                        <li style="padding: 70px 0 0;">
                            <a href="{{ route('welcome') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                    aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="waves-effect"><i class="fa fa-user fa-fw"
                                    aria-hidden="true"></i>Products</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="waves-effect"><i class="fa fa-user fa-fw"
                                    aria-hidden="true"></i>RegisterAccount</a>
                        </li>
                    @elseif (Auth::user()->role == 2)
                        <li style="padding: 70px 0 0;">
                            <a href="{{ route('welcome') }}" class="waves-effect"><i class="fa fa-clock-o fa-fw"
                                    aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ route('products.index') }}" class="waves-effect"><i class="fa fa-user fa-fw"
                                    aria-hidden="true"></i>Products</a>
                        </li>
                    @endif
                </ul>
                {{-- <div class="center p-20">
                     <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">Upgrade to Pro</a>
                 </div> --}}
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>

</body>
