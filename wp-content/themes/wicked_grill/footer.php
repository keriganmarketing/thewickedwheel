<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Pineapple Willy\'s
 */
?>
		</div><!-- row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    <div id="footer-top">
    	<div class="container">
        	<div class="row">
            	<div class="footer-menu three columns">
                <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
                </div>
                <div class="footer-contact three columns">
					<h3>Contact</h3>
                    <p>10025 Hutchinson Blvd.<br>Panama City Beach, FL 32407</p>
                    <p><a class="footer-phone" href="tel:8505887947">850-588-7947</a></p>
                    <p id="open">Open 11am daily</p>
                    <h3>Connect</h3>
                    <p class="social"><a href="https://www.facebook.com/TheWickedWheel/" class="facebook" target="_blank">Like The Wicked Wheel on Facebook</a>
                    <a href="https://www.instagram.com/TheWickedWheel/" class="instagram" target="_blank">Follow The Wicked Wheel on Instagram</a>
                    <a href="https://twitter.com/TheWickedWheel/" class="twitter" target="_blank">Follow The Wicked Wheel on Twitter</a>
                    <a href="https://plus.google.com/103335905025395137461/about?hl=en-US" class="google-plus" target="_blank">Review The Wicked Wheel on Google+</a></p>
                </div>
                <div class="map six columns">
                	<div class="map-container" >
                    <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9755.278911416515!2d-85.81204683202519!3d30.179653033626817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x889388d5053e9af9%3A0xc210e5bc0c1a606d!2sThe+Wicked+Wheel+Bar+%26+Grill!5e0!3m2!1sen!2sus!4v1456236636683" allowfullscreen></iframe>
  					</div>
                    </div>
                </div>
             </div>
		</div>
	</div>
	<div id="footer-mid">
      	<div class="container">
        	<div class="row">
                 <div class="footer-partners twelve columns">
                    <a href="http://pwillys.com" target="_blank"><img src="<?php bloginfo('template_url');?>/images/pw-logo-new.png" alt="The Wicked Wheel Panama City Beach Southern Food" title="The Wicked Wheel Panama City Beach Southern Food"></a>
                    <a href="http://www.emeraldviewresorts.com/?utm_source=the%20wicked%20wheel&utm_medium=partners&utm_campaign=the%20wicked%20wheel" target="_blank"><img id="emerald-view-resorts" src="<?php bloginfo('template_url');?>/images/emerald-view.png" alt="Everald View Resorts" title="Everald View Resorts"></a>
                    <a href="http://www.thepanamacitybeachmap.com/" target="_blank"><img id="pcbmapcom" src="<?php bloginfo('template_url');?>/images/pcbmapcom.png" alt="Panama City Beach Visitor's Map" title="Panama City Beach Visitor's Map"></a>
                 </div>
             </div>
         </div>
     </div>
     <div id="footer-bot">
      	<div class="container">
        	<div class="row">
            	<div class="site-info six columns">
                    <p class="copyright">&copy;<?php echo date("Y"); ?> The Wicked Wheel Bar & Grill. All rights reserved. <a href="/sitemap_index.xml" title="Panama City Beach Southern Food Sitemap">Sitemap</a></p>
                </div>
                <div class="sig six columns">
                    <p class="siteby"><img src="<?php echo get_template_directory_uri(); ?>/images/kma.png" alt="Designed &amp; Programmed by Kerigan Marketing Associates" />Site by <a target="_blank" href="http://keriganmarketing.com">KMA</a>.</p>
                </div>
            </div>
        </div>
		</div>
	</footer><!-- #colophon -->
	<div class="container-fluid">
		<div class="row" style="padding: 20px; background: #E27708; color: #fff; text-align: center; position: fixed; bottom:0; min-width:100%; z-index: 9999999; display:none;">
			<p>The Wicked Wheel will be closed from December 11th &ndash; December 25th for the Holiday Season.</p>
		</div>
	</div>
</div><!-- #page -->
<script data-cfasync="true" async src="https://i.simpli.fi/dpx.js?cid=28739&action=100&segment=cnhiwickedwheelrt&m=1&sifi_tuid=26341"></script>
<script data-cfasync="false" type="text/javascript" >
/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
( function() {
	var container, button, menu;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );

	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
} )();

( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();

$(window).load(function() {
	$('.flexslider').flexslider({
		touch: true,
		/*slideshow: false,*/
		controlNav: false,
		slideshowSpeed: 4000,
		animationSpeed: 600,
		initDelay: 0,
		animation: "fade",
		start: function(slider) { // Fires when the slider loads the first slide
		var slide_count = slider.count - 1;

		  $(slider)
			.find('img.lazy:eq(0)')
			.each(function() {
			  var src = $(this).attr('data-src');
			  $(this).attr('src', src).removeAttr('data-src');
			});
		},
		before: function(slider) { // Fires asynchronously with each slider animation
		  var slides     = slider.slides,
			  index      = slider.animatingTo,
			  $slide     = $(slides[index]),
			  $img       = $slide.find('img[data-src]'),
			  current    = index,
			  nxt_slide  = current + 1,
			  prev_slide = current - 1;

		  $slide
			.parent()
			.find('img.lazy:eq(' + current + '), img.lazy:eq(' + prev_slide + '), img.lazy:eq(' + nxt_slide + ')')
			.each(function() {
			  var src = $(this).attr('data-src');
			  $(this).attr('src', src).removeAttr('data-src');
			});
		}
	});
});
</script>
<script data-cfasync="true">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59288852-1', 'auto');
  ga('send', 'pageview');

</script>
<?php wp_footer(); ?>

<?php if(is_page(8)){ ?>
<script>
(function( $ ) {
	var $container = $('.masonry');
	$container.imagesLoaded( function () {
	  $container.masonry({
		columnWidth: '.menu-category',
		itemSelector: '.menu-category'
	  });
	});
})(jQuery);
</script>
<?php } ?>

</body>
</html>
