<?php
/* -------------------------------------------------------------------------- */
/* Clean WordPress Header & Footer */
/* -------------------------------------------------------------------------- */

//add contact form style css e js only in page with shortcode
function nakedpress_contactform_css_js() {
	global $post;
	if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'contact-form-7') ) {
		wp_enqueue_script('contact-form-7');
		wp_enqueue_style('contact-form-7');

	}else{
		wp_dequeue_script( 'contact-form-7' );
		wp_dequeue_style( 'contact-form-7' );
	}
}
add_action( 'wp_enqueue_scripts', 'nakedpress_contactform_css_js');

//remove xmlpc link
remove_action ('wp_head', 'rsd_link');

//remove version wp
function nakedpress_remove_version() {
	return '';
}
add_filter('the_generator', 'nakedpress_remove_version');

// Remove wlwmanifest link
remove_action( 'wp_head', 'wlwmanifest_link');


// Remove shortlink
remove_action( 'wp_head', 'wp_shortlink_wp_head');

//Remove api.w.org relation link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

//Remove query strings from all static resources
function nakedpress_cleanup_query_string( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', 'nakedpress_cleanup_query_string', 15, 1 );
add_filter( 'style_loader_src', 'nakedpress_cleanup_query_string', 15, 1 );

// remove rss link
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed


// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// remove recent comment
function nakedpress_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'nakedpress_remove_recent_comments_style');

/**
* Move jQuery to the footer.
*/
function nakedpress_enqueue_scripts() {
	wp_scripts()->add_data( 'jquery', 'group', 1 );
	wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'nakedpress_enqueue_scripts' );

// remove WP 4.9+ dns-prefetch nonsense
remove_action( 'wp_head', 'wp_resource_hints', 2 );

// remove WP embed.js
function nakedpress_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'nakedpress_deregister_scripts' );


//Remove JQuery migrate
function nakedpress_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];

		if ( $script->deps ) { // Check whether the script has any dependencies
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}

add_action( 'wp_default_scripts', 'nakedpress_remove_jquery_migrate' );

/* -------------------------------------------------------------------------- */
/* END Clean WordPress Header & Footer */
/* -------------------------------------------------------------------------- */
?>
