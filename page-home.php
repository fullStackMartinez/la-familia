<?php
/**
 * Template Name: Home
 */?>

<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">


		<!--    BEGINNING OF NEWS POST LOOP     -->

		<div class="articles">
			<ul class="articles-list">
				<?php

				$myposts = get_posts( array('orderby' => 'date', 'posts_per_page' => 4) );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<li>
						<div class="article-summary">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('article');
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' )
									. '/img/article-thumb.jpg" />';
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
				wp_reset_postdata();?>
			</ul>
		</div>

		<!--     END OF NEWS LOOP    -->






	</main>
</div>

<?php get_footer(); ?>