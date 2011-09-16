
</div>
<div id="footer">

<!-- credit links are not required to remain intact, but is appreciated. Thanks! -->
<h2><?php bloginfo('description'); ?></h2>
	<p>
		&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> | Powered by <a href="http://wordpress.org/">WordPress</a> | <a href="#container">Jump To Top</a>
	</p>
	
	<p><a href="http://beatheme.com/" alt="Profi WordPress Themes!"/><img src="<?php bloginfo('template_directory'); ?>/images/beafoo-bla.png" border="0" alt="beateheme.com"/></a></p>
	
	
</div>
<script type="text/javascript">
jQuery('img').hover(function() {
jQuery(this).animate({opacity: 0.6}, "slow");
}, function() {
jQuery(this).animate({opacity: 1}, "slow");
}); 
</script>

<?php 
$pov_google_analytics = get_option('pov_google_analytics');
if ($pov_google_analytics != '') { echo stripslashes($pov_google_analytics); }
?>
<?php wp_footer(); ?>
</body>
</html>
