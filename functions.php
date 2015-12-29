<?php

add_action( 'after_setup_theme', 'usv' );

function usv_scripts() {
	wp_enqueue_style( 'usv-fonts', '//fonts.googleapis.com/css?family=Droid+Sans:400,700', array(), null );

	wp_enqueue_style( 'usv-style', get_stylesheet_uri(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'usv_scripts' );

function add_rss_link() {
	$rss = '<link rel="alternate" type="application/rss+xml" title="';
	$rss .= get_bloginfo( 'sitename' ) . ' Feed" href="';
	$rss .= get_bloginfo( 'rss2_url' ) . '">';
	echo $rss;
}

add_action( 'wp_head', 'add_rss_link' );

function usv() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

	add_filter( 'the_generator', '__return_false' );
	add_filter( 'show_admin_bar', '__return_false' );

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	remove_action( 'wp_head', 'feed_links_extra', 3 );

	add_theme_support( 'html5',
		array( 'search-form', 'gallery', 'caption', 'widgets' )
	);
}

?>