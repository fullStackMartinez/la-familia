<?php
/**
 *
 * template name: archive
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package La_Familia
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<!-- HEADER WITH PAGE TITLE AND DESCRIPTION-->

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
<!-- START OF LOOP THAT WILL DISPLAY STAFF TYPE BASED ON THEIR CATEGORY AND THE CATEGORY OF THE PAGE -->

			<?php
				$category_main = get_the_category();
				$cat_slug = $category_main[0]->slug; ?>
				<?php $args1 = array(
					'post_type' => 'staff',
					'posts_per_page' => -1,
					'category_name' => $cat_slug,

				);

				$loop = new WP_Query($args1);
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

			<!-- END OF LOOP -->





		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
