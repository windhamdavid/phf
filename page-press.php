<?php /* Template Name: Press */ ?>
<?php get_header(); ?>
<div id="press-wrap">
<div class="container">
  <div class="press-container">
  	<div class="row journal">
  		<div class="twelvecol">
  			<?php query_posts( array ( 'paged' => get_query_var('paged') ) ); ?>
  			<?php if ( have_posts() ) : ?>
  			<?php while ( have_posts() ) : the_post(); ?>
  				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
  					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
  					<time datetime="<?php the_time('Y-m-d')?>"><?php the_time('F jS, Y') ?></time>
  					<?php the_content(); ?>
  					<?php the_tags('Tags: ', ', ', '<br />'); ?> 
  				</article>
  			<?php endwhile; endif;?>			
  			<div class="page-navigation">
  				<div class="next">
  	       		 	<?php previous_posts_link('More Recent') ?> 	
  				</div>
  				<div class="previous">	   
  					<?php next_posts_link('Older') ?>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</div>
</div>
<?php get_footer(); ?>