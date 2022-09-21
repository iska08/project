<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="{{asset('backend/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('backend/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/extensions/shepherd-theme-default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/vendors/css/tables/datatable/datatables.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/themes/semi-dark-layout.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/pages/dashboard-analytics.css')}}">
  </head>
  <body class="vertical-layout vertical-menu-modern  {{Auth::user()->theme == 1 ? 'dark-layout' : ''}} content-left-sidebar chat-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar" data-layout="dark-layout">
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><em class="ficon feather icon-menu"></em></a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><em class="ficon feather icon-bell"></em><span class="badge badge-pill badge-primary badge-up"></span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white"></h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                              <span class="user-name text-bold-600">{{auth::user()->name}}</span>
                              <span class="user-status">{{auth::user()->auth}}</span>
                            </div>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}" class="dropdown-item"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" data-toggle="tooltip" title="Logout">
                                <em class="feather icon-power"></em>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                          </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('home')}}">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Laundry</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><em class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></em><em class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></em></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
          <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ (request()->is('home')) ? 'active' : '' }}"><a href="{{url('home')}}"><em class="feather icon-home"></em><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            </li>
            @if (auth::user()->auth == "Admin")
            <li class=" nav-item"><a href="#"><em class="feather icon-users"></em><span class="menu-title" data-i18n="User">Data User</span></a>
              <ul class="menu-content">
                <li class="nav-item {{ (request()->is('karyawan')) ? 'active' : '' }}">
                  <a href="{{route('karyawan.index')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="View">Admin Cabang</span></a>
                </li>
                <li class="nav-item {{ (request()->is('customer')) ? 'active' : '' }}">
                  <a href="{{url('customer')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="List">Customer</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item {{ (request()->is('transaksi')) ? 'active' : '' }}">
              <a href="{{route('transaksi.index')}}"><em class="feather icon-shopping-cart"></em><span class="menu-item" data-i18n="List">Transaksi</span></a>
            </li>
            <li class=" nav-item"><a href="#"><em class="feather icon-credit-card"></em><span class="menu-title" data-i18n="User">Data Finance</span></a>
              <ul class="menu-content">
                <li class="nav-item {{ (request()->is('data-finance')) ? 'active' : '' }}">
                  <a href="{{url('data-finance')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="List">Finance</span></a>
                </li>
                <li class="nav-item {{ (request()->is('data-harga')) ? 'active' : '' }}">
                  <a href="{{url('data-harga')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="List">Harga Laundry</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item {{ (request()->is('settings')) ? 'active' : '' }}">
              <a href="{{url('settings')}}"><em class="feather icon-settings"></em><span class="menu-item" data-i18n="List">Setting</span></a>
            </li>
            @elseif(auth::user()->auth == "Karyawan")
            <li class=" nav-item"><a href="#"><em class="feather icon-layers"></em><span class="menu-title" data-i18n="User">Data Transaksi</span></a>
              <ul class="menu-content">
                <li class="nav-item {{ (request()->is('pelayanan')) ? 'active' : '' }}">
                  <a href="{{route('pelayanan.index')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="List">Order Masuk</span></a>
                </li>
                <li class="nav-item {{ (request()->is('add-order')) ? 'active' : '' }}">
                  <a href="{{url('add-order')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="List">Tambah Order</span></a>
                </li>
                <li class="nav-item {{ (request()->is('list-customer')) ? 'active' : '' }}">
                  <a href="{{url('list-customer')}}"><em class="feather icon-circle"></em><span class="menu-item" data-i18n="List">Data Customer</span></a>
                </li>
              </ul>
            </li>
            <li class="nav-item"><a href="{{url('/laporan')}}">
              <em class="feather icon-file-text"></em>
              <span class="menu-title" data-i18n="Dashboard">Laporan</span></a>
            </li>
            @endif
          </ul>
        </div>
    </div>
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              @yield('content')
              @include('sweetalert::alert')
          </div>

      </div>
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <script src="{{asset('backend/vendors/js/vendors.js')}}"></script>

    <script src="{{asset('backend/vendors/js/charts/apexcharts.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/extensions/tether.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/extensions/shepherd.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/datatables.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
    
    <script src="{{asset('backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('backend/js/core/app.js')}}"></script>
    <script src="{{asset('backend/js/scripts/components.js')}}"></script>
    
    <script src="{{asset('backend/js/scripts/datatables/datatable.js')}}"></script>
    
    @yield('scripts')
  </body>
</html>