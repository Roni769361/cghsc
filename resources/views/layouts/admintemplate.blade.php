<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('content/admin') }}/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- toastr cdn start  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- toastr cdn end  -->

    <!-- data table start  -->
    <!-- jquery start  -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jquery end -->

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.0/css/buttons.dataTables.css">

    <!-- bangla font cdn start  -->
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">

    <!-- bangla font cdn end -->
    <style>
        @import url('https://fonts.maateen.me/kalpurush/font.css');

        div.dt-search {
            float: right;
        }

        div.dt-info {
            float: left;
            margin-top: 0.8em;
        }

        div.dt-paging {
            float: right;
            margin-top: 0.5em;
        }

        .card {
            transition: transform 0.9s ease;
        }

        .card:hover {
            transform: scale(1.1);
        }

        .card:hover .card-body {
            background-color: #1F2544 !important;
        }

        .card:hover h4 a {
            color: #F2EFE5 !important;
        }
    </style>

    <!-- data table end  -->

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('/admin') }}">CGHS ALUMNI</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group text-white">
                <p>{{auth()->user()->name}}, Your Role is
                    @if(auth()->user()->type == 1)
                    Accountant
                    @elseif(auth()->user()->type == 2)
                    Supper Admin
                    @elseif(auth()->user()->type == 0)
                    General User
                    @endif
                </p>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img style="border-radius: 50%; width: 30px; height: 30px" src="{{asset(auth()->user()->photo)}}" alt=""></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{url('/user/edit')}}">Update Profile</a></li>
                    <li><a class="dropdown-item" href="{{ url('/change/password') }}">Change Password</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a></li>

                    <!-- <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a> -->

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url('/admin') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Report
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <!-- <a class="nav-link" href="{{ url('/admin/payment') }}">Alumni</a> -->
                                @if(auth()->check() && auth()->user()->isAdmin())
                                <a class="nav-link" href="{{ url('/admin/alumni_list') }}">Alumni</a>
                                <a class="nav-link" href="{{ url('/alumni/trx-Report') }}">Transition Report</a>

                                @endif
                                <!-- ---------- admin and sub-admin access -->
                                @if(auth()->check() && auth()->user()->isAdmin() || auth()->user()->isSub_Admin())
                                <a class="nav-link" href="{{ url('/admin/payment_verification') }}">Payment Verify</a>

                                <a class="nav-link" target="_blank" href="{{ url('/pdf_gen') }}">Alumni ID Card
                                    Genarate</a>


                                <a class="nav-link" target="_blank" href="{{ url('/admin/batch-id-card') }}">Batch Wise
                                    ID Card</a>

                                <a class="nav-link" target="_blank" href="{{ url('/admin/batch-search') }}">Batch Wise
                                    Alumni</a>


                                <a class="nav-link" href="{{ url('/admin/downlaodFile') }}">Downlaod File</a>
                                @endif
                                <!-- only user can access  -->
                                @if(auth()->check() && auth()->user()->isUser())
                                <a class="nav-link" target="_blank" href="{{ url('/admin/batch-id-card') }}">Batch Wise
                                    ID Card</a>

                                <a class="nav-link" target="_blank" href="{{ url('/admin/batch-search') }}">Batch Wise
                                    Alumni</a>
                                @endif
                                <!-- only user can access  -->

                            </nav>
                        </div>

                        <!-- user page start  -->
                        @if(auth()->check() && auth()->user()->isAdmin())

                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            User Setup
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{ url('/user/index') }}">User Management</a>
                                        <!-- <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a> -->
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        @endif
                        <!-- user page end -->

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            @yield('content')

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!-- -------------------- -->
    <script type="text/Javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/Javascript" src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script type="text/Javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/dataTables.buttons.js"></script>
    <script type="text/Javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.dataTables.js"></script>
    <script type="text/Javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script type="text/Javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script type="text/Javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script type="text/Javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.html5.min.js"></script>
    <script type="text/Javascript" src="https://cdn.datatables.net/buttons/3.0.0/js/buttons.print.min.js"></script>
    <!-- -------------------- -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('content/admin') }}/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('content/admin') }}/assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('content/admin') }}/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('content/admin') }}/js/datatables-simple-demo.js"></script>
</body>

</html>