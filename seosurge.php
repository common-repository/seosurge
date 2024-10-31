<?php
/*
 * Plugin Name: SEOSurge
 * Description: Discover insights into the worldwide and regional online tendencies by analyzing the search behaviors and interests of internet users based on specific keywords and topics.
 * Version: 1.0
 * Author: Droid
 * Author URI: https://droid.az
 * License: GPL2+
 * Text Domain: SEOSurge
 * Requires at least: 5.0
 * Requires PHP: 5.4
 *
*/
// add basic plugin security.
defined('ABSPATH') || exit;

if (!defined('SEOSURGE_PLUGIN_FILE')) {
    define('SEOSURGE_PLUGIN_FILE', __FILE__);
}

//define minimum wp, php version and the plugin path
define( 'SEOSURGE_MINIMUM_WP_VERSION', '5.0' );
define( 'SEOSURGE_VERSION', '1.0' );
//require once included file
require_once plugin_dir_path(SEOSURGE_PLUGIN_FILE) . '/app/details.php';
require_once plugin_dir_path(SEOSURGE_PLUGIN_FILE) . '/app/dashboard.php';

// Function to add SEOSurge menu item to the dashboard
function seosurge_menu_item() {
    add_menu_page(
        'SEOSurge',            // Page title
        'SEOSurge',            // Menu title
        'manage_options',       // Capability required to access the menu
        'seosurge-dashboard',  // Menu slug
        'seosurge_dashboard',  // Function to output content
        'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCg0KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4NCjwhLS0gVXBsb2FkZWQgdG86IFNWRyBSZXBvLCB3d3cuc3ZncmVwby5jb20sIEdlbmVyYXRvcjogU1ZHIFJlcG8gTWl4ZXIgVG9vbHMgLS0+DQo8c3ZnIGhlaWdodD0iODAwcHgiIHdpZHRoPSI4MDBweCIgdmVyc2lvbj0iMS4xIiBpZD0iX3gzMl8iIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIA0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCgkuc3Qwe2ZpbGw6IzAwMDAwMDt9DQo8L3N0eWxlPg0KPGc+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTYxLjkzNiwzNDUuMTg2aDM4OC4xMjhjMTQuODEsMCwyNi44MjItMTIuMDE5LDI2LjgyMi0yNi44MjhWODkuOTY3YzAtMTQuNzk3LTEyLjAxMi0yNi44MS0yNi44MjItMjYuODENCgkJSDYxLjkzNmMtMTQuODEsMC0yNi44MSwxMi4wMTItMjYuODEsMjYuODF2MjI4LjM5QzM1LjEyNywzMzMuMTY3LDQ3LjEyNiwzNDUuMTg2LDYxLjkzNiwzNDUuMTg2eiBNNzYuMTI2LDk5LjE4OWgzNTkuNzQ5djIwMy42NDkNCgkJSDc2LjEyNlY5OS4xODl6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTUwOC4wMjUsNDE5LjYwOWwtNDcuODQxLTQyLjQ2OGMtMy4wNzYtMi43MjItNy41LTQuMjY2LTEyLjE3MS00LjI2Nkg2My45OA0KCQljLTQuNjY0LDAtOS4wOTUsMS41NDQtMTIuMTY0LDQuMjY2TDMuOTY4LDQxOS42MDlDMS40MDUsNDIxLjg3NCwwLDQyNC43OTIsMCw0MjcuODExdjE0Ljc5N2MwLDMuNDU2LDMuNjA4LDYuMjM0LDguMDY0LDYuMjM0DQoJCWg0OTUuODc0YzQuNDY4LDAsOC4wNjMtMi43NzgsOC4wNjMtNi4yMzR2LTE0Ljc5N0M1MTIsNDI0Ljc5Miw1MTAuNTg4LDQyMS44NzQsNTA4LjAyNSw0MTkuNjA5eiBNMjAxLjEzNyw0MjQuNjIxbDEzLjg0OC0xOC43MjENCgkJaDg3LjczM2wxMy44MjksMTguNzIxSDIwMS4xMzd6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTE4OS4xNDMsMjAwLjk2bC00LjQ0Mi0wLjYzM2MtMTEuMzc0LTEuNTg4LTE1LjQ0OS01LjU1LTE1LjQ0OS0xMS4zNTRjMC02LjU0NSw0LjY5LTExLjI0MSwxMy4yMjEtMTEuMjQxDQoJCWM3LjAzOCwwLDEzLjM0MiwyLjA5NSwyMC4xMzksNi41NDRsMS43MjgtMC4zNzNsNS45MzYtOS4xNDZsLTAuMjUzLTEuNzIxYy02LjY3MS01LjA2OS0xNi42ODMtOC4zOTItMjcuMTc3LTguMzkyDQoJCWMtMTcuMjk3LDAtMjguNDE3LDEwLjExMy0yOC40MTcsMjUuMzIyYzAsMTMuOTU2LDkuMTM5LDIxLjc0LDI1LjMyMiwyMy45NjJsNC40NTYsMC42MmMxMS42MDgsMS42MDEsMTUuMzEsNS41NSwxNS4zMSwxMS42MDcNCgkJYzAsNy4wMzItNS44MDQsMTIuMTA4LTE1LjgxLDEyLjEwOGMtOS4zOTIsMC0xNy40MjMtNC41Ny0yMi44NTQtOC44ODZsLTEuNzI4LDAuMTE0bC03LjY2NCw4Ljg5OWwwLjI0NiwxLjg2MQ0KCQljNi41NTEsNi4xNywxOC41MzgsMTEuMTAxLDMwLjg4NiwxMS4xMDFjMjAuODkyLDAsMzEuNjM4LTExLjEwMSwzMS42MzgtMjYuMDVDMjE0LjIzMiwyMTAuODMzLDIwNS4zMjcsMjAzLjE2OCwxODkuMTQzLDIwMC45NnoiLz4NCgk8cG9seWdvbiBjbGFzcz0ic3QwIiBwb2ludHM9IjIyOS45MjgsMTY1Ljk4NiAyMjguNjkzLDE2Ny4yMTkgMjI4LjY5MywyNDguNzc2IDIyOS45MjgsMjUwLjAxIDI4Mi41NTQsMjUwLjAxIDI4My43OTQsMjQ4Ljc3NiANCgkJMjgzLjc5NCwyMzguMTQ5IDI4Mi41NTQsMjM2LjkxNSAyNDQuMDE2LDIzNi45MTUgMjQzLjI3NSwyMzYuMTYyIDI0My4yNzUsMjE0LjkxNSAyNDQuMDE2LDIxNC4xNzUgMjc2LjUxLDIxNC4xNzUgMjc3Ljc1LDIxMi45NCANCgkJMjc3Ljc1LDIwMi4zMTQgMjc2LjUxLDIwMS4wOCAyNDQuMDE2LDIwMS4wOCAyNDMuMjc1LDIwMC4zMjYgMjQzLjI3NSwxNzkuODI3IDI0NC4wMTYsMTc5LjA4NyAyODIuNTU0LDE3OS4wODcgMjgzLjc5NCwxNzcuODQ2IA0KCQkyODMuNzk0LDE2Ny4yMTkgMjgyLjU1NCwxNjUuOTg2IAkiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMzI4LjU0LDE2NC42NDRjLTE0LjQ2MiwwLTI1LjMyOSw2LjkwNS0yOS42NTgsMjAuMjQ2Yy0xLjcyOCw1LjE5LTIuMjI4LDkuODg2LTIuMjI4LDIzLjEwNw0KCQljMCwxMy4yMjIsMC41LDE3LjkxOCwyLjIyOCwyMy4xMDhjNC4zMjksMTMuMzQyLDE1LjE5NiwyMC4yNDYsMjkuNjU4LDIwLjI0NmMxNC41NzYsMCwyNS40MzYtNi45MDUsMjkuNzY2LTIwLjI0Ng0KCQljMS43MzQtNS4xOSwyLjIzNC05Ljg4NiwyLjIzNC0yMy4xMDhjMC0xMy4yMjEtMC41LTE3LjkxNy0yLjIzNC0yMy4xMDdDMzUzLjk3NywxNzEuNTQ5LDM0My4xMTYsMTY0LjY0NCwzMjguNTQsMTY0LjY0NHoNCgkJIE0zNDQuMjI0LDIyNy4yNjNjLTIuMzQ4LDYuODEtNy4yODQsMTEtMTUuNjgzLDExYy04LjI4NCwwLTEzLjIyMS00LjE5LTE1LjU3Ni0xMWMtMC45ODEtMy4wODktMS40ODEtNy40MTItMS40ODEtMTkuMjY2DQoJCWMwLTExLjk4NywwLjUtMTYuMTc3LDEuNDgxLTE5LjI3OGMyLjM1NC02Ljc5Nyw3LjI5MS0xMC45ODcsMTUuNTc2LTEwLjk4N2M4LjM5OSwwLDEzLjMzNSw0LjE5LDE1LjY4MywxMC45ODcNCgkJYzAuOTgxLDMuMTAxLDEuNDk0LDcuMjkxLDEuNDk0LDE5LjI3OEMzNDUuNzE4LDIxOS44NTIsMzQ1LjIwNSwyMjQuMTc0LDM0NC4yMjQsMjI3LjI2M3oiLz4NCjwvZz4NCjwvc3ZnPg==',    // base64 SVG logo
        74                       // Position (Above Tools menu)
    );
}
add_action('admin_menu', 'seosurge_menu_item');

// Make sure WP version is up to SEOSurge standards.
if ( version_compare( $GLOBALS['wp_version'], SEOSURGE_MINIMUM_WP_VERSION, '<' ) ) {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
		error_log(
			/* translators: 1: WordPress version number */
			sprintf( esc_html__( 'Your version of WordPress (%1$s) is lower than the version required by SEOSurge (%2$s). Please update WordPress to continue enjoying SEOSurge.', 'seosurge' ),
				$GLOBALS['wp_version'],
				SEOSURGE_MINIMUM_WP_VERSION
			)
		);
	}
	function seosurge_admin_unsupported_wp_notice() {
		wp_admin_notice(
			esc_html__( 'SEOSurge requires a more recent version of WordPress and has been paused. Please update WordPress to continue enjoying SEOSurge.', 'seosurge' ),
			array(
				'type'        => 'error',
				'dismissible' => true,
			)
		);
	}

	add_action( 'admin_notices', 'seosurge_admin_unsupported_wp_notice' );
	return;
}	