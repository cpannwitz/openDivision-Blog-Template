<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

  	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>	
	<div id="page" class="container">
		<header id="pagehead" class="site-header" role="banner">
			<div class="headsyhead"><a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" name="backtotop">
				<div class="site-title"><h1>
					<span class="titlechar titlechar-1"><</span>
					<span class="titlechar titlechar-2">d</span>
					<span class="titlechar titlechar-3">I</span>
					<span class="titlechar titlechar-4">v</span>
					<span class="titlechar titlechar-5">></span>
					<span class="titlechar titlechar-6">s</span>
					<span class="titlechar titlechar-7">I</span>
					<span class="titlechar titlechar-8">o</span>
					<span class="titlechar titlechar-9">n</span>
				</h1></div>
				<div class="site-description"><h4>
					<?php bloginfo( 'description' ); ?>
				</h4></div></a> 
			</div>

				<!-- <div class="meta-info">
				<h1 class="site-title"><a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div> -->
			
			<div class="menu-toggle-label">
					<label for="navtoggle-cbox" class="toggle-nav">
						Menu<i class=" fa fa-chevron-down fa-fw"></i>					
					</label>
			</div>
			<input type="checkbox" id="navtoggle-cbox" class="cbox" />
			<div id="main-navbar" class="navbar row navtoggle">
								
				<!-- <div class="navtoggle"> -->
				<div class="header-navigation two-thirds column" role="navigation">
					<li class="menu-item"><i class="fa fa-navicon fa-fw fa-lg"></i></li>
					<?php wp_nav_menu( array(
						 'theme_location' => 'header_location',
						 'container' => false,						 
						 'items_wrap' => '%3$s',							 
					) ); ?>					
				</div>				
				<div id="iconbar" class="one-third column">					
					<li><a href="https://www.facebook.com/openDivision/" target="_blank"><i class="fa fa-2x fa-facebook-official"></i></a></li>
					<li><a href="https://twitter.com/openDivisionUX/" target="_blank"><i class="fa fa-2x fa-twitter"></i></a></li>
					<li><a href="https://github.com/opendivision/" target="_blank"><i class="fa fa-2x fa-github-square"></i></a></li>
					<li><a href="http://codepen.io/opendivision/" target="_blank"><i class="fa fa-2x fa-codepen"></i></a></li>	
					<li><?php get_search_form(); ?></li>
				</div>
				<!-- </div>DIV.navtoggle -->
			</div><!-- DIV.row ends -->
		</header><!-- #pagehead -->
		<br /><div class="content-section">
			<div class="row">
				<div class="two-thirds column">
					<?php the_breadcrumb(); ?>					