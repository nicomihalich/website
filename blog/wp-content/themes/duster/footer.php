<?php
/**
 * @package WordPress
 * @subpackage Duster
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
		
			<?php if ( is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) || is_active_sidebar( 'sidebar-5' ) ) : ?>
			<div id="supplementary" <?php duster_footer_sidebar_class(); ?>>
				<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
				<div id="first" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-3' ); ?>
				</div><!-- #first .widget-area -->
				<?php endif; ?>				

				<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
				<div id="second" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-4' ); ?>
				</div><!-- #second .widget-area -->
				<?php endif; ?>				

				<?php if ( is_active_sidebar( 'sidebar-5' ) ) : ?>
				<div id="third" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-5' ); ?>
				</div><!-- #third .widget-area -->
				<?php endif; ?>				
			</div><!-- #supplementary -->
			<?php endif; ?>
		
			<div id="site-generator">
				<a href="http://wordpress.org/" rel="generator">Proudly powered by WordPress</a>, <a href="http://archlinux.org">Archlinux</a>, and <a href="http://linode.com">Linode</a>.<span class="sep"> | </span> <?php printf( __( 'Theme: %1$s by %2$s.', 'duster' ), 'Duster', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
			</div>
<div id="site-logos"><a href="http://www.w3.org/html/logo/">
<img src="http://www.w3.org/html/logo/badge/html5-badge-h-solo.png" width="63" height="64" alt="HTML5 Powered" title="HTML5 Powered" />
</a></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
        <script>
                var _gaq=[['_setAccount','UA-24131847-1'],['_trackPageview']];
                (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
</body>
</html>