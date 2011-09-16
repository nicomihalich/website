<?php get_header(); ?>

		<div id="main" role="main" class="ninecol <?php if(get_option('brunelleschi_settings_sidebar') === 'left'){ echo 'last'; } ?>">

			<h1 class="page-title"><?php
				printf( __( 'Tag Archives: %s', 'brunelleschi' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
			</h1>

			<?php get_template_part( 'loop', 'tag' ); ?>
		</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
