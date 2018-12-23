<?php
/**
 * Template Name: Home
 */ ?>

<?php get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="slider-container">


				<img src="<?php echo get_template_directory_uri() . '/img/hero-image.png'; ?>"/>
			</div>

			<!--<div class="home-slideshow">
				<ul>
					<?php $images = get_field('slideshow');
			while(have_rows('slideshow')) : the_row(); ?>
						<li>
							<?php $image = get_sub_field('image'); ?>
							<a class="link" href="<?php the_sub_field('link'); ?>">
								<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt']; ?>" />
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
				<div class="nav-boxes">
					<?php for($i = 0; $i < count($images); $i++) { ?>
						<a href="javascript:void"></a>
					<?php } ?>
				</div>
				<div class="slideshow-logo"></div>
			</div>

			<!--     Start of Additional Info/Content Section  -->
			<img src="<?php echo get_template_directory_uri() . '/img/lower-curve-whole.png'; ?>"
				  class="lower-shadow-image"/>
			<section id="home-content">
				<div class="left-content">
					<h4>Did You Know?</h4>
					<p>There are many variations of passages of Lorem Ipsum available</p>
				</div>
				<div class="main-content">
					<h3 class="content-title"><?php the_title(); ?></h3>
					<?php
					// TO SHOW THE PAGE CONTENTS
					while(have_posts()) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
						<div class="entry-content-page">
							<?php the_content(); ?> <!-- Page Content -->
						</div><!-- .entry-content-page -->

					<?php
					endwhile; //resetting the page loop
					wp_reset_query(); //resetting the page query
					?>
				</div>
				<div class="right-content">
					<h4>Did You Know?</h4>
					<p>There are many variations of passages of Lorem Ipsum available</p>
				</div>

			</section>
			<div class="separator"></div>

			<!--    Start of the ACF loop on selected Pages/Post  -->

			<section class="home-loop">

				<?php if(have_rows('add_page')): ?>

					<ul class="list">

						<?php while(have_rows('add_page')) : the_row(); ?>

							<li>

								<?php $post_object = get_sub_field('page_to_show_on_front_page'); ?>

								<?php if($post_object): ?>

									<?php $post = $post_object;
									setup_postdata($post); ?>
									<div class="field-loop">
										<div class="loop-content">
											<h1><?php the_title(); ?></h1>
											<?php echo '<p>' . wp_trim_words(get_the_content(), 60) . '</p>'; ?>
										</div>
										<div class="arrow-image">
											<img src="<?php echo get_template_directory_uri() . '/img/article-arrow.png'; ?>"/>

										</div>

									</div>
									<?php wp_reset_postdata(); ?>

								<?php endif; ?>

							</li>

						<?php endwhile; ?>

					</ul>

				<?php endif; ?>

			</section>

			<!--    End of ACF loop    -->

			<!--     START OF SPONSOR LOOP/SLIDER -->


			<!--     END OF SPONSOR LOOP/SLIDER  -->


		</main>
	</div>

<?php get_footer(); ?>