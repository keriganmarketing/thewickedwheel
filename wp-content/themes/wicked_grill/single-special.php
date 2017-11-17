<?php
/**
 * The template for displaying all single special posts.
 *
 * @package wickedgrill
 */

get_header(); ?>

<div id="primary" class="content-area content-areaten columns">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<h1><?php the_field('custom_title'); ?></h1>

			<img src="<?php the_field('hero_image'); ?>" />

			<p><?php the_content(); ?></p>

		<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>