<?php
get_header();
?>


<div id="primary" class="content-area">

	<main id="main-page" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
		<?php
the_field('staff_quote');
the_content();

endwhile;
?>

		<?php the_post_thumbnail('thumbnail'); ?>
		<?php the_title(); ?>
		<?php the_field('staff_title'); ?>
		<?php the_field('staff_position'); ?>

		<?php $args = array( 'post_type' => 'staff', 'numberposts' => -1); ?>

		<form action="<? bloginfo('url'); ?>" method="get">
			<select name="page_id" id="page_id">
				<?php
				global $post;
				$args = array( 'post_type' => 'staff', 'numberposts' => -1);
				$posts = get_posts($args);
				foreach( $posts as $post ) : setup_postdata($post); ?>
					<option value="<? echo $post->ID; ?>"><?php the_title(); ?></option>
				<?php endforeach; ?>
			</select>
			<input type="submit" name="submit" value="view" />
		</form>
	</main>
</div>
