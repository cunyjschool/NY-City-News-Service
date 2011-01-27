<?php

define( 'NYCITYNEWSSERVICE_VERSION', '1.0.7' );

if ( !class_exists('nycitynewsservice') ) {
	
class nycitynewsservice {
	
	function __construct() {
		
		add_action( 'init', array(&$this, 'init') );
		// Add support for post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		add_image_size( 'election-2010-thumb', 100, 100, true );
		add_image_size( 'thumbnail-primary', 150, 100, true );
		add_image_size( 'thumbnail-secondary', 100, 75, true );	
		add_image_size( 'sidebar-primary', 225, 100, true );
		add_image_size( 'post-primary', 485, 250, true );
	}
	
	function init() {
		
		// Enqueue our stylesheets		
		//$this->enqueue_stylesheets();
		add_action( 'wp_print_styles', array( &$this, 'enqueue_public_stylesheets' ) );
		add_action( 'wp_print_scripts', array( &$this, 'enqueue_public_scripts' ) );
	}
	
	/**
	 * Queue up any public stylesheets we have
	 */
	function enqueue_public_stylesheets() {
		
		// Primary News Service stylesheet
		wp_enqueue_style( 'nycitynewsservice_primary', get_bloginfo('template_directory') . '/style.css', false, NYCITYNEWSSERVICE_VERSION );
			
		// Only load the Election2008 stylesheet on relevant views
		if ( is_category('election2008') ) {
			wp_enqueue_style( 'nycitynewsservice_election2008', get_bloginfo('template_directory') . '/css/election2008.css', false, NYCITYNEWSSERVICE_VERSION );
		}
			
		if ( is_category(2307) ) {
			wp_enqueue_style( 'nycitynewsservice_queens', get_bloginfo('template_directory') . '/css/queens.css', false, NYCITYNEWSSERVICE_VERSION );
		}
			
		
		// Only load the Election2010 stylesheet on relevant views
		if ( is_page( 'election-2010' ) ) {
			wp_enqueue_style( 'nycitynewsservice_election2010', get_bloginfo('template_directory') . '/css/election2010.css', false, NYCITYNEWSSERVICE_VERSION );

		}
		
	} // END - enqueue_public_stylesheets()
	
	/**
	 * Queue up any public scripts we have
	 */
	function enqueue_public_scripts() {
		
		wp_enqueue_script( 'jquery' );
		
		// Only load the Election2010 script on relevant views
		if ( is_page( 'election-2010' ) ) {
			wp_enqueue_script( 'nycitynewsservice_election2010', get_bloginfo('template_directory') . '/js/election2010.js', array( 'jquery' ), NYCITYNEWSSERVICE_VERSION, true );

		}
		
	} // END - enqueue_public_scripts()
	
}
	
}

global $nycitynewsservice;
$nycitynewsservice = new nycitynewsservice();

function inherit_template() {

	if (is_category()) {
	    $catid = get_query_var('cat');

	    if ( file_exists(TEMPLATEPATH . '/category-' . $catid . '.php') ) {
		include( TEMPLATEPATH . '/category-' . $catid . '.php');
		exit;
	    }

	    $cat = &get_category($catid);
	    $parent = $cat->category_parent;

	    while ($parent){
		$cat = &get_category($parent);
		if ( file_exists(TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php') ) {
		    include (TEMPLATEPATH . '/category-' . $cat->cat_ID . '.php');
		    exit;
		}

	    $parent = $cat->category_parent;

	    }
	}

}

add_action('template_redirect', 'inherit_template', 1);

// end inherit template

/**
 * Add a custom stylesheet reference to the <head> if it exists in a custom field
 * @author danielbachhuber
 */
function cunyj_custom_page_stylesheet() {
	global $post, $nycitynewsservice;
	
	if ( ( is_page() || is_single() ) && $stylesheet = get_post_meta( $post->ID, 'stylesheet', true ) ) {
		echo '<link rel="stylesheet" href="' . get_bloginfo('template_directory') . '/css/' . $stylesheet . '?v=' . NYCITYNEWSSERVICE_VERSION . '" type="text/css" media="all" />';
	}
}

add_action( 'wp_head', 'cunyj_custom_page_stylesheet' );

function cunyj_get_vimeo_data( $url, $args = null ) {

	$defaults = array(	'height' => 300,
						'width' => 500,
						'maxheight' => null,
						'maxwidth' => null,
				);
	if ( $args ) {
		$args = array_merge( $defaults, $args );
	} else {
		$args = $defaults;
	}
	extract( $args );
	
	$url = urlencode( $url );
	$request_url = "http://vimeo.com/api/oembed.json?url=$url&width=$width&height=$height";
	
	// @todo Cache results with transient API
	// @todo ability to not return the title
	if ( class_exists('WP_Http') ) {
		$request = new WP_Http;
		$result = $request->request( $request_url );
		if ( is_wp_error($result) ) {
			return array();
		} else {
			return json_decode( $result['body'], true );
		}
	} else {
		return array();
	}
	
}


if ( function_exists('wp_register_sidebar') )
    wp_register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

?>