<?php get_header(); ?>
	<div class="container">
    <div class="search-results">
  		<div class="row">
  			<div class="twocol">
  			&nbsp;
  			</div>
  			<div class="eightcol">
  			<?php if ( have_posts() ) : ?>
  				<header class="page-header">
  					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', '_ph' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
  				</header>
  				<?php while ( have_posts() ) : the_post(); ?>
  					<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', '_ph' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  					<div class="entry-meta">
  						<?php _ph_posted_on(); ?>
  					</div>
  				<?php the_excerpt(); ?>
  				<?php endwhile; ?>
  				<?php else : ?>
  				<article id="post-0" class="post no-results not-found">
  					<header class="entry-header">
  						<h1 class="entry-title"><?php _e( 'Nothing Found', '_ph' ); ?></h1>
  					</header>
  					<div class="entry-content">
  						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '_ph' ); ?></p>
  					</div>
  				</article>
  				<?php endif; ?>
  			</div>
  			<div class="twocol">
  			&nbsp;
  			</div>
  		</div>
    </div>
	</div>
<?php get_footer(); ?>