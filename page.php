<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="twelvecol">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>