<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

<?php 
wp_enqueue_script('jquery');
?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>


<?php wp_head(); ?>
</head>
<body <?php body_class( $body_classes ); ?>>
<div id="container">

<?php
global $options;
foreach ($options as $value) {
if (get_option( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_option( $value['id'] ); }
}
?>



<div id="header">


<div id="headerleft">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php if($pov_logo) { ?><img src="<?php echo $pov_logo;?>" alt="Go Home"/><?php } else { bloginfo('name'); } ?>	</a></h1>
		<?php if ($pov_disinfo == "true") { } else { ?><h2><?php bloginfo('description'); ?></h2><?php } ?>
</div>





<div id="headerright">



<?php include (TEMPLATEPATH . '/searchformhead.php'); ?>

</div>



</div>	
<?php wp_nav_menu( array( 'container_class' => 'secnav', 'theme_location' => 'primary' ) ); ?>
