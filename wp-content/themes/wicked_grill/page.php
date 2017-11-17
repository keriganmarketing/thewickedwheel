<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package wickedgrill
 */

get_header(); ?>
<div id="section-three">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
            	<div class="row">
                    <div class="support-content">
                    	<?php while ( have_posts() ) : the_post(); ?>
                        <header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    	<?php endwhile; // end of the loop. ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
