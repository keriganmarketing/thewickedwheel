<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
                    	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        	<div class="entry-content">
                            	<?php while ( have_posts() ) : the_post(); ?>
                            	<header class="entry-header">
									<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                </header><!-- .entry-header -->
                            
                                <div class="entry-content">
									<?php the_content(); ?>
                                    <div class="events-big-list">
                                    <?php 						
                                        $request = array(
                                              'posts_per_page'   => -1,
                                              'offset'           => 0,
                                              'order'            => 'ASC',
                                              'orderby'   		 => 'meta_value',
                                              'meta_key' 		 => 'events_end_date',
                                              'post_type'        => 'events',
                                              'post_status'      => 'publish',
                                              'meta_query'	=> array(
                                                  'relation'		=> 'OR',
                                                  array(
                                                    'key'	  	=> 'events_end_date',
                                                    'value'	  	=> date('Ymd'),
                                                    'compare' 	=> '>=',
                                                  ), 
                                                  /*array(
                                                    'key'	  	=> 'events_end_date',
                                                    'value'	  	=> '',
                                                    'compare' 	=> '==',
                                                  ), */
                                                  /*array(
                                                    'key'	  	=> 'events_recur',
                                                    'value'	  	=> 'none',
                                                    'compare' 	=> '!=',
                                                  ), */
                                              ),
                                              
                                          );
                                          
                                          $eventlist = get_posts( $request );
                                          $u = 1;
                                          foreach($eventlist as $event){
                                              $id = $event->ID;
                                              $title = $event->post_title;
                                              $link = get_permalink($id);
                                              $start_date = get_post_meta( $id, 'events_start_date', true );
                                              $start_time = strtotime(get_post_meta( $id, 'events_start_time', true ));
                                              $end_date = get_post_meta( $id, 'events_end_date', true );
                                              $end_time = strtotime(get_post_meta( $id, 'events_end_time', true ));
                                              $recur = get_post_meta( $id, 'events_recur', true );
                                              $category = wp_get_post_terms( $id, 'event-type', array("fields" => "names"));
                                              $region = wp_get_post_terms( $id, 'event-region', array("fields" => "names"));
                                              $location = get_field('event_location', $id);
                                              $address = get_field('event_address', $id);
                                              $xorbia = get_field('xorbia_link', $id);
                                              $thumbnail = get_field('event_photo', $id);
                                              $specialinfo = '';
                                              $specialname = '';
                                               
                                                $special = get_field('special', $id);
                                                                                  
                                                if($bandinfo){
                                                    foreach($bandinfo as $band){
                                                        $bandid = $band->ID;
                                                        $bandname = get_the_title( $bandid );
                                                        $band_subtitle = get_field('band_subtitle', $bandid);
                                                        $band_image = get_field('band_image', $bandid);
                                                        $band_biography = get_field('band_biography', $bandid);
                                                        $featured_video = get_field('featured_video', $bandid);
                                                        $facebook_url = get_field('facebook_url', $bandid);
                                                        $youtube_channel = get_field('youtube_channel', $bandid);
                                                        $band_website = get_field('band_website', $bandid);
                                                    }
                                                }
                                                
                                              //shorten for pretty titles
                                              $maxchar = 60;
                                              if (strlen($title) > $maxchar) {
                                                    $title = substr($title, 0, strrpos(substr($title, 0, $maxchar), ' ')).'...';
                                              }
                                              
                                              if($end_date == ''){ $end_date = $start_date; } //no end date. assume it's the same as start
                                              
                                                if($start_date != $end_date){ 
                                                    if($recur == 'none'){
                                                          $fulldate = date('M j', strtotime($start_date)).' &ndash; '.date('M j', strtotime($end_date));
                                                          if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
                                                          if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
                                                         // $new_date = strtotime($start_date);
                                                         // $end_date = strtotime($end_date);
                                                      }
                                                      if($recur == 'weekly'){
                                                          $fulldate = date('l', strtotime($start_date)).'s';
                                                          if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
                                                          if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
                                                          //$new_date = advancedate($start_date,"+1 week");
                                                          //$end_date = advancedate($end_date,"+1 week");
                                                      }
                                                      if($recur == 'daily'){
                                                          $fulldate = 'Every day';
                                                          if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
                                                          if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
                                                          //$new_date = advancedate($start_date,"+1 day");
                                                         // $end_date = advancedate($end_date,"+1 day");
                                                      }
                                                      
                                                  }else{ //end date same as start date
                                                      
                                                      if($recur == 'none'){
                                                          $fulldate = date('M j', strtotime($start_date));
                                                          if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
                                                          if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
                                                          //$new_date = strtotime($start_date);
                                                          //$end_date = strtotime($end_date);
                                                      }
                                                      if($recur == 'weekly'){
                                                          $fulldate = date('l', strtotime($start_date)).'s';
                                                          if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
                                                          if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
                                                          //$new_date = advancedate($start_date,"+1 week");
                                                         // $end_date = advancedate($end_date,"+1 week");
                                                      }
                                                      if($recur == 'daily'){
                                                          $fulldate = 'Every day';
                                                          if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
                                                          if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
                                                          //$new_date = advancedate($start_date,"+1 day");
                                                          //$end_date = advancedate($end_date,"+1 day");
                                                              
                                                      }
                                                  }
                                                 
                                                ?>
                                                <div class="event-item">
                                                    <div class="event-thumbnail four columns">
                                                        <?php if($thumbnail) { ?>
                                                            <img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo $thumbnail['alt']; ?>" />
                                                        <? } ?>     
                                                    </div>
                                                    <div class="event-details eight columns" >
                                                        <h2 class="title"><?php echo $title ?></h2>
                                                        <?php if(!$special){?>
                                                        <div class="time"><div class="start-date twelve columns"><?php echo $fulldate; ?> @ <?php echo $location; ?></div></div>
                                                        <?php }else{ ?>
                                                        <div class="time">Available: <div class="start-date twelve columns"><?php echo $fulldate; ?></div></div>
                                                        <?php } ?>
                                                        <?php if(!$special){?>
                                                        <div class="address twelve columns"><?php echo strip_tags($address); ?></div>
                                                        <?php } ?>
                                                        <div class="buttons" >
                                                        <?php if($xorbia != ''){?>
                                                        <a href="<?php echo $xorbia; ?>" class="button" target="_blank">Buy Tickets</a>
                                                        <?php } ?>
                                                        <a href="<?php echo $link; ?>" class="button">More Info</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="separator twelve columns"><hr /></div>  
                                            <?php	
                                            $u++;
                                            
                                          }
                                        wp_reset_query(); ?>
                                	</div>        
                            	</div>
                                <?php endwhile; // end of the loop. ?>
            				</div>
        				</article>
        			</div>
            	</div>
            </div>                
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>