<?php get_header(); ?>
<div id="press-wrap">
<div class="container">
	<div class="row journal">
		<div class="twelvecol">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'single' ); ?>
				<?php if ( comments_open() || '0' != get_comments_number() ) comments_template( '', true ); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>
</div>
<?php get_footer(); ?>