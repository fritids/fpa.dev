<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package fpa
 * @since fpa 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- Le styles -->
<link href="<?php echo get_template_directory_uri(); ?>/lib/css/compiled.css" rel="stylesheet">

<?php if(is_page_template("template-account-overview.php")) { ?>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/js/plugins/awesome-cropper-master/components/imgareaselect/css/imgareaselect-default.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/lib/js/plugins/awesome-cropper-master/css/jquery.awesome-cropper.css">
<?php } ?>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Le fav and touch icons -->
<link rel="shortcut icon" href="lib/ico/favicon.ico">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="lib/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="lib/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="lib/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="lib/ico/apple-touch-icon-57-precomposed.png">

<?php 
	global $full, $thumbnail, $raw, $title, $paged, $pagesz;
	
	$full = array("size" => "full");
	$thumbnail = array("size" => "thumbnail");
	$raw = array("raw" => "true");
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$pages = $wp_query->max_num_pages;
?>

<?php wp_head(); ?>
</head>

<?php
/*Query Strings for Join pages. Use to add classes to body in order to style the pages accordinly */
$action = (isset($_GET['action'])) ? $_GET['action'] : 0; 
$subscription = (isset($_GET['subscription'])) ? $_GET['subscription'] : 0;
$class = (isset($_GET['class'])) ? $_GET['class'] : 0;
?>

<body <?php body_class(); ?>>
	<div id="page" class="container <?php if($action) { echo $action; } ?> <?php if($subscription) { echo $subscription; } ?> <?php if($class) { echo $class; } ?>">
		<div id="main" class="clearfix">
			
			<div id="branding" class="row-fluid">
				<div class="pull-left">
					<h1 id="logo" class="ir">Freestyle Players Association</h1>
				</div>
				<div id="search-social" class="pull-right">
					<div class="pull-left">
						<?php get_search_form(); ?>
					</div>
					<div class="pull-left">
						<a href="#" class="social"><i class="icon-play"></i></a>
						<a href="#" class="social"><i class="icon-vimeo"></i></a>
						<a href="#" class="social"><i class="icon-facebook"></i></a>
						<a href="#" class="social"><i class="icon-twitter"></i></a>
					</div>
				</div>
				
				<?php if(!is_user_logged_in()) { ?>
					<a href="<?php echo site_url(); ?>/login/" class="login-link pull-right">Already a FPA Member? Login Here</a>
				<?php } ?>
			</div><!-- #branding -->
			
			<div id="header-accent" class="row-fluid checker"></div>
			
			<div id="navigation" class="row-fluid">
				<div class="navbar">
					<?php 
					    wp_nav_menu( array(
					        'menu'       => 'Main Navigation',
					        'depth'      => 2,
					        'container'  => false,
					        'menu_class' => 'nav',
					        //Process nav menu using our custom nav walker
					        'walker' => new twitter_bootstrap_nav_walker())
					    );
					?>
				</div>
				<?php if(is_user_logged_in()) { ?>
					<div class="account-menu">
						<?php 
						    wp_nav_menu( array(
						        'menu'       => 'Account Navigation',
						        'depth'      => 2,
						        'container'  => false,
						        //Process nav menu using our custom nav walker
						        'walker' => new twitter_bootstrap_nav_walker())
						    );
						?>
					</div>
				<?php } ?>
			</div><!-- #navigation -->
			
			<div id="content" class="row-fluid">
				<div id="navbar-folds">
					<div class="navbar-fold left"></div>
					<div class="navbar-fold right"></div>
				</div>