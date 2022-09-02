<?php
/**
 * @package WordPress
 * @subpackage USV
 */

/***********************************************************************************************/
/* Define Constants */
/***********************************************************************************************/
define( 'THEMEDIR', get_stylesheet_directory_uri() );
define( 'IMG', THEMEDIR . '/img' );
define( 'JS', THEMEDIR . '/js' );

if ( ! isset( $content_width ) ) $content_width = 900; 


/**
 * Tell WordPress to run usv() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'usv' );

if ( ! function_exists( 'usv' ) ):

	function usv_fonts_url() {
		$fonts_url = '';

		/* Translators: If there are characters in your language that are not
		 * supported by Droid Sans translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$droid_sans = _x( 'on', 'Droid Sans font: on or off', 'usv' );

		$droid_serif = _x( 'on', 'Droid Serif font: on or off', 'usv' );

		if ( 'off' !== $droid_sans || 'off' !== $droid_serif ) {
			$font_families = array();

			if ( 'off' !== $droid_sans ) {
				$font_families[] = 'Droid Sans:400,700';
			}

			if ( 'off' !== $droid_serif ) {
				$font_families[] = 'Droid Serif:400,700,400italic,700italic';
			}

			$query_args = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin' ),
			);
			$fonts_url  = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
		}

		return $fonts_url;
	}


	/**
	 * Enqueue scripts and styles.
	 */

	function usv_scripts() {

		// Loads main stylesheet
		wp_enqueue_style( 'usv-style', THEMEDIR . '/style.css', array(), null );

		wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css', array(), null );

		// Add Google Webfonts
		wp_enqueue_style( 'usv_fonts', usv_fonts_url(), array(), null );

		// Loads JavaScript for Menu2
		wp_enqueue_script( 'menu2', JS . '/menu2.js', array( 'jquery' ), null, true );

		// Loads JavaScript for Email Cloaking
		wp_enqueue_script( 'cloak', JS . '/cloak.js', array( 'jquery' ), null, true );

		wp_deregister_script( 'contact-form-7' );
	}

	add_action( 'wp_enqueue_scripts', 'usv_scripts' );
	add_filter( 'wpcf7_load_js', '__return_false' );
	add_filter( 'wpcf7_load_css', '__return_false' );
	/**
	 * Disable Javascript from Plugins on unnessesary Sites
	 */

	function register_javascript() {
		if ( is_page( 'kontakt' ) || is_page( 'spielleiter' ) ) {
			wpcf7_enqueue_scripts();
			wpcf7_enqueue_styles();
		}
	}

	add_action( 'wp_enqueue_scripts', 'register_javascript', 100 );

/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

	/**
	 * Creates a nicely formatted and more specific title element text for output
	 * in head of document, based on current view.
	 * @param $title string
	 * @param $sep string
	 * @return string
	 */
	function usv_wp_title( $title, $sep ) {
		global $paged, $page;

		if ( is_feed() ) {
			return $title;
		}

		// Add the site name.
		$title .= get_bloginfo( 'name' );

		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 ) {
			$title = "$title $sep " . sprintf( __( 'Seite %s', 'usv' ), max( $paged, $page ) );
		}

		return $title;
	}

	add_filter( 'wp_title', 'usv_wp_title', 10, 2 );

	/* exclude specific pages from search */

	function usv_exclude_from_search( $query ) {
		if ( $query->is_search ) {
			$query->set( 'post__not_in', array( 1699, 31, ) ); // IDs anpassen!
		}

		return $query;
	}

	add_filter( 'pre_get_posts', 'usv_exclude_from_search' );


	/**
	 * Sets up theme defaults and registers support for WordPress features.
	 */
	function usv() {

		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );

		// Add support for Post Formats
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'video', 'status' ) );

		register_nav_menus( array(
			'header-nav' => 'Kopfzeilen-Navigation',
			'footer-nav' => 'Footer-Navigation',
		) );

	}
endif;


function usv_widgets_init() {
	register_sidebar( array(
		'name'          => 'Home-Sidebar',
		'id'            => 'sidebar-home',
		'description'   => 'Navigation für die Hauptseite',
		'before_widget' => '<aside class="sidebar-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'usv_widgets_init' );

function entferne_weiterlesen_anker( $verweis ) {
	$ergebnis = '';
	$entfernen = strpos( $verweis, '#more-' );
	if ( $entfernen ) {
		$ergebnis = strpos( $verweis, '"', $entfernen );
	}
	if ( $ergebnis != '' ) {
		$verweis = substr_replace( $verweis, '', $entfernen, $ergebnis - $entfernen );
	}

	return $verweis;
}

add_filter( 'the_content_more_link', 'entferne_weiterlesen_anker' );

remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version


// Add Shortcode
function email_cloaking_shortcode( $atts ) {

	// Attributes
	extract( shortcode_atts(
			array(
				'pre'     => '',
				'suf'     => '',
				'dom'     => '',
				'display' => ''
			), $atts )
	);

	// Code
	return '<span class="cloakMail" data-pre="' . $pre . '" data-suf="' . $suf . '" data-dom="' . $dom . '" data-display="' . $display . '">' . $display . '</span><noscript><br>"Diese E-Mail-Adresse ist vor Spambots geschützt! Zur Anzeige muss JavaScript eingeschaltet sein!"</noscript>';
}

add_shortcode( 'mail', 'email_cloaking_shortcode' );

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

//Funktion um Beitragsbilder im RSS-Feed anzuzeigen
function image_in_rss($content)
{
    global $post;
	
  $first_img = '';
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];
	
    // Überprüfen, ob Artikel ein Beitragsbild hat
    if (empty($first_img))
    {
        $content = '<img src="' . IMG . '/usv_wap.png"/>' . $content;
    }
    return $content;
}
//Filter für RSS-Auszug
add_filter('the_excerpt_rss', 'image_in_rss');
//Filter für RSS-Content
add_filter('the_content_feed', 'image_in_rss');