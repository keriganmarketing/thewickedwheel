<?php
/**
 * wickedgrill functions and definitions
 *
 * @package wickedgrill
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wicked_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wicked_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pineapple Willy\'s, use a find and replace
	 * to change 'wicked' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wicked', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wicked' ),
		'footer' => __( 'Footer Menu', 'wicked' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wicked_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	register_post_type( 'special', array(
		'labels'             => array(
			'name' 		         => _x( 'Special', 'post type general name', 'wicked' ),
			'singular_name'      => _x( 'Special', 'post type singular name', 'wicked' ),
			'menu_name'          => _x( 'Specials', 'admin menu', 'wicked' ),
			'name_admin_bar'     => _x( 'Special', 'add new on admin bar', 'wicked' ),
			'add_new'            => _x( 'Add New', 'special', 'wicked' ),
			'add_new_item'       => __( 'Add New Special', 'wicked' ),
			'new_item'           => __( 'New Special', 'wicked' ),
			'edit_item'          => __( 'Edit Specials', 'wicked' ),
			'view_item'          => __( 'View Specials', 'wicked' ),
			'all_items'          => __( 'All Specials', 'wicked' ),
			'search_items'       => __( 'Search Specials', 'wicked' ),
			'parent_item_colon'  => __( 'Parent Special:', 'wicked' ),
			'not_found'          => __( 'No specials found.', 'wicked' ),
			'not_found_in_trash' => __( 'No specials found in Trash.', 'wicked' )
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 
				'slug' 			=> 'special',   		//string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
				'with_front' 	=> false, 				//bool Should the permalink structure be prepended with the front base. <br>
														//(example: if your permalink structure is /blog/, then your links will be: false-> /news/, true->/blog/news/). Defaults to true
				'feeds' 		=> true, 				//bool Should a feed permalink structure be built for this post type. Defaults to has_archive value
				'pages' 		=> false				//bool Should the permalink structure provide for pagination. Defaults to true
			),
		'menu_icon'          => 'dashicons-awards',
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'revisions', 'thumbnail', 'custom-fields' )
	));
	
	register_post_type( 'entree', array(
		'labels'             => array(
			'name' 		         => _x( 'Entree', 'post type general name', 'wicked' ),
			'singular_name'      => _x( 'Entree', 'post type singular name', 'wicked' ),
			'menu_name'          => _x( 'Menu', 'admin menu', 'wicked' ),
			'name_admin_bar'     => _x( 'Entree', 'add new on admin bar', 'wicked' ),
			'add_new'            => _x( 'Add New', 'entree', 'wicked' ),
			'add_new_item'       => __( 'Add New Entree', 'wicked' ),
			'new_item'           => __( 'New Entree', 'wicked' ),
			'edit_item'          => __( 'Edit Menu', 'wicked' ),
			'view_item'          => __( 'View Menu', 'wicked' ),
			'all_items'          => __( 'All Entrees', 'wicked' ),
			'search_items'       => __( 'Search Menu', 'wicked' ),
			'parent_item_colon'  => __( 'Parent Entree:', 'wicked' ),
			'not_found'          => __( 'No entrees found.', 'wicked' ),
			'not_found_in_trash' => __( 'No entrees found in Trash.', 'wicked' )
		),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 
				'slug' 			=> 'entrees',   		//string Customize the permalink structure slug. Defaults to the $post_type value. Should be translatable.
				'with_front' 	=> false, 				//bool Should the permalink structure be prepended with the front base. <br>
														//(example: if your permalink structure is /blog/, then your links will be: false-> /news/, true->/blog/news/). Defaults to true
				'feeds' 		=> true, 				//bool Should a feed permalink structure be built for this post type. Defaults to has_archive value
				'pages' 		=> false				//bool Should the permalink structure provide for pagination. Defaults to true
			),
		'menu_icon'          => 'dashicons-carrot',
		'capability_type'    => 'page',
		'has_archive'        => false,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'page-attributes', 'revisions', 'thumbnail', 'custom-fields' )
	));
	register_taxonomy( 'entree-type', 'entree', 
	  array(
		'hierarchical'      => true,
		'labels'            => array(
			'name'                       => _x( 'Menu Categories', 'taxonomy general name' ),
			'singular_name'              => _x( 'Menu Category', 'taxonomy singular name' ),
			'search_items'               => __( 'Search Menu Categories' ),
			'popular_items'              => __( 'Popular Menu Categories' ),
			'all_items'                  => __( 'All Menu Categories' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Menu Category' ),
			'update_item'                => __( 'Update Menu Category' ),
			'add_new_item'               => __( 'Add New Menu Category' ),
			'new_item_name'              => __( 'New Menu Category Name' ),
			'separate_items_with_commas' => __( 'Separate categories with commas' ),
			'add_or_remove_items'        => __( 'Add or remove categories' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories' ),
			'not_found'                  => __( 'No categories found.' ),
			'menu_name'                  => __( 'Menu Categories' ),
		),
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'menu-categories' ),
	  ) 
	);
	add_action('init', 'slideshow_register_post_type');
 
	function slideshow_register_post_type() {
		register_post_type('slideshow', array(
		'labels' => array(
		'name' => 'Slideshows',
		'singular_name' => 'Slideshow',
		'add_new' => 'Add new slide',
		'edit_item' => 'Edit slide',
		'new_item' => 'New slide',
		'view_item' => 'View slide',
		'search_items' => 'Search slides',
		'not_found' => 'No slides found',
		'not_found_in_trash' => 'No slides found in Trash'
		),
		'public' => true,
		'menu_icon'          => 'dashicons-images-alt2',
		'supports' => array(
		'title',
		'excerpt'
		),
		'taxonomies' => array('category', 'post_tag') // this is IMPORTANT
		));
	}
	
	add_action('init', 'slideshow_add_default_boxes');
		function slideshow_add_default_boxes() {
		register_taxonomy_for_object_type('category', 'slideshow');
		register_taxonomy_for_object_type('post_tag', 'slideshow');
	}
	
}
endif; // wicked_setup
add_action( 'after_setup_theme', 'wicked_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wicked_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wicked' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s two columns">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wicked_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function wicked_scripts() {

    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
	
	//wp_enqueue_style( 'wicked-respond', get_template_directory_uri().'/css/skeleton.css' );
	//wp_enqueue_style( 'wicked-flexstyle', get_template_directory_uri().'/js/flexslider/flexslider.css' );
	//wp_enqueue_style( 'wicked-jqueryui', '//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
	//wp_enqueue_style( 'wicked-fonts', '//fonts.googleapis.com/css?family=Slackey' );
	
	wp_enqueue_style( 'wicked-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'wicked-theme', get_template_directory_uri().'/css/theme.css' );

	//wp_enqueue_script( 'wicked-jquery', '//code.jquery.com/jquery-1.11.2.min.js', array(), true );
	//wp_enqueue_script( 'wicked-jqueryui', '//code.jquery.com/ui/1.11.3/jquery-ui.min.js', array(), true );
	//wp_enqueue_script( 'wicked-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	//wp_enqueue_script( 'wicked-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	//wp_enqueue_script( 'wicked-slideshow', get_template_directory_uri() .'/js/flexslider/jquery.flexslider-min.js', array(),true );
	//wp_enqueue_script( 'wicked-instagram', get_template_directory_uri() . '/js/instafeed.min.js', array(),true );
	//wp_enqueue_script( 'wicked-loupe', get_template_directory_uri() . '/js/jquery.mlens-1.5.min.js', array(),true );
	
	wp_enqueue_script( 'wicked-scripts', get_template_directory_uri() . '/js/scripts.js', array(),true );
	
	wp_enqueue_script('images-loaded', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.0/imagesloaded.min.js', array('wicked-scripts'), '', true);
	wp_enqueue_script('masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.1.0/masonry.pkgd.min.js', array('wicked-scripts'), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wicked_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');

