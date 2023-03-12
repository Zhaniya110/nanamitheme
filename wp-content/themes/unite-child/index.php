<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package unite
 */
?>


<?php
get_header(); ?>

<?php
function custom_theme_styles() {
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'custom_theme_styles' );

$args = array(
    'post_type' => 'movies',
    'posts_per_page' => -1 // Display all posts
);

$movies_query = new WP_Query( $args );

if ( $movies_query->have_posts() ) {
    while ( $movies_query->have_posts() ) {
        $movies_query->the_post();
        // Display post content here using WordPress template tags
        the_title();
        the_content();
        the_post_thumbnail();
    }
    wp_reset_postdata();
} else {
    // No posts found
    echo 'No movies found';
}


?>
<?php
get_footer(); ?>