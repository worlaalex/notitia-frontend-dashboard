<?php
// wp_hash_password( $xx_new_password )
if (!function_exists('write_log')) {

    function write_log($log) {
        if (true === WP_DEBUG) {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            } else {
                error_log($log);
            }
        }
    }

}

function delete_all_between($beginning, $end, $string) {
  $beginningPos = strpos($string, $beginning);
  $endPos = strpos($string, $end);
  if ($beginningPos === false || $endPos === false) {
    return $string;
  }

  $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

  return delete_all_between($beginning, $end, str_replace($textToDelete, '', $string)); // recursion to ensure all occurrences are replaced
}

function fetch_courses(){
    $url = 'https://notitia.site/index.php/wp-json/ldlms/v1/sfwd-courses'; 
    $response = wp_remote_post( $url, array(
    'method' => 'GET',
    'timeout' => 45,
    'redirection' => 5,
         'httpversion' => '1.0'
) );
    $response = delete_all_between('<style type="text/css">', '</style>', $response["body"]);
    $response = str_replace('<style type="text/css"></style>','',$response);
    $data = json_decode($response,true);
    return $data;

    // write_log($data);
}

function set_course($title,$link){
    $course = "
    <div class='col-xl-4'>
    <!-- Members list group card -->
    <a href='$link'>
    <div class='card'>
            <!-- Card header -->
            <div class='card-header'>
              <!-- Title -->
              <h5 class='h3 mb-0'>Notitia Ai Platform</h5>
            </div>
            <!-- Card body -->
            <div class='card-body'>
              <img alt='Image placeholder' src='https://notitia.site/wp-content/uploads/2019/12/blog-cover02.jpg' class='img-fluid rounded'>
              <h4 class='mt-2'>
              $title
            </h4>
            </div>
          </div>
          </a>

          </div>
    ";

    return $course;
}


function update_user($id){
    $url_ = "http://notitia.site/index.php/wp-json/wp/v2/users/$id/";
}

