<?php

define( 'NYCITYNEWSSERVICE_VERSION', '1.1' );
	
class nycitynewsservice {
	
	/**
	 * __construct()
	 */
	function __construct() {
		
		add_action( 'init', array(&$this, 'init') );
		
		// Create our custom taxonomies
		add_action( 'init', array( &$this, 'create_taxonomies' ) );
		
		// Add support for post thumbnails
		add_theme_support( 'post-thumbnails' );	
		add_image_size( 'election-2010-thumb', 100, 100, true );
		add_image_size( 'thumbnail-primary', 150, 100, true );
		add_image_size( 'thumbnail-secondary', 100, 75, true );	
		add_image_size( 'sidebar-primary', 225, 100, true );
		add_image_size( 'post-primary', 485, 250, true );
		
	} // END __construct()
	
	/**
	 * init()
	 */
	function init() {
		
		// Enqueue our stylesheets		
		//$this->enqueue_stylesheets();
		add_action( 'wp_print_styles', array( &$this, 'enqueue_public_stylesheets' ) );
		add_action( 'wp_print_scripts', array( &$this, 'enqueue_public_scripts' ) );
		
	} // END init()
	
	/**
	 * Queue up any public stylesheets we have
	 */
	function enqueue_public_stylesheets() {
		
		// Primary News Service stylesheet
		wp_enqueue_style( 'nycitynewsservice_primary', get_bloginfo('template_directory') . '/style.css', false, NYCITYNEWSSERVICE_VERSION );
			
		// Only load the Election2008 stylesheet on relevant views
		if ( is_category( '2008-election' ) ) {
			wp_enqueue_style( 'nycitynewsservice_election2008', get_bloginfo('template_directory') . '/css/election2008.css', false, NYCITYNEWSSERVICE_VERSION );
		}
		
		// Only load the Queens stylesheet on its category page	
		if ( is_category( '2008-queens-immigration-project' ) ) {
			wp_enqueue_style( 'nycitynewsservice_queens', get_bloginfo('template_directory') . '/css/queens.css', false, NYCITYNEWSSERVICE_VERSION );
		}
			
		// Only load the Election2010 stylesheet on relevant views
		if ( is_page( 'election-2010' ) ) {
			wp_enqueue_style( 'nycitynewsservice_election2010', get_bloginfo('template_directory') . '/css/election2010.css', false, NYCITYNEWSSERVICE_VERSION );

		}
		
		// Only load the Housing 2011 stylesheet on its taxonomy page	
		if ( is_tax( 'nycns_projects', '2011-housing-project' ) ) {
			wp_enqueue_style( 'nycitynewsservice_housing2011', get_bloginfo('template_directory') . '/css/housing2011.css', false, NYCITYNEWSSERVICE_VERSION );
		}		
		
	} // END - enqueue_public_stylesheets()
	
	/**
	 * create_taxonomies()
	 * Register taxonomies for all of our post types
	 */
	function create_taxonomies() {

		// Register the Places taxonomy
		$args = array(
			'label' => 'places',
			'labels' => array(
				'name' => 'Places',
				'singular_name' => 'Place',
				'search_items' =>  'Search Places',
				'popular_items' => 'Popular Places',
				'all_items' => 'All Places',
				'parent_item' => 'Parent Places',
				'parent_item_colon' => 'Parent Places:',
				'edit_item' => 'Edit Place', 
				'update_item' => 'Update Place',
				'add_new_item' => 'Add New Place',
				'new_item_name' => 'New Place',
				'separate_items_with_commas' => 'Separate places with commas',
				'add_or_remove_items' => 'Add or remove places',
				'choose_from_most_used' => 'Choose from the most common places',
				'menu_name' => 'Places',
			),
			'show_tagcloud' => false,
			'rewrite' => array(
				'slug' => 'places',
				'hierarchical' => true,
			),
		);

		$post_types = array(
			'post',
		);
		register_taxonomy( 'nycns_places', $post_types, $args );
		
		// Register the Topics taxonomy
		$args = array(
			'label' => 'topics',
			'labels' => array(
				'name' => 'Topics',
				'singular_name' => 'Topics',
				'search_items' =>  'Search Topics',
				'popular_items' => 'Popular Places',
				'all_items' => 'All Topics',
				'parent_item' => 'Parent Topics',
				'parent_item_colon' => 'Parent Topics:',
				'edit_item' => 'Edit Topic', 
				'update_item' => 'Update Topic',
				'add_new_item' => 'Add New Topic',
				'new_item_name' => 'New Topic',
				'separate_items_with_commas' => 'Separate topics with commas',
				'add_or_remove_items' => 'Add or remove topics',
				'choose_from_most_used' => 'Choose from the most common topics',
				'menu_name' => 'Topics',
			),
			'show_tagcloud' => false,
			'rewrite' => array(
				'slug' => 'topics',
				'hierarchical' => true,
			),
		);

		$post_types = array(
			'post',
		);
		register_taxonomy( 'nycns_topics', $post_types, $args );
		
		// Register the Media taxonomy
		$args = array(
			'label' => 'Media',
			'labels' => array(
				'name' => 'Media',
				'singular_name' => 'Media',
				'search_items' =>  'Search Media',
				'popular_items' => 'Popular Media',
				'all_items' => 'All Media',
				'parent_item' => 'Parent Media',
				'parent_item_colon' => 'Parent Media:',
				'edit_item' => 'Edit Media', 
				'update_item' => 'Update Media',
				'add_new_item' => 'Add New Media',
				'new_item_name' => 'New Media',
				'separate_items_with_commas' => 'Separate media with commas',
				'add_or_remove_items' => 'Add or remove media',
				'choose_from_most_used' => 'Choose from the most common media',
				'menu_name' => 'Media',
			),
			'show_tagcloud' => false,
			'hierarchical' => true,
			'rewrite' => array(
				'slug' => 'media',
				'hierarchical' => true,
			),
		);

		$post_types = array(
			'post',
		);
		register_taxonomy( 'nycns_media', $post_types, $args );
		
		// Register the Projects taxonomy
		$args = array(
			'label' => 'Projects',
			'labels' => array(
				'name' => 'Projects',
				'singular_name' => 'Project',
				'search_items' =>  'Search Projects',
				'popular_items' => 'Popular Projects',
				'all_items' => 'All Projects',
				'parent_item' => 'Parent Project',
				'parent_item_colon' => 'Parent Project:',
				'edit_item' => 'Edit Project', 
				'update_item' => 'Update Project',
				'add_new_item' => 'Add New Project',
				'new_item_name' => 'New Project',
				'separate_items_with_commas' => 'Separate projects with commas',
				'add_or_remove_items' => 'Add or remove projects',
				'choose_from_most_used' => 'Choose from the most common projects',
				'menu_name' => 'Projects',
			),
			'show_tagcloud' => false,
			'hierarchical' => true,
			'rewrite' => array(
				'slug' => 'projects',
				'hierarchical' => true,
			),
		);

		$post_types = array(
			'post',
		);
		register_taxonomy( 'nycns_projects', $post_types, $args );
			
	} // END create_taxonomies()
	
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
	
} // END class nycitynewsservice

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