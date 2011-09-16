<?php
/*----------------------------------------
# 
# Theme Name: Brunelleschi
# 
----------------------------------------*/

/* REQUIRED! -- define content width */
if ( ! isset( $content_width ) ) $content_width = 960;

/*----------------------------------------
# 
# SETTINGS PAGE
# 
----------------------------------------*/

/* Makes Postbox Collapsable */
wp_enqueue_script('postbox');
wp_enqueue_script('dashboard');

$settings_prefix = "brunelleschi_settings_";
$settings_fields = array(
	array(
		'type' => 'start'
	),
	array(
		'type' => 'icon'
	),
	array(
		'type' => 'title',
		'value' => 'Brunelleschi Theme Settings'
	),
	array(
		'type' => 'form-start'
	),
	array(
		'type' => 'section-start',
		'heading' => 'Display Settings'
	),
/* Disabled Until Header Image is Compatible with Full Width
	array(
		'type' => 'text',
		'name' => $settings_prefix . 'content-width',
		'label' => 'Set the content width',
		'description' => '<b>IMPORTANT:</b> Use CSS notation, that means include <b>px</b> or <b>%</b>. No less than 795px',
		'std' => '960px'
	),
*/
 	array(
		'type' => 'checkbox',
		'name' => $settings_prefix . 'use-header-image',
		'label' => 'Enable Header Image?',
		'description' => 'Check to include a Header Image.',
		'std' => ''
	),
	array(
		'type' => 'select',
		'name' => $settings_prefix.'sidebar',
		'label' => 'Left or Right Sidebar?',
		'description' => 'Pick which side you want the sidebar on.',
		'std' => 'right',
		'options' => array(
			'left',
			'right'
		)
	),
	array(
		'type' => 'section-end'
	),
	array(
		'type' => 'form-end'
	),
	array(
		'type' => 'end'
	)
);

function brunelleschi_settings_render_fields() {
	global $settings_fields,$settings_prefix;
	foreach ( $settings_fields as $field ) {
		switch( $field['type'] ) {
			case 'start':?>
				<div class="wrap">
				<?php if ( isset( $_GET['settings-updated'] ) && 'true' == esc_attr( $_GET['settings-updated'] ) ) echo '<div class="updated fade below-h2" style="padding: 5px 10px; margin: 15px 0 0 0;"><strong>' . __( 'Settings saved.', 'brunelleschi') . '</strong></div>'; ?>
				<?php
				break;
			case 'end':?>
				</div><!-- .wrap --><?php
				break;
			case 'icon':?>
				<div id="icon-options-general" class="icon32">
					<br />
				</div><?php
				break;
			case 'title':?>
				<h2><?php echo $field['value']; ?></h2><?php
				break;
			case 'form-start':?>
				<div class="metabox-holder">
				<form method="post" action="options.php">
				<?php
				settings_fields($settings_prefix . 'group');
				do_settings_sections($settings_prefix . 'group');
				break;
			case 'form-end':?>
					<p class="submit">
						<input type="submit" class="button-primary" value="Save Changes" />
					</p>
				</form>
				</div><!-- .metabox-holder --><?php
				break;
			case 'section-start':?>
				<div class="postbox-container" style="width:100%">
					<div class="meta-box-sortables">
						<div class="postbox " > 
							<div class="handlediv" title="Click to toggle">
								<br />
							</div><!-- .handlediv -->
							<h3 class='hndle'><?php echo $field['heading']; ?></h3> 
							<div class="inside">
   								<table class="form-table"><tbody><?php
				break;
			case 'section-end':?>
				</tbody></table></div><!-- .inside --></div><!-- .postbox --></div><!-- .meta-box-sortables --></div><!-- postbox-container --><?php
				break;
			case 'text':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<input type="text" class="regular-text" value="<?php if ( $opt = get_option($field['name']) ) { echo $opt; } else { echo $field['std']; } ?>" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" />
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
 			case 'checkbox':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<input type="checkbox" class="checkbox" value="checked" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" <?php checked( get_option($field['name']) , 'checked' ); ?> />
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
			case 'select':?>
 				<tr valign="top">
					<th scope="row">
						<label for="<?php echo $field['name']; ?>"><?php echo $field['label']; ?></label>
					</th>
					<td>
						<select class="select" name="<?php echo $field['name']; ?>" id="<?php echo $field['name']; ?>" />
							<?php foreach($field['options'] as $option){ ?>
								<option value="<?php echo $option; ?>" <?php selected( get_option($field['name']), $option ); ?>><?php echo $option; ?></option>
							<?php } ?>
						</select>
						<?php if ( isset($field['description']) ): ?>
						<span class="description"><?php echo $field['description']; ?></span>
						<?php endif; ?>
					</td>
 				</tr><?php
				break;
		}
	}
}

add_action('admin_menu',$settings_prefix . 'menu');
function brunelleschi_settings_menu() {
	global $settings_prefix;
	add_theme_page('Brunelleschi Settings','Brunelleschi Settings','manage_options','brunelleschi-settings',$settings_prefix . 'render_fields');
	add_action('admin_init',$settings_prefix . 'register');
}

function brunelleschi_settings_register() {
	global $settings_fields,$settings_prefix;
	foreach ( $settings_fields as $field ) {
		if ( isset($field['name']) ) {
			register_setting($settings_prefix . 'group',$field['name']);
		}
	}
}