function create_dashboard(){
    $data = fetch_courses();    

    $courses = "";
    $meetings = "";

    for ($i=0; $i < sizeof($data)-2; $i++) { 
        $courses .= set_course($data[$i]["title"]["rendered"],$data[$i]["link"]);
    }

    for ($y=0; $y < sizeof($data); $y++) {
    if($y > 3){
        $meetings .= set_course($data[$y]["title"]["rendered"],$data[$y]["link"]);
    } 
    }

    $current_user = wp_get_current_user();
    $avatar = get_avatar_url($current_user->ID);

    if ( 0 == $current_user->ID ) {
        $current_user->display_name = 'Guest User';
        $avatar = 'https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/img/theme/team-4.jpg';
    }
    else {
        // write_log($current_user);
    }
return "<div>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- Favicon -->
    <!-- Fonts -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/nucleo/css/nucleo.css' type='text/css'>
   <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css' type='text/css'>
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <style>
   a {
    text-decoration:none!important;
   }
   li {
    list-style:none!important;
   }
   a:hover{

   }
   .spacle-nav {
    display: none!important;
}
.page-main-content {
    padding-top: 0px!important;
    padding-bottom: 70px;
    overflow: hidden;
}
   </style>
   <link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/css/argon.css?v=1.1.0' type='text/css'>
    <!-- Sidenav -->
    <nav class='sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white' id='sidenav-main'>
        <div class='scrollbar-inner'>
            <!-- Brand -->
            <div class='sidenav-header d-flex align-items-center'>
                <a class='navbar-brand' href='https://notitia.site'>
                    <img src='https://notitia.site/wp-content/uploads/2020/04/Notitia-Ai.png' class='navbar-brand-img' alt='...'>
                </a>
                <div class='ml-auto'>
                    <!-- Sidenav toggler -->
                    <div class='sidenav-toggler d-none d-xl-block' data-action='sidenav-unpin' data-target='#sidenav-main'>
                        <div class='sidenav-toggler-inner'>
                            <i class='sidenav-toggler-line'></i>
                            <i class='sidenav-toggler-line'></i>
                            <i class='sidenav-toggler-line'></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class='navbar-inner'>
                <!-- Collapse -->
                <div class='collapse navbar-collapse' id='sidenav-collapse-main'>
                    <!-- Nav items -->
                    <ul class='navbar-nav'>
                        <li class='nav-item'>
                            <a href='#dashboard' class='nav-link active' role='button' aria-expanded='true' aria-controls='navbar-dashboards'>
                                <i class='ni ni-shop text-primary'></i>
                                <span class='nav-link-text'>Dashboards</span>
                            </a>
                        </li>
                       
                        <li class='nav-item'>
                            <a class='nav-link' href='#courses' role='button' aria-expanded='false' aria-controls='navbar-examples'>
                                <i class='ni ni-ungroup text-orange'></i>
                                <span class='nav-link-text'>Courses</span>
                            </a>

                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='#overview' role='button' aria-expanded='false' aria-controls='navbar-examples'>
                                <i class='ni ni-ungroup text-orange'></i>
                                <span class='nav-link-text'>Overview</span>
                            </a>

                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='#meetings' role='button' aria-expanded='false' aria-controls='navbar-examples'>
                                <i class='ni ni-ui-04 text-orange'></i>
                                <span class='nav-link-text'>Zoom Meetings</span>
                            </a>

                        </li>
                         <li class='nav-item'>
                            <a class='nav-link' href='https://notitia.site/wp-login.php?action=logout&_wpnonce=836195ff7a' role='button' aria-expanded='false' aria-controls='navbar-examples'>
                                <i class='ni ni-ui-04 text-orange'></i>
                                <span class='nav-link-text'>Logout</span>
                            </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class='main-content' id='panel'>
        <!-- Topnav -->
        <nav class='navbar navbar-top navbar-expand navbar-light bg-secondary border-bottom'>
            <div class='container-fluid'>
                <div class='collapse navbar-collapse' id='navbarSupportedContent'>

                    <!-- Navbar links -->
                    <ul class='navbar-nav align-items-center ml-md-auto'>
                        <li class='nav-item d-xl-none'>
                            <!-- Sidenav toggler -->
                            <div class='pr-3 sidenav-toggler sidenav-toggler-light' data-action='sidenav-pin' data-target='#sidenav-main'>
                                <div class='sidenav-toggler-inner'>
                                    <i class='sidenav-toggler-line'></i>
                                    <i class='sidenav-toggler-line'></i>
                                    <i class='sidenav-toggler-line'></i>
                                </div>
                            </div>
                        </li>
                        <li class='nav-item d-sm-none'>
                            <a class='nav-link' href='#' data-action='search-show' data-target='#navbar-search-main'>
                                <i class='ni ni-zoom-split-in'></i>
                            </a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <i class='ni ni-bell-55'></i>
                            </a>
                        </li>

                    </ul>
                    <ul class='navbar-nav align-items-center ml-auto ml-md-0'>
                        <li class='nav-item dropdown'>
                            <a class='nav-link pr-0' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                <div class='media align-items-center'>
                                    <span class='avatar avatar-sm rounded-circle'>
                    <img alt='Image placeholder' src='$avatar'>
                  </span>
                                    <div class='media-body ml-2 d-none d-lg-block'>
                                        <span class='mb-0 text-sm  font-weight-bold'> $current_user->display_name</span>
                                    </div>
                                </div>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <div class='dropdown-header noti-title'>
                                    <h6 class='text-overflow m-0'>Welcome!</h6>
                                </div>
                                <a href='#!' class='dropdown-item'>
                                    <i class='ni ni-single-02'></i>
                                    <span>My profile</span>
                                </a>

                                </a>
                                <div class='dropdown-divider'></div>
                                <a href='https://notitia.site/wp-login.php?action=logout&_wpnonce=836195ff7a' class='dropdown-item'>
                                    <i class='ni ni-user-run'></i>
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
        <div class='header pb-6' id='dashboard'>
            <div class='container-fluid'>
                <div class='header-body'>
                    <div class='row align-items-center py-4'>
                        <div class='col-lg-6 col-7'>
                            <h6 class='h2 d-inline-block mb-0'>Notitia</h6>
                            <nav aria-label='breadcrumb' class='d-none d-md-inline-block ml-md-4'>
                                <ol class='breadcrumb breadcrumb-links'>
                                    <li class='breadcrumb-item'><a href='#'><i class='fas fa-home'></i></a></li>
                                    <li class='breadcrumb-item'><a href='#'>Dashboards</a></li>
                                    <li class='breadcrumb-item active' aria-current='page'>My Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class='container-fluid mt--6' >
            <div class='row'>
                <div class='col-xl-3 col-md-6'>
                    <div class='card bg-gradient-primary border-0'>
                        <!-- Card body -->
                        
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col'>
                                    <h5 class='card-title text-uppercase text-muted mb-0 text-white'>Total Courses</h5>
                                    <span class='h2 font-weight-bold mb-0 text-white'>04</span>
                                    <div class='progress progress-xs mt-3 mb-0'>
                                        <div class='progress-bar bg-success' role='progressbar' aria-valuenow='30' aria-valuemin='0' aria-valuemax='100' style='width: 30%;'></div>
                                    </div>

                                </div>

                            </div>
                            <p class='mt-3 mb-0 text-sm'>
                                <a href='#!' class='text-nowrap text-white font-weight-600'>Active Courses</a>
                            </p>
                        </div>

                    </div>
                </div>
                <div class='col-xl-3 col-md-6' >
                    <div class='card bg-gradient-info border-0'>
                        <!-- Card body -->
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col'>
                                    <h5 class='card-title text-uppercase text-muted mb-0 text-white'>Scheduled Zoom Meetings</h5>
                                    <span class='h2 font-weight-bold mb-0 text-white'>02</span>
                                    <div class='progress progress-xs mt-3 mb-0'>
                                        <div class='progress-bar bg-success' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='100' style='width: 50%;'></div>
                                    </div>
                                </div>

                            </div>
                            <p class='mt-3 mb-0 text-sm'>
                                <a href='#!' class='text-nowrap text-white font-weight-600'>Upcoming  meetings</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class='col-xl-3 col-md-6'>
                    <div class='card bg-gradient-danger border-0'>
                        <!-- Card body -->
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col'>
                                    <h5 class='card-title text-uppercase text-muted mb-0 text-white'>Certificates</h5>
                                    <span class='h2 font-weight-bold mb-0 text-white'>00</span>
                                    <div class='progress progress-xs mt-3 mb-0'>
                                        <div class='progress-bar bg-success' role='progressbar' aria-valuenow='80' aria-valuemin='0' aria-valuemax='100' style='width: 80%;'></div>
                                    </div>
                                </div>

                            </div>
                            <p class='mt-3 mb-0 text-sm'>
                                <a href='#!' class='text-nowrap text-white font-weight-600'>Certificates Earned</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class='col-xl-3 col-md-6'>
                    <div class='card bg-gradient-default border-0'>
                        <!-- Card body -->
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col'>
                                    <h5 class='card-title text-uppercase text-muted mb-0 text-white'>Points</h5>
                                    <span class='h2 font-weight-bold mb-0 text-white'>001</span>
                                    <div class='progress progress-xs mt-3 mb-0'>
                                        <div class='progress-bar bg-success' role='progressbar' aria-valuenow='90' aria-valuemin='0' aria-valuemax='100' style='width: 90%;'></div>
                                    </div>
                                </div>
                            </div>
                            <p class='mt-3 mb-0 text-sm'>
                                <a href='#!' class='text-nowrap text-white font-weight-600'>Total Points Earned</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row text-center justify-content-center' id='courses'>
            
            <div class='card ma-3'>            
            <h3 class='mb-3 mt-4 text-center'>Before you find a data science mentor </h3>

            <h5 class='text-center ma-2'> We strongly suggest building up your core Python and data science skills more before starting a mentorship.
In the meantime, you can use the following courses to catch up.</h5>
<hr/>
</div>

            </div>        
            <div class='row'>
        $courses
      </div>

<div class='row text-center justify-content-center' id='meetings'>

<div class='card'>
           <div class='col-md-8 mx-auto text-center justify-content-center'> 
           <h4 class='mb-3 mt-4'>Join us on the following dates for our scheduled zoom meetings </h4>
           </div>
<hr/>
</div>
            </div>
      <div class='row justify-content-center'>
        $meetings
      </div>
<!--Courses Ends -->



<div class='row'>

 <div class='card'>
            <div class='card-header'>
              <div class='row'>
                <div class='col-md-12'>
                  <h3 class='mb-0'>Your profile </h3>
                </div>
                
              </div>
            </div>
            <div class='card-body'>
              <form>
                <div class='pl-lg-4'>
        
        <div class='row mb-4'>
          
          <div class='col-md-12 card mb-2 card-profile' style='background-image:url(https://notitia.site/wp-content/uploads/2019/12/blog-cover02.jpg); background-repeat:no-repeat;'>
            <img src='' alt='Image placeholder' class='card-img-top' style='height:120px; opacity:0'/>
            
            <div class='row justify-content-center'>
              <div class='col-md-6'>
                <div class='card-profile-image'>
                  <a href='#'>
                    <img src='$avatar' class='' style='height:150px;width:150px;border-radius:50%;'/>
                  </a>
                </div>
              </div>
            </div>
            </div>

            <div class='col-md-12 mb-6'> 
            </div>

            </div>

                  <div class='row'>
                    <div class='col-lg-6'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-username'>Username</label>
                        <input type='text' id='input-username' class='form-control' placeholder='Username' value='$current_user->display_name'>
                      </div>
                    </div>
                    <div class='col-lg-6'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-email'>Email address</label>
                        <input type='email' value='$current_user->user_email' id='input-email' class='form-control'>
                      </div>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-lg-6'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-first-name'>First name</label>
                        <input type='text' id='input-first-name' class='form-control' placeholder='First name' value='$current_user->user_firstname'>
                      </div>
                    </div>
                    <div class='col-lg-6'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-last-name'>Last name</label>
                        <input type='text' id='input-last-name' class='form-control' placeholder='Last name' value='$current_user->user_lastname'>
                      </div>
                    </div>

                    <div class='col-md-12'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-address'>Linked Url</label>
                        <input id='input-address' class='form-control' placeholder='Home Address' value='$current_user->user_url' type='text'>
                      </div>
                    </div>

                    <div class='col-md-12'>
                  <div class='form-group'>
                    <label class='form-control-label'>About Me</label>
                    <textarea rows='4' class='form-control' placeholder='A few words about you ...' value='$current_user->description'>$current_user->description</textarea>
                  </div>
                </div>

                  </div>
                  
                </div>
                <hr class='my-4' />
                <!-- Password -->
                <h6 class='heading-small text-muted mb-4'>Password information</h6>
                <div class='pl-lg-4'>
                  <div class='row'>
                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-address'>Password</label>
                        <input id='input-address' class='form-control' placeholder='Password' value='$current_user->user_pass' type='password'>
                      </div>
                    </div>

                    <div class='col-md-6'>
                      <div class='form-group'>
                        <label class='form-control-label' for='input-address'>Reset your password</label>
                        <input id='input-address' class='form-control' placeholder='Enter new password' value='' type='password'>
                      </div>
                    </div>

                  </div>

                 <div class='row align-items-center justify-content-center'>
                    
                    <div class='col-md-4'> 
                    <button class='btn btn-icon btn-primary' type='button'>
                <span class='btn-inner--icon'><i class='ni ni-bag-17'></i></span>
                <span class='btn-inner--text' onclick='submit_data();'>Update</span>
              </button>
                    </div>

                 </div>

                  </div>
                </div>
                
              </form>
            </div>
          </div>
</div>

<div class='card-deck flex-column flex-xl-row' id='overview'>
                <div class='card'>
                    <div class='card-header bg-transparent'>
                        <h6 class='text-muted text-uppercase ls-1 mb-1'>Overview</h6>
                        <h2 class='h3 mb-0'>Recent Activity</h2>
                    </div>
                    <div class='card-body'>
                        <!-- Chart -->
                        <div class='chart'>
                            <!-- Chart wrapper -->
                            <canvas id='chart-sales' class='chart-canvas'></canvas>
                        </div>
                    </div>
                </div>
                <div class='card'>
                    <div class='card-header bg-transparent'>
                        <div class='row align-items-center'>
                            <div class='col'>
                                <h6 class='text-uppercase text-muted ls-1 mb-1'>Performance</h6>
                                <h2 class='h3 mb-0'>Total assignment marks</h2>
                            </div>
                        </div>
                    </div>
                    <div class='card-body'>
                        <!-- Chart -->
                        <div class='chart'>
                            <canvas id='chart-bars' class='chart-canvas'></canvas>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Footer -->
        </div>
    </div>
    <!-- Argon Scripts -->
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/js-cookie/js.cookie.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js'></script>
    <!-- Optional JS -->
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/onscreen/dist/on-screen.umd.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/chart.js/dist/Chart.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/chart.js/dist/Chart.extension.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/vendor/jvectormap-next/jquery-jvectormap.min.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/js/vendor/jvectormap/jquery-jvectormap-world-mill.js'></script>
    <!-- Argon JS -->
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/js/argon.js?v=1.1.0'></script>
    <script src='https://cdn.jsdelivr.net/npm/vue/dist/vue.js'></script>
    <script src='https://cdn.jsdelivr.net/gh/worlaalex/notitia-frontend-dashboard/assets/js/app.js'></script>
    <!-- Core -->
</div>";
}

add_shortcode('nfd-dashboard', 'create_dashboard');
