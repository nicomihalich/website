<?php get_header(); ?>
	<div id="main" role="main" class="twelvecol last">
		<div id="post-0" class="post error404 not-found twelvecol">
			<h1 class="entry-title"><?php _e( 'Not Found', 'brunelleschi' ); ?></h1>
			<div class="entry-content">
				<p><?php _e( 'Apologies, but the page you requested could not be found. Perhaps searching will help.', 'brunelleschi' ); ?></p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-0 -->
	</div><!-- #main -->
	<script type="text/javascript">
		document.getElementById('s') && document.getElementById('s').focus();
	</script>
<?php get_footer(); ?>