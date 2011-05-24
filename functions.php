<?php

define( 'NYCITYNEWSSERVICE_VERSION', '1.1.1' );
	
class nycitynewsservice {
	
	var $options_group = 'nycns_';
	var $options_group_name = 'nycns_options';
	var $settings_page = 'nycns_settings';
	var $options_defaults = array(
		'housing2011_lead_story' => 0,
		'housing2011_lead_story_description' => '',
		'housing2011_soundslides_url' => '',
	);
	
	/**
	 * __construct()
	 */
	function __construct() {
		
		$this->options = array_merge( $this->options_defaults, get_option( $this->options_group_name ) );
		
		add_action( 'init', array(&$this, 'init') );
		
		// Create our custom taxonomies
		add_action( 'init', array( &$this, 'create_taxonomies' ) );
		
		add_action( 'admin_init', array( &$this, 'admin_init' ) );		
		
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
		add_action( 'wp_print_styles', array( &$this, 'enqueue_public_stylesheets' ) );
		add_action( 'wp_print_scripts', array( &$this, 'enqueue_public_scripts' ) );
		
		if ( is_admin() ) {
			add_action( 'admin_menu', array(&$this, 'add_admin_menu_items') );
		}		
		
	} // END init()
	
	/**
	 * admin_init()
	 */
	function admin_init() {

		$this->register_settings();

	} // END admin_init()
	
	/**
	 * add_admin_menu_items()
	 * Any admin menu items we need
	 */
	function add_admin_menu_items() {

		add_submenu_page( 'themes.php', 'NY City News Service Theme Options', 'Theme Options', 'manage_options', 'nycns_options', array( &$this, 'options_page' ) );			

	} // END add_admin_menu_items()		
	
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
	 * register_settings()
	 */
	function register_settings() {

		register_setting( $this->options_group, $this->options_group_name, array( &$this, 'settings_validate' ) );

		// Project settings: Housing 2011
		add_settings_section( 'nycns_housing2011', 'Project: Housing 2011', array(&$this, 'settings_housing2011_section'), $this->settings_page );
		add_settings_field( 'housing2011_lead_story', 'Lead story for the project', array(&$this, 'settings_housing2011_lead_story_option'), $this->settings_page, 'nycns_housing2011' );
		add_settings_field( 'housing2011_lead_story_description', 'Extended lead story intro', array(&$this, 'settings_housing2011_lead_story_description_option'), $this->settings_page, 'nycns_housing2011' );
		add_settings_field( 'housing2011_soundslides_url', 'Featured Soundslides URL', array(&$this, 'settings_housing2011_soundslides_url_option'), $this->settings_page, 'nycns_housing2011' );				

	} // END register_settings()
	
	/**
	 * settings_housing2011_lead_story_option()
	 * Choose the lead story for the Housing 2011 project
	 */
	function settings_housing2011_lead_story_option() {
		
		$options = $this->options;
		$args = array(		
			'tax_query' => array(
				array(
					'taxonomy' => 'nycns_projects',
					'field' => 'slug',
					'terms' => '2011-housing-project',
				)
			),
			'showposts' => -1,
		);

		$project_posts = new WP_Query( $args );
		echo '<select id="housing2011_lead_story" name="' . $this->options_group_name . '[housing2011_lead_story]">';
		echo '<option value="0">-- No lead story --</option>';
		if ( $project_posts->have_posts() ) {
			while ( $project_posts->have_posts() ) {
				$project_posts->the_post();
				echo '<option value="' . get_the_id() . '"';
				if ( get_the_id() == $options['housing2011_lead_story'] ) {
					echo ' selected="selected"';
				}
				echo '>' . get_the_title() . '</option>';
			}
		}
		echo '</select>';
		echo '<p class="description">Choose the lead story for the project to have it show at the top.</p>';
		
	} // END settings_housing2011_lead_story_option()
	
	/**
	 * settings_housing2011_lead_story_description_option()
	 */
	function settings_housing2011_lead_story_description_option() {
		
		$options = $this->options;
		$allowed_tags = htmlentities( '<b><strong><em><i><span><a><br><p>' );

		echo '<textarea id="housing2011_lead_story_description" name="' . $this->options_group_name . '[housing2011_lead_story_description]" cols="80" rows="6">';
		echo $options['housing2011_lead_story_description'];
		echo '</textarea>';
		echo '<p class="description">The following tags are permitted: ' . $allowed_tags . '</p>';
		
	} // END settings_housing2011_lead_story_description_option()
	
	/**
	 * settings_housing2011_soundslides_url_option()
	 */
	function settings_housing2011_soundslides_url_option() {
		
		$options = $this->options;

		echo '<input id="housing2011_soundslides_url" name="' . $this->options_group_name . '[housing2011_soundslides_url]" value="';
		echo $options['housing2011_soundslides_url'];
		echo '" size="100" />';
		echo '<p class="description">(Optional) Copy and paste your Soundslides URL</p>';
		
	} // END settings_housing2011_soundslides_url_option()	
	
	/**
	 * settings_validate()
	 * Validation and sanitization on the settings field
	 */
	function settings_validate( $input ) {
		
		$allowed_tags = htmlentities( '<b><strong><em><i><span><a><br><p>' );

		$input['housing2011_lead_story'] = (int)$input['housing2011_lead_story'];	
		$input['housing2011_lead_story_description'] = strip_tags( $input['housing2011_lead_story_description'], $allowed_tags );
		$input['housing2011_soundslides_url'] = strip_tags( $input['housing2011_soundslides_url'] );

		return $input;

	} // END settings_validate()
	
	/**
	 * Options page for the theme
	 */
	function options_page() {
		?>                                   
		<div class="wrap">
			<div class="icon32" id="icon-options-general"><br/></div>

			<h2>NY City News Service theme options</h2>

			<form action="options.php" method="post">

				<?php settings_fields( $this->options_group ); ?>
				<?php do_settings_sections( $this->settings_page ); ?>

				<p class="submit"><input name="submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>

			</form>
		</div>
		<?php
	} // END options_page()	
	
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

/**
 * nycns_get_theme_options()
 * Get the options for the theme
 */
function nycns_get_theme_options() {
	global $nycitynewsservice;
	
	return $nycitynewsservice->options;
	
} // END nycns_get_theme_options()


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