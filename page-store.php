<?php /* Template Name: Store */ ?>
<?php get_header(); ?>
<div id="store-wrap">
<div class="container">
	<div class="store-page">
	<div class="row">
		<div class="tencol">
      <p style="font-size:18px;background:#feffa4;color:#f00;padding:5px 10px;">Due to Covid-19, we are temporarily unable to fulfill orders. Please check back later.</p>
		</div>
		<div class="twocol last">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" class="last buy-now"> 
				<fieldset>
					<input type="hidden" name="business" value="sales@phfilms.com" /> 
					<input type="hidden" name="cmd" value="_cart" /> 
					<input type="hidden" name="display" value="1" /> 
					<input type="submit" name="submit" value="View Your Cart" class="button" />
				</fieldset>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="twelvecol">
			<?php
			$args = array(
				'post_type' => 'film',
				'meta_query' => array(
					array(
						'key' => 'price',
						'value' => '0',
						'compare' => '>',
						'type' => 'NUMERIC'
					)
				)
			 );
			$query = new WP_Query( $args ); query_posts($args); while (have_posts()) : the_post(); ?>

				<div class="threecol">
					<div class="store-item">
						<?php if (class_exists('MultiPostThumbnails')
						    && MultiPostThumbnails::has_post_thumbnail('film', 'secondary-image')) :
						        MultiPostThumbnails::the_post_thumbnail('film', 'secondary-image'); endif; ?>
					
						<!--<h3 class="film-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>-->
						
						<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="on0" value="Format">
						<select name="os0">
							<?php $price = get_post_custom_values('price'); if (!empty($price[0])) { ?><option value="Personal DVD">Personal DVD <?php echo get_post_meta($post->ID, 'price', true) ?></option><?php } ?>
							<?php $price2 = get_post_custom_values('price2'); if (!empty($price2[0])) { ?><option value="Library DVD">Library DVD <?php echo get_post_meta($post->ID, 'price2', true) ?></option><?php } ?>
							<?php $price3 = get_post_custom_values('price3'); if (!empty($price3[0])) { ?><option value="University DVD">University DVD <?php echo get_post_meta($post->ID, 'price3', true) ?></option><?php } ?>
						</select>
						<input  class="buy-now" type="submit" value="Add to Cart" border="0" name="submit">							
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
				</div>

			<?php endwhile; ?>
		</div>
		<div class="fourcol">
			
		</div>
	</div>
	</div>
</div>
</div>
<?php get_footer(); ?>