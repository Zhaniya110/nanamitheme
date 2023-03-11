<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12 col-md-8 <?php echo esc_attr(unite_get_option( 'site_layout' )); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
      


			<?php get_template_part( 'content', 'single' ); ?>
			<?php 
    // Display country
    $country = get_the_terms(get_the_ID(), 'country');
    if ($country) {
        echo '<p><strong>Country: </strong>';
        foreach ($country as $c) {
            echo $c->name . ', ';
        }
        echo '</p>';
    }

    // Display genre
    $genre = get_the_terms(get_the_ID(), 'genre');
    if ($genre) {
        echo '<p><strong>Genre: </strong>';
        foreach ($genre as $g) {
            echo $g->name . ', ';
        }
        echo '</p>';
    }

	$year = get_the_terms(get_the_ID(), 'year');
    if ($year) {
        echo '<p><strong>Year: </strong>';
        foreach ($year as $y) {
            echo $y->name ;
        }
        echo '</p>';
    }


	$actor = get_the_terms(get_the_ID(), 'actor');
    if ($year) {
        echo '<p><strong>Actors: </strong>';
        foreach ($actor as $a) {
            echo $a->name . ", " ;
        }
        echo '</p>';
    }

?>
			<?php unite_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>