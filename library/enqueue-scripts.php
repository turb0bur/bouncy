<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

	// Enqueue the main Stylesheet.
	wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/assets/stylesheets/foundation.css', array(), '2.6.1', 'all' );
	// Enqueue the Stylesheet of pe-icon-7-stroke.
	// wp_enqueue_style( 'pe-icon-7-stroke', get_template_directory_uri() . '/assets/stylesheets/pe-icon-7-stroke.css', array(), null , 'all' );

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );

	// Enqeue Swipebox
	// wp_enqueue_script('swipebox', get_template_directory_uri() . '/assets/javascript/vendor/jquery.swipebox.min.js', array('jquery'), null, true);

	// Isotope (Layout images and filter)
	wp_enqueue_script('Isotope', get_template_directory_uri() . '/assets/javascript/vendor/isotope.pkgd.min.js', array('jquery'), null, true);

	// Enqeue Google Map API Script
	wp_enqueue_script('google-map-api','https://maps.googleapis.com/maps/api/js?key=AIzaSyA_HM9RE0s-tXZs38pc_h5hYK4PcboJ8Uc', null, null, true);

	// Enqeue ACF Google Map
	wp_enqueue_script('google-map', get_template_directory_uri() . '/assets/javascript/vendor/map.js', array('jquery', 'google-map-api'), null, true);

	// If you'd like to cherry-pick the foundation components you need in your project, head over to gulpfile.js and see lines 35-54.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
	wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/javascript/foundation.js', array('jquery'), '2.6.1', true );

	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;
