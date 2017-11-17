<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Pineapple Willy\'s
 */


get_header(); ?>
<div id="section-three">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <div class="container">
            	<div class="row">
                    <section class="error-404 not-found" style="color:#fff;padding-top:30px;">
                        <header class="page-header">
                            <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'wicked' ); ?></h1>
                        </header><!-- .page-header -->
        
                        <div class="page-content">
                            <p><?php _e( 'It looks like nothing was found at this location. Click <a href="https://thewickedwheel.com">here</a> to go to the Home Page.', 'wicked' ); ?></p>
        
                            <!--<?php get_search_form(); ?>
        
                            <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
        
                            <?php if ( wicked_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
                            <div class="widget widget_categories">
                                <h2 class="widget-title"><?php _e( 'Most Used Categories', 'wicked' ); ?></h2>
                                <ul>
                                <?php
                                    wp_list_categories( array(
                                        'orderby'    => 'count',
                                        'order'      => 'DESC',
                                        'show_count' => 1,
                                        'title_li'   => '',
                                        'number'     => 10,
                                    ) );
                                ?>
                                </ul>
                            </div><!-- .widget -->
                            <!--<?php endif; ?>
        
                            <?php
                                /* translators: %1$s: smiley */
                                $archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'wicked' ), convert_smilies( ':)' ) ) . '</p>';
                                the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
                            ?>
        
                            <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>-->
        
                        </div><!-- .page-content -->
                    </section><!-- .error-404 -->
                 </div>
               </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
