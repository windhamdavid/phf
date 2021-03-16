<?php get_header(); ?>

	<div id="slider-wrap">
		<div class="container">
			<div class="row">
				<div class="twelvecol slides">		
					<div class="slided" data-autorotate="4000">
						<ul class="slider">
						<?php query_posts( array ( 'orderby' => 'date', 'post_type' => 'Film','posts_per_page' => 53 ) ); ?>
						<?php while (have_posts()) : the_post(); ?>
							<li class="slide">					
								<a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('slide');} ?></a>
								<h1 class="film-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>			
								<?php the_date('Y', '<h3>', '</h3>'); ?>
								<?php the_excerpt(); ?>
							</li>
						<?php endwhile; ?>			
						</ul>
					</div>			
				</div>
			</div>
		</div>
	</div>

	<div class="container front">
		<!--<div class="row">
			<div class="eightcol">
				<h2 class="col-title" style="color:#777;text-align:center;">&nbsp;</h2>
			</div>
			<div class="fourcol last">
				<h1 class="josefin-head" style="color:#777;text-align:center;">DVD HIGHLIGHT</h1>
			</div>
		</div>-->
		<div class="row">
			<div class="fourcol">
				<div class="press">
					<?php query_posts( array ( 'category_name' => 'Press', 'posts_per_page' => 5 ) ); ?>
					<?php while (have_posts()) : the_post(); ?>
					<article>
						<a href="<?php the_permalink() ?>" class="rollover" title="<?php the_excerpt();?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?></a>
						<h3 class="josefin"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>
						<?php the_excerpt();?>
					</article>
					<?php endwhile; ?>
				</div>
				<div class="more-press">
					<a href="press">More Press</a>
				</div>		
			</div>
			<div class="eightcol last">
				<div class="press promo-front">
					<h1 class="times"><a href="http://phfilms.com/unlocking-the-cage">Unlocking the Cage</a><br /> <span class="subtitle">a documentary by Chris Hegedus and D.A. Pennebaker</span></h1>
					<img src="<?php echo get_template_directory_uri(); ?>/img/LOGLINE.png" />
					<?php $upload_dir = wp_upload_dir();?>
					<a href="http://phfilms.com/unlocking-the-cage"><img src="<?php echo $upload_dir['baseurl']; ?>/stevenwise-250x140.jpg" class="promo-front" alt="stevenwise" /></a>
					<p>“They used to bark at me when I walked into the courtroom” says renowned animal rights attorney Steven Wise. After 30 years of preparation, Steve and his legal team, the Nonhuman Rights Project (NhRP), are making history by filing the first lawsuits to transform an animal from a thing with no rights to a person with legal protections.</p>
					<p><a href="http://phfilms.com/unlocking-the-cage"><strong>Unlocking the Cage</strong></a> documents Steve’s unprecedented legal challenge to break down the wall that separates animals from humans. Steve argues that based on scientific evidence cognitively complex animals such as chimpanzees, whales, dolphins, and elephants have the capacity for fundamental personhood rights (such as bodily liberty) that would protect them from physical abuse. For the past two years, we have followed Steve and his team on their journey, from developing their legal strategy to discovering the perfect chimpanzee plaintiffs confined in private homes and roadside zoos. &nbsp;<a href="http://phfilms.com/unlocking-the-cage"><strong>Read On</strong></a></p>
					<div class="btm-border">&nbsp;</div>
				</div>
			</div>
			<div class="fourcol">
				<div class="press">
					<?php query_posts( array ( 'category_name' => 'Press', 'offset'=> 5, 'posts_per_page' => 4 ) ); ?>
					<?php while (have_posts()) : the_post(); ?>
					<article>
						<a href="<?php the_permalink() ?>" class="rollover" title="<?php the_excerpt();?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail();} ?></a>
						<h3 class="josefin"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>
						<?php the_excerpt();?>
					</article>
					<?php endwhile; ?>
				</div>		
			</div>
			<div class="fourcol last">
				<div class="press">
					<?php query_posts( array ( 'cat' => 50, 'posts_per_page' => 1 ) ); ?>
					<?php while (have_posts()) : the_post(); ?>
					<article>
						<a href="<?php the_permalink() ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('spotlight');} ?></a>
						<div class="clear">&nbsp;</div>
						<!--<h3 class="josefin"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title() ?></a></h3>-->
						<?php the_excerpt();?>
					</article>
					<?php endwhile; ?>
					<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fphfilms&amp;height=380&amp;show_faces=false&amp;colorscheme=light&amp;stream=true&amp;show_border=false&amp;header=true" style="border:none; overflow:hidden; width:100%; height:350px;"></iframe>
					<div class="social-tweet">
						<a class="twitter-timeline" href="https://twitter.com/PHFilms" data-widget-id="345670204174503936">Tweets by @PHFilms</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>				
				</div>
			</div>
		</div><!-- row -->
	</div>

<?php get_footer(); ?>