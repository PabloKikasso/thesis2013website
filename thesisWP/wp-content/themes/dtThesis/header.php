<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage dtThesis based off Twenty Twelve
 */
?><!DOCTYPE html>
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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="full-header">      
		<header class="globalHeader">
			<div class="container">
				<div class="navbar">
				  <div class="navbar-inner">
				    <div class="container">
				 
				      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </a>
				 
				      <!-- Be sure to leave the brand out there if you want it shown -->
				      <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="http://danselden.me/mfadt/thesis/wp-content/uploads/2013/03/logo.png" width="250"></a>
				 
				      <!-- Everything you want hidden at 940px or less, place within here -->
				      <div class="nav-collapse collapse">
				      	<ul class="nav">
						  <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
						</ul>
						<form class="navbar-search pull-right">
						  <input type="text" class="search-query" placeholder="Search">
						</form>
				      </div>
				 
				    </div><!--END CONTAINER -->
				  </div><!--END NAVBAR INNER -->
				</div><!--END NAVBAR -->
			</div><!--END CONTAINER -->
		</header>
	</div>