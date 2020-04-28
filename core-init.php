<?php 
/*
*
*	***** Notitia FrontEnd Dashboard *****
*
*	This file initializes all NFD Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants
define('NFD_CORE_INC',dirname( __FILE__ ).'/assets/inc/');
define('NFD_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('NFD_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('NFD_CORE_VENDOR',plugins_url( 'assets/vendor/', __FILE__ ));
define('NFD_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
/*
*
*  Register CSS
*
*/
function nfd_register_core_css(){
wp_enqueue_style('nfd-core', NFD_CORE_CSS . 'nucleo.css',null,time(),'all');
wp_enqueue_style('nfd-core', NFD_CORE_CSS . 'all.min.css',null,time(),'all');
wp_enqueue_style('nfd-core', NFD_CORE_CSS . 'argon.css?v=1.1.0',null,time(),'all');
};
// add_action( 'wp_enqueue_scripts', 'nfd_register_core_css' );    
/*
*
*  Register JS/Jquery Ready
*
*/
function nfd_register_core_js(){
// Register Core Plugin JS	
 
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'jquery/dist/jquery.min.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'bootstrap/dist/js/bootstrap.bundle.min.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'js-cookie/js.cookie.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'jquery.scrollbar/jquery.scrollbar.min.js',null,time(),true);

wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'jquery-scroll-lock/dist/jquery-scrollLock.min.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'chart.js/dist/Chart.min.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'chart.js/dist/Chart.extension.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_VENDOR . 'jvectormap-next/jquery-jvectormap.min.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_JS . 'vendor/jvectormap/jquery-jvectormap-world-mill.js',null,time(),true);
wp_enqueue_script('nfd-core', NFD_CORE_JS . 'argon.js?v=1.1.0',null,time(),true);
};
// add_action( 'wp_enqueue_scripts', 'nfd_register_core_js' );    
/*
*
*  Includes
*
*/ 

// Load the Functions
if ( file_exists( NFD_CORE_INC . 'nfd-template.php' ) ) {
	require_once NFD_CORE_INC . 'nfd-template.php';
} 

// Load the Functions
if ( file_exists( NFD_CORE_INC . 'nfd-core-functions.php' ) ) {
	require_once NFD_CORE_INC . 'nfd-core-functions.php';
}     
// Load the ajax Request
if ( file_exists( NFD_CORE_INC . 'nfd-ajax-request.php' ) ) {
	require_once NFD_CORE_INC . 'nfd-ajax-request.php';
} 
// Load the Shortcodes
if ( file_exists( NFD_CORE_INC . 'nfd-shortcodes.php' ) ) {
	require_once NFD_CORE_INC . 'nfd-shortcodes.php';
}