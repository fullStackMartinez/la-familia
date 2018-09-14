<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package La_Familia
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="footer-container">
			<div class="menu-1">
			<?php wp_nav_menu( array(
				'theme_location' => 'footer-menu-1',
				'container_class' => 'new_menu_class'
				)); ?>
		</div>

			<div class="menu-1">

			<?php wp_nav_menu( array(
				'theme_location' => 'footer-menu-2',
				'container_class' => 'new_menu_class'
			)); ?>
			</div>

			<div class="menu-1">

			<?php wp_nav_menu( array(
				'theme_location' => 'footer-menu-3',
				'container_class' => 'new_menu_class'
			)); ?>
			</div>
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
