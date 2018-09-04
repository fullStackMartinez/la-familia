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



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
