<?php
//check for security
if (!defined('ABSPATH')) {
    exit('ABSPATH must be set before running');
}
function seosurge_wp_admin_style()
    { 
//Load SEOSurge css and js
 wp_enqueue_style('seosurge-frontend-style', plugin_dir_url(SEOSURGE_PLUGIN_FILE) . 'includes/style.css', [], SEOSURGE_VERSION);
wp_enqueue_script('seosurge-frontend-js', plugin_dir_url(SEOSURGE_PLUGIN_FILE) . 'includes/frontend.js', [],  SEOSURGE_VERSION, true);
	  	   
}
add_action('admin_enqueue_scripts', 'seosurge_wp_admin_style', PHP_INT_MAX);