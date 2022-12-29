<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:title" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:description" content="Edumin - Bootstrap Admin Dashboard" />
    <meta property="og:image" content="https://edumin.dexignlab.com/xhtml/social-image.png" />
    <meta name="format-detection" content="telephone=no">
    <!-- jquery -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />

    <!-- PAGE TITLE HERE -->
    <title>İdeal Sigorta - Admin Paneli</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="vendor/jqvmap/css/jqvmap.min.css">
    <link rel="stylesheet" href="vendor/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/skin-2.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">
    @yield("sidebar")

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{route('policy-index')}}" class="brand-logo">
            <img class="logo-abbr" src="images/logo-white.png" alt="">
            <img class="logo-compact" src="images/logo-text-white.png" alt="">
            <img class="brand-title" alt="" >İDEAL SİGORTA
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-between">
                    <div class="header-left">
{{--                        <div class="search_bar dropdown">--}}
{{--                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">--}}
{{--                                    <i class="mdi mdi-magnify"></i>--}}
{{--                                </span>--}}
{{--                            <div class="dropdown-menu p-0 m-0">--}}
{{--                                <form>--}}
{{--                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                <img src="images/profile/education/pic1.jpg" width="20" alt=""/>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('profile.show')}}" class="dropdown-item ai-icon">
                                    <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="ml-2">Profile </span>
                                </a>
                                <a href="./email-inbox.html" class="dropdown-item ai-icon">
                                    <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    <span class="ml-2">Inbox </span>
                                </a>
                                <a  class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                    <span class="ml-2">Logout </span>

                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>


    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->

    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="content-body">
        <div class="container-fluid">
             @yield("content")
        </div>
    </div>

    <!--**********************************
        Content body end
    ***********************************-->


    <!--**********************************
        Footer start
    ***********************************-->
    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="http://dexignlab.com/" target="_blank">YKBOZ</a> 2021</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->

</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
@yield('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="vendor/global/global.min.js"></script>
<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<!-- Chart ChartJS plugin files -->
<script src="./vendor/chart.js/Chart.bundle.min.js"></script>

<!-- Chart piety plugin files -->
<script src="./vendor/peity/jquery.peity.min.js"></script>

<!-- Chart sparkline plugin files -->
<script src="./vendor/jquery-sparkline/jquery.sparkline.min.js"></script>

<!-- Demo scripts -->
<script src="js/dashboard/dashboard-3.js"></script>

<!-- Svganimation scripts -->
<script src="vendor/svganimation/vivus.min.js"></script>
<script src="vendor/svganimation/svg.animation.js"></script>
<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{--<script src="vendor/sweetalert2/dist/sweetalert2.min.js"></script>--}}
@if(session('status'))
    <script>

        swal({
            title: "{{session('status')}}",
            text: "Butona tikladiniz!",
            icon: "success",
            button: "Tamam",

        })
    </script>
@endif

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>--}}

</body>
</html>
