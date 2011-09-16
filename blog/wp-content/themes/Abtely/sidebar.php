<div id="sidebar">
<?php
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>
<!-- featured news -->
<?php if ($pov_disfeat == "true") { } else { ?> 	
<div id="featured">			
<!-- <h2>Featured</h2> -->	
			
			<?php 
	$highcat = get_option('pov_story_category'); 
	
	$my_query = new WP_Query('category_name= '. $highcat .'&showposts=3'.$highcount.'');
while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;
?>

<div class="fblock">
<?php if ($pov_disthumb == "true") { } else { ?>
<a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'thumbnail', 'alt="' . $post->post_title . '"'); ?></a>
<?php } ?>

<h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>

<p><?php echo pov_excerpt( get_the_excerpt(), '100'); ?></p>

</div>
<?php endwhile; ?>

</div>
<?php } ?>
		
<!-- end featured news -->



<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Sidebar") ) : ?>

<li><h2>Recent posts</h2></li>
			
<?php wp_get_archives('title_li=&type=postbypost&limit=5'); ?>
</ul>


<ul>
<li><h2>Archives</h2></li>

		<?php wp_get_archives('type=monthly'); ?>
	


<?php endif; ?>		
</ul>
</div>

