<?php
/**
 * The template for displaying all single event posts.
 *
 * @package wickedgrill
 */
 
$event_location = get_field('event_location');
$event_address = get_field('event_address');
$bandinfo = get_field('band');
$xorbia_link = get_field('xorbia_link');

$start_date = get_post_meta( $post->ID, 'events_start_date', true );
$start_time = strtotime(get_post_meta( $post->ID, 'events_start_time', true ));
$end_date = get_post_meta( $post->ID, 'events_end_date', true );
$end_time = strtotime(get_post_meta( $post->ID, 'events_end_time', true ));
$recur = get_post_meta( $post->ID, 'events_recur', true );

if($recur == 'weekly'){
	$fulldate = date('l', strtotime($start_date)).'s, ';
	$start_date = advancedate($start_date,"+1 week");
	$end_date = strtotime($end_date);
}elseif($recur == 'daily'){
	$fulldate = 'Every day';
	$start_date = advancedate($start_date,"+1 day");
    $end_date = strtotime($end_date);
}else{
	$start_date = strtotime($start_date);
	$end_date = strtotime($end_date);
}	

$special = get_field('special');
if($special){
	foreach($special as $speciali){
		$specialid = $speciali->ID;
		$specialname = get_the_title( $speciali );
	}
}					  

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
                                
                                
                                
                                <div id="event-sidebar" class="five columns">
                                
                                    <div class="event-date">
										<?php if(!$special){ ?>
                                        <h2><span><img src="<?php echo get_template_directory_uri(); ?>/images/calendarIconGray.png?new" alt="Panama City Beach restaurant Wicked Wheel Upcoming Events" /></span> 
                                        Event Info</h2>
										<?php }else{ ?>
                                        <h2><?php echo $specialname; ?></h2>
										<?php } ?>
                                        <p><?php if($special){ ?>Available: <?php } ?><strong><?php echo $fulldate; if($recur != 'daily'){ echo date('M j', $start_date); }  ?></strong><?php if($start_date != $end_date){ ?> - <strong><?php echo date('M j, Y',$end_date); ?></strong><?php } ?><br>
                                        <?php 
										if($start_time != '') {
                                        	echo date('g:i a', $start_time); 
										} 
										if($start_time != $end_time){ 
											if($end_time!=''){ 
												echo ' - '. date('g:i a', $end_time);
											}
										} 
										?></p>
                                        
                                        <?php if(!$special){ ?>
                                        <p><?php echo $event_location; ?><br>
                                        <?php echo $event_address; ?></p>
                                        <?php } ?>
                                    </div>
                        
                                    
                                    <?php if($xorbia_link!='') { ?>
                                        <a class="button" href="<?php echo $xorbia_link; ?>" >Purchase Tickets</a>
                                    <?php } ?>
                                    
                                </div>
                                <div class="seven columns">
                                	<?php if($special){
										$special_data = get_page( $specialid );
                        				echo apply_filters('the_content', $special_data->post_content); 	
									}else{
										the_content(); 
									}?>
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
