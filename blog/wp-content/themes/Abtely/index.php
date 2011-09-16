<?php get_header(); ?>
<?php
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>
	<div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
			
				
				<?php if ($pov_disthumb == "true") { } else { ?>
				<div class="thumb">
    				<a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'thumbnail', 'alt="' . $post->post_title . '"'); ?></a>
				</div>
				<?php } ?>
				
				
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small>By <?php the_author() ?> | <?php the_category(', ') ?></small>
				
				
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

				<div class="postmetadata"><div style="float:left"><?php the_time('j M Y') ?><?php if (function_exists('the_tags')) { the_tags(' | Tags: ', ', ', ''); } ?></div><div style="float:right"> <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div></div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<?php
				include('wp-pagenavi.php');
				if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
			?>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
