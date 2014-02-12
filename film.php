<?php get_header(); ?>
<div id="film-wrap">
	<div class="container film-container">
		<div class="row">
			<div class="film-page">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="sixcol">
						<h2><?php the_title(); ?></h2>
						<h5><?php the_date('Y'); ?></h5>							
						<div class="film-media">
						<h3><?php global $post; $id = $post->ID; echo get_post_meta($id, 'year', true);?></h3>
						<?php if ( get_post_meta($post->ID, 'video', true) ) : ?>					
						<a class="video" href="<?php echo get_post_meta($post->ID, 'video', true) ?>">
						<img class="play" src="<?php echo get_template_directory_uri(); ?>/img/play.png" alt="play"/>
						<?php endif; ?>	
							<?php the_post_thumbnail( 'film' ); ?>
						<?php if ( get_post_meta($post->ID, 'video', true) ) : ?>	
						</a>
						<?php endif; ?>
						</div>
						<div class="sixcol">
						<div class="cover">
							<?php if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail('film', 'secondary-image')) : MultiPostThumbnails::the_post_thumbnail('film', 'secondary-image'); endif; ?>
						</div>
						</div>
						<div class="sixcol">
						<div class="purchase-options">
							<?php $price = get_post_meta($post->ID, 'price', true); if ($price) { ?>
							<div class="store-item">
								<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
								<input type="hidden" name="on0" value="Format">
								<select name="os0">
									<?php $price = get_post_custom_values('price'); if (!empty($price[0])) { ?><option value="Personal DVD">Personal DVD <?php echo get_post_meta($post->ID, 'price', true) ?></option><?php } ?>
									<?php $price2 = get_post_custom_values('price2'); if (!empty($price2[0])) { ?><option value="Library DVD">Library DVD <?php echo get_post_meta($post->ID, 'price2', true) ?></option><?php } ?>
									<?php $price3 = get_post_custom_values('price3'); if (!empty($price3[0])) { ?><option value="University DVD">University DVD <?php echo get_post_meta($post->ID, 'price3', true) ?></option><?php } ?>
								</select>
								<input type="submit" value="Add to Cart" border="0" name="submit">							
								<input type="hidden" name="add" value="1">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="business" value="sales@phfilms.com">
								<input type="hidden" name="item_name" value="<?php the_title() ?>">
								<input type="hidden" name="item_number" value="xxxx">
								<input type="hidden" name="option_select0" value="Personal DVD">  
								<input type="hidden" name="option_amount0" value="<?php echo get_post_meta($post->ID, 'price', true) ?>">
								<input type="hidden" name="option_select1" value="Library DVD">  
								<input type="hidden" name="option_amount1" value="<?php echo get_post_meta($post->ID, 'price2', true) ?>">
								<input type="hidden" name="option_select2" value="University DVD">  
								<input type="hidden" name="option_amount2" value="<?php echo get_post_meta($post->ID, 'price3', true) ?>">
								<input type="hidden" name="return" value="http://www.phfilms.com/index.php/completedpayment/">
								<input type="hidden" name="cancel_return" value="http://www.phfilms.com/index.php/cancelledpayment/">
								<input type="hidden" name="currency_code" value="USD">
								<input type="hidden" name="lc" value="US">
								</form>
							</div>
							<?php } else { ?>
							<?php } ?>
							<div class="purchase-links">
								<?php $price4 = get_post_meta($post->ID, 'price4', true); if ($price4) { ?>
								<br /><br /><br />
								<p>Available via: &#8595;</p>
								<ul>
								<li><a href="<?php echo get_post_meta($post->ID, 'price4', true) ?>" target="_blank"><?php echo get_post_meta($post->ID, 'price4', true) ?></a></li>
								</ul>
								<?php } ?>
							</div>
						</div>
							
						</div>					
					</div>
					<div class="sixcol">
						<article>
							<ul class="tabs">
								<li><a href="#summary">Summary</a></li>
						     	<li><a href="#credits">Credits</a></li>
								<?php if ( get_post_meta($post->ID, 'publicity', true) ) : ?>
						     	<li><a href="#media">Publicity</a></li>
								<?php endif; ?>
						   </ul>					
							<ul class="tabs-content">
								<li class="active" id="summary">
									<?php the_content(); ?>
								</li>
								<li id="credits">
									<?php if ( get_post_meta($post->ID, 'credits', true) ) : ?>
									   <?php echo get_post_meta($post->ID, 'credits', true) ?>
									<?php endif; ?>
								</li >
								<li id="media">			
									<?php if ( get_post_meta($post->ID, 'publicity', true) ) : ?>
									   <?php echo get_post_meta($post->ID, 'publicity', true) ?>
									<?php endif; ?>
									
								</li>
							</ul>
						</article>
					</div>
				<?php endwhile; endif;?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>