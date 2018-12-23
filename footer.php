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
			<div class="footer-image">
				<div class="footer-logo">
					<img src="<?php echo get_template_directory_uri() . '/img/footer-logo.png'; ?>"/>
					<p>Main Number</p>
					<p>(505) 982-4425</p>
					<a href="#">View Locations</a>
				</div>
			</div>
			<div class="menu-1">
				<?php wp_nav_menu(array(
					'theme_location' => 'footer-menu-1',
					'container_class' => 'footer-menu-1'
				)); ?>
			</div>

			<div class="menu-1">

				<?php wp_nav_menu(array(
					'theme_location' => 'footer-menu-2',
					'container_class' => 'footer-menu-2'
				)); ?>
			</div>

			<div class="menu-2">

				<?php wp_nav_menu(array(
					'theme_location' => 'footer-menu-3',
					'container_class' => 'footer-menu-3'
				)); ?>
			</div>
		</div>

	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
