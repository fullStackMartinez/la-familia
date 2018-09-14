<?php
/**
 * Template Name: Home
 */ ?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<!--    BEGINNING OF NEWS POST LOOP     -->

			<div class="articles">
				<ul class="articles-list">
					<?php

					$myposts = get_posts(array('orderby' => 'date', 'posts_per_page' => 4));
					foreach($myposts as $post) : setup_postdata($post); ?>
						<li>
							<div class="article-summary">
								<?php
								if(has_post_thumbnail()) {
									the_post_thumbnail('article');
								} else {
									echo '<img src="' . get_bloginfo('stylesheet_directory')
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
					wp_reset_postdata(); ?>
				</ul>
			</div>

			<!--     END OF NEWS LOOP    -->

			<!--     Start of Additional Info/Content Section  -->

			<section id="content-section">
				<div class="content-box-1">
					<h3 class="content-title"><?php the_title(); ?></h3>
					<p class="content-p"><?php echo get_post_field('post_content', $post->ID); ?></p>
				</div>
				<div class="quicklinks-box">
					<h3 class="quicklinks-title">QUICKLINKS</h3>
					<ul>
						<?php
						if(have_rows('content_info')):

							while(have_rows('content_info')) : the_row();
								?>


								<li><a href="<?php the_sub_field("page_url"); ?>"><?php the_sub_field("link_title"); ?></a></li>


							<?php
							endwhile;
						endif;
						?>
					</ul>
				</div>
			</section>

			<!--     End of Content Section    -->

			<!--    Start of the ACF loop on selected Pages/Post  -->

			<section class="slider">

				<?php if(have_rows('add_page')): ?>

					<div id="slider" class="flexslider">

						<ul class="slides">

							<?php while(have_rows('add_page')) : the_row(); ?>

								<li>

									<?php $post_object = get_sub_field('page_to_show_on_front_page'); ?>

									<?php if($post_object): ?>

										<?php $post = $post_object;
										setup_postdata($post); ?>

										<a href="<?php the_permalink(); ?>"><img src="<?php the_field('featured_image'); ?>"
																							  alt="<?php the_title(); ?>"/></a>

										<?php wp_reset_postdata(); ?>

									<?php endif; ?>

								</li>

							<?php endwhile; ?>

						</ul>

					</div>

				<?php endif; ?>

			</section>

			<!--    End of ACF loop    -->

			<!--     START OF SPONSOR LOOP/SLIDER -->


			<!--     END OF SPONSOR LOOP/SLIDER  -->


		</main>
	</div>

<?php get_footer(); ?>