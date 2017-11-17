<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wickedgrill
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri() ?>/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri() ?>/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/favicon/favicon-16x16.png">
<link rel="manifest" href="<?php echo get_template_directory_uri() ?>/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri() ?>/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<script data-cfasync="true" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.1/jquery.flexslider-min.js"></script>
<!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv/dist/html5shiv.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wicked' ); ?></a>

	<header id="masthead" class="site-header">
    	<div id="mast-gradient">	
            <div id="left-gradient"></div>
            <div id="right-gradient"></div>
        </div><!--mast-gradient-->    
        <div id="tiremark"></div>	
        <div class="container">
            <div class="row">
            	<div class="mast">
                    	
                        <div id="logo" class="four columns">
                        <a class="home-link" title="Panama City Beach Southern Food Wicked Wheel logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <img src="<?php bloginfo('template_url');?>/images/panama-city-beach-southern-food-logo.png?new" alt="Panama City Beach Southern Food Wicked Wheel logo"/>
                        </a>
                        </div>
                        <div id="main-nav" class="eight columns">
                            <div class="sub-title six columns">
                            <img src="<?php bloginfo('template_url');?>/images/wild.png?new" alt="Wild Eyed and Southern Fried! Panama City Beach Southern Food"/>
                            </div>	
                            <div class="phone six columns">
                                <a href="tel:8505887947" >850-588-7947</a>
                            </div>
                            <div id="navbar" class="navbar twelve columns">
                                <nav id="site-navigation" class="main-navigation">
                                    <button class="menu-toggle"  aria-expanded="false"><?php _e( 'Navigation', 'wicked' ); ?></button>
                                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                                </nav><!-- #site-navigation -->
                            </div><!-- #navbar -->
                       	</div>
                        
                    </div>

            </div>
         </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="row">
