<?php
/**
* Theme: nakedpress
*
* Theme Functions, includes, etc.
*
* @package nakedpress
*/

/* ------------------------------------------------------------------------- *
*  Include Functional File
/* ------------------------------------------------------------------------- */


require_once('inc/nakedpress_navwalker.php');   	// script for bootstrap menu
require_once('inc/nakedpress_clean_wp_header_footer.php');   	// script for bootstrap menu


/* ------------------------------------------------------------------------- *
*  Base functionality
/* ------------------------------------------------------------------------- */


// Content width
if ( !isset( $content_width ) ) { $content_width = 720; }


/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'nakedpress_setup' ) ) {

	function nakedpress_setup() {

		add_theme_support( "title-tag" );

		// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// Enable featured image
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 450, 450 );

		// Thumbnail sizes
		add_image_size( 'nakedpress_quad', 600, 600, true ); //(cropped)
		add_image_size( 'nakedpress_single', 800, 999, false );
		add_image_size( 'nakedpress_big', 1400, 928, true ); 	//(cropped)

		// Custom menu areas
		register_nav_menus( array(
			'header' => esc_html__( 'Header', 'nakedpress' )
		) );

		// Load theme languages
		load_theme_textdomain( 'nakedpress', get_template_directory().'/languages' );

	}

}
add_action( 'after_setup_theme', 'nakedpress_setup' );



/*  Register sidebars
/* ------------------------------------ */
if ( ! function_exists( 'nakedpress_sidebars' ) ) {


	function nakedpress_sidebars()	{
		register_sidebar(array( 'name' => esc_html__( 'Primary', 'nakedpress' ),'id' => 'primary','description' => esc_html__( 'Normal full width sidebar.', 'nakedpress' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	}

}
add_action( 'widgets_init', 'nakedpress_sidebars' );


/*  Enqueue javascript
/* ------------------------------------ */
if ( ! function_exists( 'nakedpress_scripts' ) ) {

	function nakedpress_scripts() {

		// all script
		wp_enqueue_script( 'nakedpress-swup', get_template_directory_uri() . '/js/swup.min.js', array( 'jquery' ),null,true );
    wp_enqueue_script( 'nakedpress-swup-plugin-1', get_template_directory_uri() . '/js/SwupBodyClassPlugin.min.js', array( 'jquery' ),null,true );
    wp_enqueue_script( 'nakedpress-swup-plugin-2', get_template_directory_uri() . '/js/SwupHeadPlugin.min.js', array( 'jquery' ),null,true );

		wp_enqueue_script( 'nakedpress-locomotive', get_template_directory_uri() . '/js/locomotive-scroll.min.js', array( 'jquery' ),'', true );

		wp_enqueue_script( 'nakedpress-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ),'', true );

		if ( is_singular() && get_option( 'thread_comments' ) )	{ wp_enqueue_script( 'comment-reply' ); }

	}

}
add_action( 'wp_enqueue_scripts', 'nakedpress_scripts' );


/*  Enqueue css
/* ------------------------------------ */
if ( ! function_exists( 'nakedpress_styles' ) ) {

	function nakedpress_styles() {
		wp_enqueue_style( 'nakedpress-normalize', get_template_directory_uri().'/css/normalize.min.css');
		wp_enqueue_style( 'nakedpress-locomotive', get_template_directory_uri().'/css/locomotive-scroll.min.css');
		wp_enqueue_style( 'nakedpress-google-font','//fonts.googleapis.com/css?family=Montserrat:400,600,700');
		wp_enqueue_style( 'nakedpress-style', get_template_directory_uri().'/style.css');

	}

}
add_action( 'wp_enqueue_scripts', 'nakedpress_styles' );


/* ------------------------------------------------------------------------- *
*  General
/* ------------------------------------------------------------------------- */


/*  Add class to body if featured image is set
/* ------------------------------------ */
// add_action('body_class', 'nakedpress_add_class_trasparent_to_body' );
// function nakedpress_add_class_trasparent_to_body($classes) {
// 	if ( has_post_thumbnail() && is_page() ) {
// 		array_push($classes, 'navbar-transparent');
// 	} else if (is_page_template( 'page-templates/home-page.php' )) {
// 		array_push($classes, 'navbar-transparent');
// 	}
// 	return $classes;
// }

/*  Disable Gallery Inline Style
/* ------------------------------------ */
add_filter( 'use_default_gallery_style', '__return_false' );

/*  Oembed Responsive
/* ------------------------------------ */
add_filter( 'embed_oembed_html', 'nakedpress_oembed_filter', 10, 4 ) ;

function nakedpress_oembed_filter($html, $url, $attr, $post_ID) {
	$return = '<div class="video-container">'.$html.'</div>';
	return $return;
}

?>
