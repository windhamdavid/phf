<?php /* Template Name: History*/ ?>
<?php get_header(); ?>
<div id="press-wrap">
<div class="container">
	<div class="row">
		<div class="history">
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
		<div class="sixcol">
			<header class="entry-header">
				<h1><?php the_title(); ?></h1>
			</header>
				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
					<div style="float:left;margin: 0 20px 20px 0;max-width:100%;">
					<?php the_post_thumbnail('large');?>
					</div>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; endif;?>
		</div>
		<div class="sixcol">
			<article>
			<div class="top-pad page">
				<?php the_content(); ?>
			</div>
			</article>
		</div>
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>