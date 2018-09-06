<?php
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		$args = array(
		'post_type' => 'staff',
		'posts_per_page' => -1,
		'orderby' => 'date',
		);

		//Loop through Custom Post Type 'Staff'

		$loop = new WP_Query($args);
		if($loop->have_posts()):
		while($loop->have_posts()) {
		$loop->the_post();
		?>

			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('thumbnail') ?></a>
			<?php
			the_title();
			the_field('staff_title');
			the_field('staff_position');
			the_field('staff_quote');
			the_content();

		}
		endif;
		wp_reset_postdata();

		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();