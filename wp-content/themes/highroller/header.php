<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
		<title><?php wp_title('|',true,'right'); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if (get_theme_option('branding-favicon') == "") { ?>
	<link rel="Shortcut Icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" />
	<?php } else { ?>
	<link rel="Shortcut Icon" href="<?php echo get_theme_option('branding-favicon'); ?>" type="image/x-icon" />
	<?php } ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>"> 
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<?php 

	//Show Theme Options Header Scripts here
	echo trim(stripslashes(get_theme_option('header-script'))); 
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="outerwrap">

	<header class="main-header">

	<div class="wrap">
	
	<button id="mobile-menu-btn">
	<i>&nbsp;</i>
	<i>&nbsp;</i>
	<i>&nbsp;</i>
	</button>

  		<div class="header-logo">
		
		<?php if (get_theme_option('header-logo') != ""): ?>
   		<a title="<?php bloginfo('name'); ?>" href="<?php echo get_option('home'); ?>">
   		<img alt="<?php bloginfo('name'); ?>" src="<?php echo get_theme_option('header-logo'); ?>" /></a>
  		<?php else: ?>
  		<h2><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a></h2>
  		<?php endif;?>
  		</div><!--.header-logo-->
		
		<nav id="mobile-menu">  
				<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'mobilenav','menu_id'=> 'mobilenav')); ?>
		</nav><!--End of Mobile Navbar-->

		<?php if ( is_active_sidebar( 'headertop-widgets' ) ) : ?>
		<div class="headerwidgets">
			<?php dynamic_sidebar('headertop-widgets'); ?>
		</div><!--.Widgets Heading-->
		<?php endif; ?>
		
		<div class="clearboth"></div>
		
	</div><!--.wrap-->

	</header><!--End of Header-->
	 
	<nav class="navbar">
		
		<div class="wrap">
    		
		<?php wp_nav_menu( array( 'container' => 'false', 'theme_location' => 'primary', 'menu_class' => 'nav','menu_id'=> 'nav','fallback_cb' => 'fly_default_menu') ); ?>

		</div><!--.wrap-->
		
		<div class="clearboth"></div>

	</nav><!--Nav-->