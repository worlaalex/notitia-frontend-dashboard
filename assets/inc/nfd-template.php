<?php

function create_dashboard(){

return '<div>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Notitia Ai Platform</title>
    <!-- Favicon -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="http://127.0.0.1:9000/assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-1/css/all.min.css" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <style>
   .spacle-nav {
    display: none!important;
}
.page-main-content {
    padding-top: 0px!important;
    padding-bottom: 70px;
    overflow: hidden;
}
   </style>
   <link rel="stylesheet" href="http://127.0.0.1:9000/assets/css/argon.css?v=1.1.0" type="text/css">
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="https://notitia.site">
                    <img src="https://notitia.site/wp-content/uploads/2020/04/Notitia-Ai.png" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="./wp-content/plugins/notitia-frontend-dashboardpages/dashboards/notitia.html" class="nav-link active" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboards</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./wp-content/plugins/notitia-frontend-dashboardpages/examples/profile.html" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-ungroup text-orange"></i>
                                <span class="nav-link-text">Profile</span>
                            </a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./wp-content/plugins/notitia-frontend-dashboardpages/examples/profile.html" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-ui-04 text-orange"></i>
                                <span class="nav-link-text">Blogs</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                        </li>

                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="./wp-content/plugins/notitia-frontend-dashboard/assets/img/theme/team-4.jpg">
                  </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">Worla Alex</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>

                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 d-inline-block mb-0">Notitia</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">My Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-primary border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Courses</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">06</span>
                                    <div class="progress progress-xs mt-3 mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                    </div>
                                </div>

                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="#!" class="text-nowrap text-white font-weight-600">Total number of courses</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-info border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Completed Courses</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">04/06</span>
                                    <div class="progress progress-xs mt-3 mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                    </div>
                                </div>

                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="#!" class="text-nowrap text-white font-weight-600">Courses completed out of total</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-danger border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Certificates</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">05</span>
                                    <div class="progress progress-xs mt-3 mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                    </div>
                                </div>

                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="#!" class="text-nowrap text-white font-weight-600">Certificates Earned</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-gradient-default border-0">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Points</h5>
                                    <span class="h2 font-weight-bold mb-0 text-white">500</span>
                                    <div class="progress progress-xs mt-3 mb-0">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                                <a href="#!" class="text-nowrap text-white font-weight-600">Total Points Earned</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-deck flex-column flex-xl-row">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h6 class="text-muted text-uppercase ls-1 mb-1">Overview</h6>
                        <h2 class="h3 mb-0">Recent Activity</h2>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="h3 mb-0">Total assigment marks</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Footer -->
        </div>
    </div>
    <!-- Argon Scripts -->
    <script src="http://127.0.0.1:9000/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="http://127.0.0.1:9000/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://127.0.0.1:9000/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="http://127.0.0.1:9000/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="http://127.0.0.1:9000/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="http://127.0.0.1:9000/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <!-- Argon JS -->
    <script src="http://127.0.0.1:9000/assets/js/argon.js?v=1.1.0"></script>
    <!-- Core -->
</div>';
}

add_shortcode('nfd-dashboard', 'create_dashboard');
