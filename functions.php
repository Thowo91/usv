<?php

define('THEMEDIR', get_stylesheet_directory_uri());
define('IMG', THEMEDIR . '/img');
define('JS', THEMEDIR . '/js');

add_action( 'after_setup_theme', 'usv' );

function usv_scripts() {
	wp_enqueue_style( 'usv-fonts', '//fonts.googleapis.com/css?family=Droid+Sans:400,700', array(), null );

	wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), null );

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

function usv_wp_title( $title ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', 'usv' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}

add_filter( 'wp_title', 'usv_wp_title' );

function usv_widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar',
		'id'            => 'sidebar',
		'description'   => 'Navigation für Home & Single',
		'before_widget' => '<aside>',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );
}

add_action( 'widgets_init', 'usv_widgets_init' );

function cleanup_head() {
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

	add_filter( 'the_generator', '__return_false' );
	add_filter( 'show_admin_bar', '__return_false' );

	remove_action( 'wp_head', 'feed_links_extra', 3 );
}

add_action( 'init', 'cleanup_head' );

function disable_wp_emojicons() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
}

add_action( 'init', 'disable_wp_emojicons' );

function usv() {

	add_theme_support( 'html5',
		array( 'search-form', 'gallery', 'caption', 'widgets' )
	);

	register_nav_menus( array(
		'header-nav' => 'Header-Navigation',
		'footer-nav' => 'Footer-Navigation'
	) );
}

function remove_more_jump_link( $link ) {
	$offset = strpos( $link, '#more-' );
	$end = '';
	if ( $offset ) {
		$end = strpos( $link, '"', $offset );
	}
	if ( $end ) {
		$link = substr_replace( $link, '', $offset, $end - $offset );
	}

	return $link;
}

add_filter( 'the_content_more_link', 'remove_more_jump_link' );
