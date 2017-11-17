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
                    <?php
                                if ( isset($_GET['lists']) && isset($_GET['codes']) ){
                                 print assemble_error_codes($_GET['lists'], $_GET['codes']);
                              }
                        function assemble_error_codes($error_lists_string, $error_codes_string) {
                                    $legend = array (
                                        '0'       => "Please resubmit the subscription form.",
                                        '1'       => "This list is currently not accepting subscribers. This list has met its top number of allowed subscribers.",
                                        '2'       => "Your subscription request for this list could not be processed as you are missing required fields.",
                                        '3'       => "Thanks, but you are already on our list. ",
                                        '4'       => "This e-mail address has been processed in the past to be subscribed, however your subscription was never confirmed.",
                                        '5'       => "This e-mail address cannot be added to list.",
                                        '6'       => "This e-mail address has been processed. Please check your email to confirm your subscription.",
                                        '7'       => "Thank you for subscribing!",
                                        '8'       => "E-mail address is invalid.",
                                        '9'       => "Subscription could not be processed since you did not select a list. Please select a list and try again.",
                                        '10'      => "This e-mail address has been processed. Please check your email to confirm your unsubscription.",
                                        '11'      => "This e-mail address has been unsubscribed from the list.",
                                        '12'      => "This e-mail address was not subscribed to the list.",
                                        '13'      => "Thank you for confirming your subscription.",
                                        '14'      => "Thank you for confirming your unsubscription.",
                                        '15'      => "Your changes have been saved.",
                                        '16'      => "Your subscription request for this list could not be processed as you must type your name.",
                                        '17'      => "This e-mail address is on the global exclusion list.",
                                        '18'      => "Please type the correct text that appears in the image.",
                                        '19'      => "Subscriber ID is invalid.",
                                        '20'      => "You are unable to be added to this list at this time.",
                                        '21'      => "Thanks, but you are already on our list.",
                                        '22'      => "This e-mail address could not be unsubscribed.",
                                        '23'      => "This subscriber does not exist.",
                                        '24'      => "The link to modify your account has been sent. Please check your email.",
                                        '25'      => "The image text you typed did not register. Please go back, reload the page, and try again.",
                                    );
                                
                                    $error_lists = explode(',', $error_lists_string);
                                    $error_codes = explode(',', $error_codes_string);
                                
                                    $message = "";
                                
                                    foreach ( $error_lists as $k => $listid ) {
                                        $code = ( isset($error_codes[$k]) ? (int)$error_codes[$k] : 0 );
                                        if ( isset($legend[$code]) ) {
                                            
                                            $message .= '<p>' . $legend[$code] . '</p>';
                                        }
                                    }
                                
                                    return $message;
                                } 
                         ?>
                            <form method="post" action="https://kmailer.kerigan.com/box.php">
                                <div class="two columns">
                                    <p><strong>First Name:</strong><br>
                                    <input type="text" name="first_name" value='' style="width:100%;" required /></p>
                                </div>
                                <div class="two columns">
                                    <p><strong>Last Name:</strong><br>
                                    <input type="text" name="last_name" value='' style="width:100%;" required /></p>
                                </div>
                                <div class="two columns">
                                    <p><strong>Zip Code:</strong><br>
                                    <input type="text" name="field[102,0]" value="" style="width:100%;" required /></p>
                                </div>
                                <div class="five columns">
                                    <p><strong>Email Address:</strong><br>
                                    <input name="email" value="" type="text" style="width:100%;" required /></p>
                                </div>

                                <div class="one columns">
                                    <input type="hidden" name="nlbox[]" value="72" />
                                    <input type="hidden" name="funcml" value="add" />
                                    
                                    <input type="hidden" name="p" value="1044" />
                                    <input type="hidden" name="_charset" value="utf-8" />
                                    
                                    <p>&nbsp;<br>
                                    <input class="button" type="submit" value="Submit" /></p>
                                </div>
                            </form>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
