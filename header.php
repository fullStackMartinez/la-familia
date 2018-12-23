<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package La_Familia
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous"></script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<div id="page" class="site">
			<div class="upper-menu">
				<?php wp_nav_menu(array('theme_location' => 'additional-menu', 'container_class' => 'new_menu_class')); ?>
			</div>
			<a class="skip-link screen-reader-text"
				href="#content"><?php esc_html_e('Skip to content', 'la-familia'); ?></a>

			<header id="masthead" class="site-header">
				<div class="header-inner">
					<div class="site-branding">

						<img src="<?php echo get_template_directory_uri() . '/img/header-logo.png'; ?>"/>

					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation">

						<button class="menu-toggle" aria-controls="primary-menu"
								  aria-expanded="false"><?php esc_html_e('Primary Menu', 'la-familia'); ?></button>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'menu-1',
							'menu_id' => 'primary-menu',
						));
						?>
					</nav><!-- #site-navigation -->
				</div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
