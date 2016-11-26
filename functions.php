<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/menu-walkers.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/protocol-relative-theme-assets.php' );

// Enable ACF Options Page
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' => 'Options',
		'menu_title' => 'Options',
		'menu_slug' => 'options',
		'capability' => 'edit_posts',
		'parent_slug' => '',
		'position' => '',
		'icon_url' => 'dashicons-welcome-write-blog'
	));
	acf_add_options_sub_page(array(
		'page_title' => 'Header',
		'menu_title' => 'Header',
		'menu_slug' => 'header',
		'capability' => 'edit_posts',
		'parent_slug' => 'options',
		'position' => false,
		'icon_url' => false
	));
	acf_add_options_sub_page(array(
		'page_title' => 'Footer',
		'menu_title' => 'Footer',
		'menu_slug' => 'footer',
		'capability' => 'edit_posts',
		'parent_slug' => 'options',
		'position' => false,
		'icon_url' => false
	));

}

// Register Google Map API Key
function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyA_HM9RE0s-tXZs38pc_h5hYK4PcboJ8Uc');
}

add_action('acf/init', 'my_acf_init');
