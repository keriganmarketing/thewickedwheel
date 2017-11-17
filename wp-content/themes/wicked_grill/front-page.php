<?php
/**
 * The template for The Front Page pages.
 *
 * @package Pineapple Willy\'s
 */

$special = get_field('speciallink');
$specialimage = get_field('special_image');
$link = get_permalink($special->ID);

get_header(); ?>

<div id="primary" class="twelve columns">
    <main id="main" class="site-main">
	<div id="section-one">
    	<div id="slideshow" >
            <div class="slider">
           		<div class="container">
                	<div id="slider-overlay" >
                        <div class="row">
                            <div class="specials">
                                <div class="special">
                                    <a href="<?php echo $link; ?>"><img src="<?php echo $specialimage['url']; ?>" alt="Panama City Beach Food Specials"/></a>
                                    <a href="<?php echo $link; ?>"><span>CLICK FOR INFO</span></a>
                                </div>
                                <div id="home-menu-button" >
                                    <a class="button beach-cam-icon" href="/events/" >More Specials</a> 
                                    <a class="button menu-icon" href="/menu/" >Full Menu</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="slider" class="flexslider">
                    <?php $tban=query_posts(array('post_type' => array('slideshow'))); ?>
                    <ul class="slides">
                        <?php  while ( have_posts() ) : the_post(); 
							$image = get_field('slide_image');
						?>
                        <li>	
                            <a href="<?php the_field('slide_link'); ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php the_field('slide_caption'); ?>" class="lazy" /></a>
                        </li>
                        <?php endwhile; wp_reset_query();?>
                    </ul>
                    
                </div>
            </div>
        </div>
	</div>
    <div id="tiremark2"></div>
    <div id="section-two">
        <div class="container">
        	<div class="row">
                
                <div class="upcoming-events six columns">
                	<h2><span><img src="<?php echo get_template_directory_uri(); ?>/images/calendarIconGray.png?new" alt="Panama City Beach restaurant wickedgrill Upcoming Events" /></span>Specials & Events<span class="view-more"><a href="/events/" class="more">view all events</a></span></h2>
                   <div class="row">
                    <div class="events-list">
						<?php 
						// args
						
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
	  					  echo '<ul class="events">';	
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
										  $new_date = strtotime($start_date);
										  $end_date = strtotime($end_date);
									  }
									  if($recur == 'weekly'){
										  $fulldate = date('l', strtotime($start_date)).'s';
										  if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
										  if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
										  if($start_date < date('Ymd')){
										  	$new_date = advancedate($start_date,"+1 week");
										  }else{
											$new_date = strtotime($start_date);
										  }
										  //$end_date = advancedate($end_date,"+1 week");
										  $end_date = $new_date;
									  }
									  if($recur == 'daily'){
										  $fulldate = 'Every day';
										  if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
										  if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
										  $new_date = strtotime($start_date);
											$end_date = strtotime($end_date); 
									  }
									  
								  }else{ //end date same as start date
									  
									  if($recur == 'none'){
										  $fulldate = date('M j', strtotime($start_date));
										  if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
										  if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
										  $new_date = strtotime($start_date);
										  $end_date = strtotime($end_date);
									  }
									  if($recur == 'weekly'){
										  $fulldate = date('l', strtotime($start_date)).'s';
										  if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
										  if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
										  if($new_date < date('Ymd')){
										  	$new_date = advancedate($start_date,"+1 week");
										  }else{
											$new_date = strtotime($start_date);
										  }
										  //$end_date = advancedate($end_date,"+1 week");
										  $end_date = $new_date;
									  }
									  if($recur == 'daily'){
										  $fulldate = 'Every day';
										  if($start_time != ''){ $fulldate .= ', '.date('g:i a', $start_time); }
										  if($end_time != '' && $end_time != $start_time){ $fulldate .= ' &ndash; '.date('g:i a', $end_time); }
										 
											$new_date = strtotime($start_date);
											$end_date = strtotime($end_date);  
									  }
								  }
								 
								?>
                                <li>
								<div class="date">
                                    <div class="date-one">
                                        <div class="day"><?php echo date('j', $new_date); ?></div>
                                        <div class="month"><?php echo date('M', $new_date); ?></div>
                                    </div>
                                    <?php if($new_date != $end_date){ ?>
                                    <div class="date-two">-<br /><br /></div>
                                    <div class="date-three">
                                        <div class="day"><?php echo date('j', $end_date); ?></div>
                                        <div class="month"><?php echo date('M', $end_date); ?></div>
                                    </div>
                                    <?php } ?>
								</div>
								<div class="event">
									<span class="title"><?php echo $title ?></span>
									<div class="time">
                                    	<div class="start-date twelve columns"><?php echo $fulldate; ?> @ <?php echo $location; ?></div>
                                     </div>
                                 	<div class="address twelve columns"><?php echo strip_tags($address); ?></div>
								</div>
                                <div class="btn">
								<a href="<?php echo $link; ?>" class="arrow"><?php echo $title; ?></a>
                                </div>
							</li> 
								  
							<?php	
							$u++;
							
						  }
						  echo '</ul>';	
							wp_reset_query(); ?>
                   		</div>
                   	</div>
                   	<div class="row">
                    <div class="newsletter">
                    	<a href="/signup/" >Sign up for news, special offers and coupons</a>
                    </div>
                    </div>
                </div>
                <div class="tripadvisor six columns">
                	<h2><span><img src="<?php echo get_template_directory_uri(); ?>/images/commentIconGray.png?new" alt="wickedgrill Tripadvisor Feed" /></span>What Others Say</h2>
                	<div class="review">
                    <div id="TA_selfserveprop132" class="TA_selfserveprop">
                    <ul id="pTXcprf4" class="TA_links IdEz6VdittM">
                    <li id="AZnQuc" class="09jSKDWS75DT">
                    <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                    </li>
                    </ul>
                    </div>
                    <script src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=132&amp;locationId=2701149&amp;lang=en_US&amp;rating=true&amp;nreviews=3&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=true&amp;border=true&amp;display_version=2"></script>
                    </div>
                </div>
             </div> 
         </div>
    </div>
	<div id="section-three">
         <div class="container">  
        	<div class="row">
            	<div id="home-content" class="twelve columns" >
                    <?php 
                        $page_id = 377; 
                        
                        $page_data = get_page( $page_id );
                       
                        echo apply_filters('the_content', $page_data->post_content); 
                    ?>
            	</div>
            </div>
 		 </div>
    </div> 
    <div id="tiremark3"></div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>
