<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pineapple Willy\'s
 */

get_header(); ?>

	<div id="primary" class="content-area twelve columns">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					print '<h1 class="page-title">All events</h1>';
				?>
			</header><!-- .page-header -->
			<div id="tabs">
            	<div class="row">
                    <ul class="archive-post five columns">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <li>
                        <a href="#tabs-<?php the_ID(); ?>">			
                            <div class="row">
                                <div class="event">
                                    <div class="hide-lg event-image twelve columns">
                                    <img src="<?php the_field('event_image'); ?>" />
                                    </div>
                                    <div class="event-bio twelve columns">
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <div class="date">
                                         <span><?php the_field('event_start_date'); ?></span>
                                    </div>                                  
                                  </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>
                    </ul>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div id="tabs-<?php the_ID(); ?>" class="hide-sm archive-single seven columns">
                    <div class="row">
                        <div class="event">
                        	 <div class="date six columns">
                                 <h3><?php echo get_the_title(); ?></h3>
                                 <div class="date"><?php the_field('event_start_date'); ?></div>
                                 <div class="tickets">
                                 	<a href="<?php the_field('xorbia_link'); ?>"  target="_blank"><span class="ticket"><img src="<?php echo get_template_directory_uri(); ?>/images/ticket.png" alt="Purchase Tickets" /></span><span class="text">Purchase Tickets</span></a>
                                 </div>
                            </div>
                            <div class="event-image six columns">
                                <img src="<?php the_field('event_image'); ?>" />
                            </div>
                            
                            <div class="event-bio twelve columns">
                           		<?php the_field('event_biography'); ?>
                         	</div>
                            
                            <div class="event-related-shows">
                            
                            </div>
                            
                        </div>
                    </div>
                    </div>
        
                    <?php endwhile; ?>
            	</div>
			</div>

		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
