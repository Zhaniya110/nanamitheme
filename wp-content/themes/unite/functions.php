<?php
/**
 * _s functions and definitions
 *
 * @package unite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730; /* pixels */
}

/**
 * Set the content width for full width pages with no sidebar.
 */
function unite_content_width() {
  if ( is_page_template( 'page-fullwidth.php' ) || is_page_template( 'front-page.php' ) ) {
    global $content_width;
    $content_width = 1110; /* pixels */
  }
}
add_action( 'template_redirect', 'unite_content_width' );


if ( ! function_exists( 'unite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function unite_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'unite' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'unite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'unite-featured', 730, 410, true );
	add_image_size( 'unite-tab-small', 60, 60 , true); // Small Thumbnail

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'unite' ),
		'footer-links' => __( 'Footer Links', 'unite' ) // secondary nav in footer
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'unite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add WooCommerce support
	add_theme_support( 'woocommerce' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

}
endif; // unite_setup
add_action( 'after_setup_theme', 'unite_setup' );


if ( ! function_exists( 'unite_widgets_init' ) ) :
/**
 * Register widgetized area and update sidebar with default widgets.
 */
// Register Custom Post Type Movie
function create_movie_cpt() {

	$labels = array(
		'name' => _x( 'Movies', 'Post Type General Name', 'nanami' ),
		'singular_name' => _x( 'Movie', 'Post Type Singular Name', 'nanami' ),
		'menu_name' => _x( 'Movies', 'Admin Menu text', 'nanami' ),
		'name_admin_bar' => _x( 'Movie', 'Add New on Toolbar', 'nanami' ),
		'archives' => __( 'Movie Archives', 'nanami' ),
		'attributes' => __( 'Movie Attributes', 'nanami' ),
		'parent_item_colon' => __( 'Parent Movie:', 'nanami' ),
		'all_items' => __( 'All Movies', 'nanami' ),
		'add_new_item' => __( 'Add New Movie', 'nanami' ),
		'add_new' => __( 'Add New', 'nanami' ),
		'new_item' => __( 'New Movie', 'nanami' ),
		'edit_item' => __( 'Edit Movie', 'nanami' ),
		'update_item' => __( 'Update Movie', 'nanami' ),
		'view_item' => __( 'View Movie', 'nanami' ),
		'view_items' => __( 'View Movies', 'nanami' ),
		'search_items' => __( 'Search Movie', 'nanami' ),
		'not_found' => __( 'Not found', 'nanami' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'nanami' ),
		'featured_image' => __( 'Featured Image', 'nanami' ),
		'set_featured_image' => __( 'Set featured image', 'nanami' ),
		'remove_featured_image' => __( 'Remove featured image', 'nanami' ),
		'use_featured_image' => __( 'Use as featured image', 'nanami' ),
		'insert_into_item' => __( 'Insert into Movie', 'nanami' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'nanami' ),
		'items_list' => __( 'Movies list', 'nanami' ),
		'items_list_navigation' => __( 'Movies list navigation', 'nanami' ),
		'filter_items_list' => __( 'Filter Movies list', 'nanami' ),
	);
	$args = array(
		'label' => __( 'Movie', 'nanami' ),
		'description' => __( 'Смотреть Фильмы', 'nanami' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-video',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'custom-fields'),
		'taxonomies' => array('actor', 'year', 'genre', 'country'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'movies', $args );

}
add_action( 'init', 'create_movie_cpt', 0 );
function unite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'unite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar(array(
		'id'            => 'home1',
		'name'          => esc_html__( 'Homepage Widget 1', 'unite' ),
		'description'   => esc_html__('Used only on the homepage page template.','unite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ));

    register_sidebar(array(
		'id'            => 'home2',
		'name'          => esc_html__( 'Homepage Widget 2', 'unite' ),
		'description'   => esc_html__('Used only on the homepage page template.','unite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ));

    register_sidebar(array(
		'id'            => 'home3',
		'name'          => esc_html__( 'Homepage Widget 3', 'unite' ),
		'description'   => esc_html__('Used only on the homepage page template.','unite'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
    ));

    register_widget( 'unite_popular_posts_widget' );
    register_widget( 'unite_social_widget' );
}
endif;
add_action( 'widgets_init', 'unite_widgets_init' );

/**
 * Include widgets for Unite theme
 */
include(get_template_directory() . "/inc/widgets/popular-posts-widget.php");
include(get_template_directory() . "/inc/widgets/widget-social.php");

/**
 * Include Metabox for Unite theme
 */
include(get_template_directory() . "/inc/metaboxes.php");



if ( ! function_exists( 'unite_scripts' ) ) :
/**
 * Enqueue scripts and styles.
 */
function unite_scripts() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/inc/css/bootstrap.min.css' );

	wp_enqueue_style( 'unite-icons', get_template_directory_uri().'/inc/css/font-awesome.min.css' );

	wp_enqueue_style( 'unite-style', get_stylesheet_uri() );

	wp_enqueue_script('bootstrap', get_template_directory_uri().'/inc/js/bootstrap.min.js', array('jquery') );

	wp_enqueue_script( 'unite-functions', get_template_directory_uri() . '/inc/js/main.min.js', array('jquery') );

    wp_enqueue_script( 'html5', get_template_directory_uri() . '/inc/js/html5shiv.min.js' , array());
    wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'respond', get_template_directory_uri() . '/inc/js/respond.min.js' , array());
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
endif;
add_action( 'wp_enqueue_scripts', 'unite_scripts' );

require get_template_directory() . '/inc/class-unite-helper.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load custom nav walker
 */

require get_template_directory() . '/inc/navwalker.php';

/**
 * Load social nav
 */
require get_template_directory() . '/inc/socialnav.php';

/**
 * Helper function to return the theme option value.
 * If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 * Not in a class to support backwards compatibility in themes.
 */
if ( ! function_exists( 'unite_get_option' ) ) :
function unite_get_option( $name, $default = false ) {

  $option_name = '';
  // Get option settings from database
  $options = get_option( 'unite' );

  // Return specific option
  if ( isset( $options[$name] ) ) {
    return $options[$name];
  }

  return $default;
}
endif;