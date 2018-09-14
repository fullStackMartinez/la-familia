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

			<div class="articles">
				<ul class="articles-list">
					<?php

					$myposts = get_posts( array('orderby' => 'date', 'posts_per_page' => 4) );

					if(!empty($myposts)) {
						foreach($myposts as $post) : setup_postdata($post); ?>
							<li>
								<div class="article-summary">
									<?php
									if(has_post_thumbnail()) {
										the_post_thumbnail('article');
									}
									?>
								</div>
								<div class="article-summary2">
									<a href="<?php the_permalink(); ?>">
										<div class="article-title"><?php the_title(); ?></div>
									</a>
									<?php the_excerpt(50); ?>
									<p><a class="link2" href="<?php the_permalink(); ?>">More &#62;</a></p>

								</div>

							</li>
						<?php endforeach;
					}
					wp_reset_postdata();?>
				</ul>
			</div>



		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
