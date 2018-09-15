<?php
get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- START OF ARCHIVE LOOP FOR CPT STAFF -->
<section class="wrapper">
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
			<div class="field-loop">
				<div class="loop-image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail') ?></a>
				</div>
				<div class="loop-content">
					<?php
					the_title();
					the_field('staff_title');
					the_field('staff_position');
					the_field('staff_quote');
					the_content();
					?>
				</div>
			</div>
				<?php

				}
				endif;


				wp_reset_postdata();

				?>
</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();