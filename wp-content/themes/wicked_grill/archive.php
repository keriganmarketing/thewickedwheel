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
        
        <?php 
			// args
		$today = time();
		$args = array( 
		'post_type' => array('band','event','special'),
		'meta_key'	=> 'event_start_date',
		'orderby' => 'meta_value_num',
		'order' => 'ASC',
		'posts_per_page'=> 10,
		'meta_query' => array (
			array( 
			'key' => 'event_start_date', 
			'compare' => '>', 
			'value' => $today ),
			array( 'key' => 'event_end_date', 'compare' => '>', 'value' => $today )
                 ));
		$the_query = new WP_Query( $args );
			
			// The Loop
			?>
			<?php if( $the_query->have_posts() ): ?>

			<header class="page-header">
				<?php
					print '<h1 class="page-title">Willy\'s LIVE</h1>';
				?>
			</header><!-- .page-header -->
			<div id="tabs">
            	<div class="row">
                    <ul class="band-list archive-post five columns">
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <?php $datetime = strtotime(get_field('event_start_date')); ?>
                     <li>
                        <a class="hide-md" href="#tabs-<?php the_ID(); ?>">			
                            <div class="row">
                                <div class="band">
                                    <div class="band-bio twelve columns">
                                    <h2><?php echo get_the_title(); ?></h2>
                                    <div class="date">
                                         <div class="location"><p><span><?php echo date('l, M j, Y',$datetime); ?> at <?php echo date('g:i a',$datetime); ?></span>
                                         <span class="address"><?php the_field('event_location'); ?></span></p></div>
                                    </div>                                  
                                  </div>
                                </div>
                            </div>
                        </a>
                        <div class="hide-lg">			
                            <div class="row">
                                <div class="band">
                                    <div class="band-image sm-band-image four columns">
                                    <a href="<?php the_permalink(); ?> ">
                                    	<img src="<?php the_field('band_image'); ?>" />
                                     </a>
                                    </div>
                                    <div class="hide-lg band-bio eight columns">
                                        <h2><?php echo get_the_title(); ?></h2>
                                        <div class="date">
                                             <span><?php echo date('l, M j, Y',$datetime); ?> at <?php echo date('g:i a',$datetime); ?></span>
                                             <span><?php the_field('event_location'); ?></span>
                                        </div>  
                                   
                                  	</div>
                                </div>
                            </div>
                        </div>
                        
                    </li>
                    <?php endwhile; ?>
                    </ul>
					<?php wp_reset_query(); ?>
                   <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                   <?php $datetime = strtotime(get_field('event_start_date')); ?>
                     <div id="tabs-<?php the_ID(); ?>" class="hide-sm hide-md archive-single seven columns">
                    <div class="row">
                        <div class="band">
                        	 <div class="show-date six columns">
                                 <h3><?php echo get_the_title(); ?></h3>
 
                                 <div class="location">
                                 	<p><strong><?php echo date('l, M j, Y',$datetime); ?> at <?php echo date('g:i a',$datetime); ?></strong></p>
                                 	<p><strong><?php the_field('event_location'); ?></strong><br>
                                 	<span class="address"><?php the_field('event_address'); ?></span></p>
                                 </div>
                                 <?php if(get_field('xorbia_link')):?>
                                 <div class="tickets">
                                    <a href="<?php the_field('xorbia_link'); ?>"  target="_blank"><span class="ticket"><img src="<?php echo get_template_directory_uri(); ?>/images/ticket.png" alt="Purchase Tickets" /></span><span class="text">Purchase Tickets</span></a>
                                 </div>
                                 <?php else:?>
                                   <div class="social">
                                        <h2><?php if(get_field('facebook_url')):?>
                                            <a href="<?php the_field('facebook_url'); ?>" class="facebook" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-band.png" alt="<?php echo get_the_title(); ?>" /></a>
                                        <?php endif ;?>
                                        <?php if(get_field('youtube_channel')):?>
                                            <a href="<?php the_field('youtube_channel'); ?>" class="youtube" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube-band.png" alt="<?php echo get_the_title(); ?>" /></a>
                                        <?php endif ;?>
                                        <?php if(get_field('band_website')):?>
                                            <a href="<?php the_field('band_website'); ?>" class="website" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/website-band.png" alt="<?php echo get_the_title(); ?>" /></a>
                                        <?php endif ;?>Get Connected:</h2>
                                        
                                       
                                </div>
                               <?php endif ;?>  
                                                           
                            </div>
						
                            <div class="band-image six columns">
                            	<div class="profile">
                                <img src="<?php the_field('band_image'); ?>" />
                                </div>
                            </div>
                            <?php if(get_field('xorbia_link')):?>
                             <div class="social six columns">
                                        <h2><?php if(get_field('facebook_url')):?>
                                            <a href="<?php the_field('facebook_url'); ?>" class="facebook" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook-band.png" /></a>
                                        <?php endif ;?>
                                        <?php if(get_field('youtube_channel')):?>
                                            <a href="<?php the_field('youtube_channel'); ?>" class="youtube" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube-band.png" /></a>
                                        <?php endif ;?>
                                        <?php if(get_field('band_website')):?>
                                            <a href="<?php the_field('band_website'); ?>" class="website" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/website-band.png" /></a>
                                        <?php endif ;?>Get Connected:</h2>
                                        
                                       
                                </div>
                               <?php endif ;?>  
                                
                            <div class="band-bio twelve columns">
                            	<div class="video">
                                	<iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php the_field('featured_video'); ?>" frameborder="0" allowfullscreen></iframe>
                                </div>
							<?php if(get_field('featured_video')):?>
                            	
                                <?php endif ;?>
                                <?php if(get_field('band_biography')):?>
                           		<?php the_field('band_biography'); ?>
                                <?php endif ;?>
                                
                                
                         	</div>                           
                        </div>
                    </div>
                    </div>
                    <?php endwhile; ?>
					<?php wp_reset_query(); ?>
                  </div>
			</div>

		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>