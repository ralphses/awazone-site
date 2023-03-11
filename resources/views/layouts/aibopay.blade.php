<!doctype html>
<html lang=""{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ "Awazone | AiboPay".$title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('aibopay/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('aibopay/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('aibopay/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('aibopay/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />


</head>

<body data-layout="horizontal">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('aibopay/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('aibopay/images/logo-dark.png') }}" alt="" height="20">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('aibopay/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('aibopay/images/logo-light.png') }}" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm me-2 font-size-24 d-lg-none header-item waves-effect waves-light"
                        data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">

                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>

                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="ion ion-md-notifications"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h5 class="m-0 font-size-16"> Notification (3) </h5>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="media d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                                <i class="mdi mdi-cart-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">Dummy text of the printing and typesetting industry.</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-warning rounded-circle font-size-16">
                                                <i class="mdi mdi-message-text-outline"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">New Message received</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">You have 87 unread messages</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="" class="text-reset notification-item">
                                    <div class="media d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-info rounded-circle font-size-16">
                                                <i class="mdi mdi-glass-cocktail"></i>
                                            </span>
                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mt-0 font-size-15 mb-1">Your item is shipped</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1">It is a long established fact that a reader will</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                                    View all
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset('aibopay/images/users/avatar-1.jpg') }}"
                                alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i class="dripicons-user font-size-16 align-middle me-2"></i>
                                Profile</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-wallet font-size-16 align-middle me-2"></i> My
                                Wallet</a>
                            <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">5</span><i
                                    class="dripicons-gear font-size-16 align-middle me-2"></i> Settings</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-lock font-size-16 align-middle me-2"></i> Lock
                                screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="dripicons-exit font-size-16 align-middle me-2"></i>
                                Logout</a>
                        </div>
                    </div>

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                            <i class="mdi mdi-spin mdi-cog"></i>
                        </button>
                    </div>

                </div>
            </div>

            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('aibopay.dashboard') }}">
                                        <i class="dripicons-device-desktop me-2"></i>Dashboard
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user-Interface"
                                        role="button">
                                        <i class="dripicons-suitcase me-2"></i>Add Money
                                        <div class="arrow-down"></div>
                                    </a>

                                    <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-l dropdown-menu-start"
                                        aria-labelledby="topnav-user-Interface">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="{{ route('add-money.transfer') }}" class="dropdown-item">Bank Transfer</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">USSD</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Card</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Cash Deposit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user-Interface"
                                        role="button">
                                        <i class="dripicons-suitcase me-2"></i>Pay
                                        <div class="arrow-down"></div>
                                    </a>

                                    <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-l dropdown-menu-start"
                                        aria-labelledby="topnav-user-Interface">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Send to Awazone User</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Send to Bank Account</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Buy Airtime</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Pay Bills</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user-Interface"
                                        role="button">
                                        <i class="dripicons-suitcase me-2"></i>Aibopay Accounts
                                        <div class="arrow-down"></div>
                                    </a>

                                    <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-l dropdown-menu-start"
                                        aria-labelledby="topnav-user-Interface">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">View All</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-user-Interface"
                                        role="button">
                                        <i class="dripicons-suitcase me-2"></i>Cards
                                        <div class="arrow-down"></div>
                                    </a>

                                    <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-l dropdown-menu-start"
                                        aria-labelledby="topnav-user-Interface">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">View All</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div>
                                                    <a href="#" class="dropdown-item">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <!-- start page title -->
            <div class="page-title-box">
                <div class="container-fluid">
                    <div class="page-title-content">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4>Horizontal</h4>
                            </div>

                            <div class="col-sm-6">
                                <div class="float-end d-none d-md-block">
                                    <form class="app-search ">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="fa fa-search"></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

        </header>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">

                <!-- container-fluid-begins -->

                {{ $slot }}
                
                <!-- container-fluid -->

            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>document.write(new Date().getFullYear())</script> Fonik<span class="d-none d-sm-inline-block"> -
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('aibopay/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('aibopay/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('aibopay/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('aibopay/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('aibopay/libs/node-waves/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('aibopay/libs/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('aibopay/libs/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('aibopay/js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('aibopay/js/app.js') }}"></script>

</body>

</html>