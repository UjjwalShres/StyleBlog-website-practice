<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Style_Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">



	<?php wp_head(); ?>
</head>

<body>
	<div class="header" id="ban">
		<div class="container">

			<div class="head-left wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
				<div class="header-search">
					<div class="search">
						<input class="search_box" type="checkbox" id="search_box">
						<label class="icon-search" for="search_box"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></label>
						<!-- <div class="search_form">
							<form action="#" method="post">
								<input type="text" name="Search" placeholder="Search...">
								<input type="submit" value="Send">
							</form>
						</div> -->
						<?php get_search_form() ?>
					</div>
				</div>
			</div>

			<div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-7" id="link-effect-7">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'nav navbar-nav'
								)
							);
							?>
						</nav>
					</div>
					<!-- /.navbar-collapse -->
				</nav>
			</div>
			<div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight;">
				<ul>
					<?php if (get_theme_mod('facebook_block') != '') : ?>
						<li><a href="<?php echo get_theme_mod('facebook_block'); ?>"> </a></li><?php endif; ?>
					<?php if (get_theme_mod('pinterest_block') != '') : ?>
						<li><a href="<?php echo get_theme_mod('pinterest_block'); ?>" class="pin"> </a></li><?php endif; ?>
					<?php if (get_theme_mod('linkedIn_block') != '') : ?>
						<li><a href="<?php echo get_theme_mod('linkedIn_block'); ?>" class="in"> </a></li><?php endif; ?>
					<?php if (get_theme_mod('be_block') != '') : ?>
						<li><a href="<?php echo get_theme_mod('be_block'); ?>" class="be"> </a></li><?php endif; ?>
					<?php if (get_theme_mod('vimeo_block') != '') : ?>
						<li><a href="<?php echo get_theme_mod('vimeo_block'); ?>" class="vimeo"> </a></li><?php endif; ?>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--start-main-->
	<div class="header-bottom">
		<div class="container">
			<div class="logo wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
				<h1><a href="<?php get_permalink(); ?>"><?php echo strtoupper(get_bloginfo('name')); ?></a></h1>
				<?php if (get_bloginfo('description') != '') : ?>
					<p><label class="of"></label><?php echo strtoupper(get_bloginfo('description')); ?><label class="on"></label></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<!-- banner -->