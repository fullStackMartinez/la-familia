<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package La_Familia
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<h2 class="subheading"><?php the_field( "subheading"); ?></h2>
				<div class="entry-content">
			<?php the_content(); ?>
				</div>

				</article>
			<?php endwhile; ?>

<?php $category_main = get_the_category();
$cat_slug = $category_main[0]->slug; ?>
			<?php $args1 = array(
			'post_type' => 'staff',
			'posts_per_page' => 1,
			'category_name' => $cat_slug,
			'orderby' => 'rand',

			);

			$loop = new WP_Query($args1);
			if($loop->have_posts()):
			while($loop->have_posts()) {
				$loop->the_post();

				the_post_thumbnail('thumbnail');
				the_title();
				the_field('staff_title');
				the_field('staff_position');
			}

			endif;
		wp_reset_postdata();

		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
