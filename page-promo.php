<?php /* Template Name: Promo */ ?>
<?php get_header(); ?>
<div id="press-wrap">
<div class="container">
	<div class="row">
		<div class="promo">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
				<header class="entry-header">
					<h1 class="times"><?php the_title(); ?> <span class="subtitle">a documentary by Chris Hegedus and D.A. Pennebaker</span></h1>
				</header>
			<div class="sixcol">
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div style="float:left;margin: 0 20px 20px 0;max-width:100%;">
					<?php the_post_thumbnail('large');?>
					</div>
					<?php the_excerpt(); ?>
				</article>
			<div id="comments" class="comments-area">
				<?php get_template_part( 'comment', 'feedback' ); ?>
			</div>
			</div>
			<div class="sixcol">
				<article>
				<div class="top-pad page">
					<?php the_content(); ?>
				</div>
				</article>
		</div>
	<?php endwhile; endif;?>
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>