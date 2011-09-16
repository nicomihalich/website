<?php

if ( ! isset( $content_width ) )
	$content_width = 570;

require_once(TEMPLATEPATH . '/dashboard.php'); 


# widgets
function pov_widgets_init() {
	register_sidebar( array(
		'name' => 'Sidebar',
		'id' => 'sidebar',
		'description' => 'Sidebar',
		'before_widget' => '<li>',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
}

add_action( 'widgets_init', 'pov_widgets_init' );


# Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

# Displays post image attachment (sizes: thumbnail, medium, full)
function dp_attachment_image($postid=0, $size='thumbnail', $attributes='') {
	if ($postid<1) $postid = get_the_ID();
	if ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => 1,
		'post_mime_type' => 'image',)))
		foreach($images as $image) {
			$attachment=wp_get_attachment_image_src($image->ID, $size);
			?><img src="<?php echo $attachment[0]; ?>" <?php echo $attributes; ?> /><?php
		}
}



# navigation menu
if (function_exists('register_nav_menu')) {
register_nav_menu('primary', __('secnav'));
}

# custom background
add_custom_background(); 

# Shorten Excerpt text for use in theme
function pov_excerpt($text, $chars = 120) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."...";
	return $text;
}

function trim_excerpt($text) {
  return rtrim($text,'[...]');
}
add_filter('get_the_excerpt', 'trim_excerpt');

function widget_mytheme_search() {
?>

<li><form class="searchform" method="get" action="<?php bloginfo('home'); ?>/"> <input type="text" value="Search: type and hit enter" onfocus="if (this.value == 'Search: type and hit enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search: type and hit enter';}" size="18" maxlength="50" name="s" class="s" /> </form> </li>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Search'), 'widget_mytheme_search');
?>
<?php
add_filter('comments_template', 'legacy_comments');
function legacy_comments($file) {
	if(!function_exists('wp_list_comments')) : // WP 2.7-only check
		$file = TEMPLATEPATH . '/legacy.comments.php';
	endif;
	return $file;
}
?>