/*----------------------------------------
# 
# CUSTOM IMAGE HEADER
# 
----------------------------------------*/

/* Disable Based on Settings */
if(get_option('brunelleschi_settings_use-header-image') === 'checked'):

	if ( ! defined( 'HEADER_IMAGE' ) )
		define( 'HEADER_IMAGE', '%s/images/headers/path.jpg' );
		
/* 	if(get_option()) */
		
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'brunelleschi_header_image_width', 960 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'brunelleschi_header_image_height', 198 ) );

	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	if ( ! defined( 'NO_HEADER_TEXT' ) )
		define( 'NO_HEADER_TEXT', true );
		
	add_custom_image_header( '', 'brunelleschi_admin_header_style' );

	register_default_headers( array(
		'beach' => array(
			'url' => '%s/images/headers/beach.png',
			'thumbnail_url' => '%s/images/headers/beach-thumbnail.png',
			'description' => __('Beach', 'brunelleschi')
		)
	) );

if ( ! function_exists( 'brunelleschi_admin_header_style' ) ) :

	function brunelleschi_admin_header_style() {
	?>
	<style type="text/css">
	#headerimg {
		display: block;
		margin: 0 auto;
		margin-bottom: 17px;
		border-top: 1px solid #aaa;
		border-bottom: 1px solid #aaa;
	}
	</style>
	<?php
	}
endif;

endif;

/*----------------------------------------
# 
# MISC THEME FUNCTIONS
# 
----------------------------------------*/

/* brunelleschi_title() */
/* Prints the title based on the content */
function brunelleschi_title(){
	global $page, $paged;
	wp_title( '&raquo;', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " &raquo; $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' &raquo; ' . sprintf( __( 'Page %s', 'brunelleschi' ), max( $paged, $page ) );
}

/* enque_modernizer */
if ( !is_admin() ) { // instruction to only load if it is not the admin area
	// register your script location, dependencies and version
	wp_register_script('modernizr',
		get_template_directory_uri() . '/js/modernizr-1.7.min.js',
		array(),
		'1.7' );
	// enqueue the script
	wp_enqueue_script('modernizr');
}

/* Run Brunelleschi Theme Setup */
add_action( 'after_setup_theme', 'brunelleschi_setup' );

/* brunelleschi setup */
if ( ! function_exists( 'brunelleschi_setup' ) ):
	function brunelleschi_setup() {
		add_editor_style();
		add_custom_background();
		add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
		add_theme_support( 'automatic-feed-links' );
		load_theme_textdomain( 'brunelleschi', TEMPLATEPATH . '/languages' );
	
		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			require_once( $locale_file );
	
		register_nav_menus( array(
			'primary' => __( 'Primary Navigation', 'brunelleschi' ),
		) );
	
		if ( ! defined( 'HEADER_TEXTCOLOR' ) )
			define( 'HEADER_TEXTCOLOR', '' );
	
		if ( ! defined( 'NO_HEADER_TEXT' ) )
			define( 'NO_HEADER_TEXT', true );
	}
endif;

/* Show the Home Page */
function brunelleschi_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'brunelleschi_page_menu_args' );

/* Excerpt Length */
function brunelleschi_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'brunelleschi_excerpt_length' );

/* Continue Reading Link */
function brunelleschi_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'brunelleschi' ) . '</a>';
}

function brunelleschi_auto_excerpt_more( $more ) {
	return ' &hellip;' . brunelleschi_continue_reading_link();
}
add_filter( 'excerpt_more', 'brunelleschi_auto_excerpt_more' );

function brunelleschi_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= brunelleschi_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'brunelleschi_custom_excerpt_more' );

add_filter( 'use_default_gallery_style', '__return_false' );

function brunelleschi_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'brunelleschi_remove_gallery_css' );

if ( ! function_exists( 'brunelleschi_comment' ) ) :
function brunelleschi_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'brunelleschi' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'brunelleschi' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				printf( __( '%1$s at %2$s', 'brunelleschi' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'brunelleschi' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'brunelleschi' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'brunelleschi' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

function brunelleschi_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'brunelleschi' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'brunelleschi' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'brunelleschi' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'brunelleschi' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'brunelleschi' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'brunelleschi' ),
		'before_widget' => '<li id="%1$s" class="widget-container threecol %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'brunelleschi' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'brunelleschi' ),
		'before_widget' => '<li id="%1$s" class="widget-container threecol %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'brunelleschi' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'brunelleschi' ),
		'before_widget' => '<li id="%1$s" class="widget-container threecol %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'brunelleschi' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'brunelleschi' ),
		'before_widget' => '<li id="%1$s" class="widget-container threecol last %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'brunelleschi_widgets_init' );

function brunelleschi_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'brunelleschi_remove_recent_comments_style' );

if ( ! function_exists( 'brunelleschi_posted_on' ) ) :
function brunelleschi_posted_on() {
	printf( __('<span class="meta-sep">by</span> %3$s <span class="%1$s">Posted on</span> %2$s', 'brunelleschi' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'brunelleschi' ), get_the_author() ),
			get_the_author()
		)
	);
	edit_post_link( __( 'Edit', 'brunelleschi' ), ' <small><span class="edit-link">[', ']</span></small>' );
}
endif;

if ( ! function_exists( 'brunelleschi_posted_in' ) ) :
function brunelleschi_posted_in() {
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brunelleschi' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brunelleschi' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'brunelleschi' );
	}
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;
