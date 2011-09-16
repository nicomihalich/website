<?php get_header(); ?>
		<div id="main" role="main" class="ninecol <?php if(get_option('brunelleschi_settings_sidebar') === 'left'){ echo 'last'; } ?>">
		
		<?php get_template_part( 'loop', 'index' ); ?>
		
		</div><!-- #main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
