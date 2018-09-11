
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

		<!-- MAIN CONTENT DISPLAYING -->

		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<h2 class="subheading"><?php the_field( "subheading"); ?></h2>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>

			</article>
		<?php endwhile; ?>

		<!-- RANDOM STAFF MEMEBER WILL DISPLAY THAT SHARES THE SAME CATEGORY AS THE PAGE WE ARE ON -->

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
				if(is_page(array('Medical Services', 'Dental Services', 'Health Care For The Homeless', 'Health Education', 'Residency Training', 'Pharmacy', 'Nutritional Services'))) {
					if (has_post_thumbnail()) {
						the_post_thumbnail('thumbnail');
						the_title();
						the_field('staff_title');
						the_field('staff_position');
				?>
				<a class="link" href="<?php the_permalink(); ?>">Full Profile</a>
				<a class="link" href="<?php echo get_post_type_archive_link('staff'); ?>">All Staff</a>
		<?php
}
		}
			}
		endif;
		wp_reset_postdata();

		?>

		<!-- START OF ACF FOR APPOINTMENT PHONE NUMBERS -->

		<?php
		if( have_rows('appointment_phone_number') ):

		while( have_rows('appointment_phone_number') ) : the_row();

			?>

			<p><?php the_sub_field("appointment_type_with_location_name"); ?><?php the_sub_field("phone_number"); ?></p>


			<?php


		endwhile;
		endif;
		?>

		<!-- END OF LOOP-->

		<!-- START OF ACF FOR CLINIC PHONE NUMBERS -->

		<?php
		if( have_rows('clinic_contact_phone_numbers') ):

			while( have_rows('clinic_contact_phone_numbers') ) : the_row();

				?>

				<p><?php the_sub_field("clinic_name"); ?><?php the_sub_field("clinic_phone_number"); ?></p>


			<?php


			endwhile;
		endif;
		?>

		<!-- END OF LOOP-->


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
