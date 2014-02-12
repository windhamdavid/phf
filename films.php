<?php /* Template Name: Films */ ?>
<?php get_header(); ?>

	<div class="container films">
		<div class="row">
			<div id="sort">
				<div class="more-press">
				<a href="../year">Sort Films by Year</a>
			</div>
			</div>	
		</div>
		<div class="row">
			<?php query_posts( array (  'orderby' => 'title','order' => 'ASC','post_type' => 'Film','posts_per_page' => 53 ) ); ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="threecol">
				<div class="film">					
					<a href="<?php the_permalink() ?>" class="rollover" title="<?php the_title();?>"><?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('film', 'secondary-image-2')) : MultiPostThumbnails::the_post_thumbnail('film', 'secondary-image-2'); endif; ?></a>
					<h3><a href="<?php the_permalink() ?>" class="rollover" title="<?php the_title();?>"><?php the_title() ?></a></h3>
					<p class="date"><?php echo get_the_date('Y'); ?></p>
					<div class="slidingbox" id="slidingbox">
						<p><?php the_excerpt();?></p>
					</div>
					
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>

<?php get_footer(); ?>