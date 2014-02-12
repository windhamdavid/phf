<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="404">
				<div class="eightcol centered">
					<article id="post-0" class="post error404 not-found">
						<header class="entry-header">
							<h1>Error 404</h1>
							<p>Nothing to see here</p>
						</header>
						<div class="entry-content">
							<?php get_search_form(); ?>
							<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
						</div>
					</article>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>