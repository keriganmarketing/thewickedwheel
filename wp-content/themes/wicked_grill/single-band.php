<?php
/**
 * The template for displaying all single posts.
 *
 * @package Pineapple Willy\'s
 */

get_header(); ?>

	<div id="primary" class="content-area twelve columns">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
                <div class="band">
                	<div class="five columns">
                    <div class="band-image">
                            <div class="profile">
                            <img src="<?php the_field('band_image'); ?>" />
                            </div>
                        </div>
                         <div class="date-group">
                                  <div class="date">
                                    <?php $datetime = strtotime(get_field('event_start_date'));$datetime2 = strtotime(get_field('event_end_date'));?>
                                    <p><strong><?php echo date('l, M j',$datetime); ?></strong> - <strong><?php echo date('l, M j, Y',$datetime2); ?></strong></p>
                                 	<p><strong><?php echo date('g:i a',$datetime); ?> at <?php the_field('event_location'); ?></strong><br>
                                 </div>
                             <span><?php the_field('event_location'); ?></span>
                             <span><?php the_field('event_address'); ?></span>

                             <div class="social">
                                <h2><span><img src="<?php echo get_template_directory_uri(); ?>/images/plug.png" alt="Connect with the band" /></span>Connect With The Band</h2>
                                <ul>
                                    <?php if(get_field('facebook_url')):?>
                                    <li><a href="<?php the_field('facebook_url'); ?>" class="facebook" target="_blank">facebook.com</a></li>
                                    <?php endif ;?>
                                    <?php if(get_field('youtube_channel')):?>
                                    <li><a href="<?php the_field('youtube_channel'); ?>" class="youtube" target="_blank">youtube.com</a></li>
                                    <?php endif ;?>
                                    <?php if(get_field('band_website')):?>
                                    <li><a href="<?php the_field('band_website'); ?>" class="website" target="_blank">website</a></li>
                                    <?php endif ;?>
                                </ul>
                            </div>
                          
                        </div>	
                    </div>
                    
                    <div class="band-bio seven columns">
                    <h1><?php echo get_the_title(); ?><?php if(get_field('band_subtitle')):?> <br />- ( <span><?php the_field('band_subtitle'); ?></span> )<?php endif; ?></h1>
                    <?php if(get_field('featured_video')):?>
                        <div class="video">
                        <iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php the_field('featured_video'); ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <?php endif ;?>
                        <?php if(get_field('band_biography')):?>
                        <?php the_field('band_biography'); ?>
                        <?php endif ;?>
                    </div>
                    
                    <div class="band-related-shows">
                    
                    </div>
                    
                </div>
            </div>
        <?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
