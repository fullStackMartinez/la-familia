<?php
/**
 * Template Name: Sponsor Page
 */


get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- START OF ARCHIVE LOOP FOR CPT STAFF -->
			<section class="wrapper">
				<?php
				$args = array(
					'post_type' => 'sponsors',
					'posts_per_page' => -1,
					'orderby' => 'date',
				);

				//Loop through Custom Post Type 'Sponsors'


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
								echo '<p>' . wp_trim_words(get_the_content(), 30) . '</p>';
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