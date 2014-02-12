<?php ?>

<div id="footer-wrap">
<footer>
	<div class="container">
		<div class="row">
			<div class="fourcol">
				<div class="info">
					<p>262 West 91st Street New York, NY 10024</p>
					<p><a href="<?php echo home_url( '/' ); ?>contact">Contact</a> | <a href="">info@phfilms.com</a></p>	
					<a href="<?php echo home_url( '/' ); ?>"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/camera.png" width="120" alt="PENNEBAKER HEGEDUS FILMS" title="PENNEBAKER HEGEDUS FILMS"/></a>
				</div>
			</div>
			<div class="twocol">

			</div>
			<div class="sixcol last">
				<div class="social">
					<p class="symbol">
						&nbsp; <a href="http://vimeo.com/phfilms" title="Vimeo" class="tooltip" target="_blank"><span class="vimeo">&nbsp;</span></a> 
						&nbsp; <a href="http://www.youtube.com/user/PennebakerHegedus" title="YouTube" class="tooltip" target="_blank"><span class="yt">&nbsp;</span></a> 
						&nbsp; <a href="http://gowatchit.com/director/D-A--Pennebaker" title="GoWatchIt" class="tooltip" target="_blank"><span class="gowatch">&nbsp;</span></a>  
						&nbsp; <a href="http://www.facebook.com/PHFilms" title="Facebook" class="tooltip" target="_blank"><span class="fb">&nbsp;</span></a> 
						&nbsp; <a href="http://twitter.com/#!/phfilms" title="Twitter" class="tooltip" target="_blank"><span class="twit">&nbsp;</span></a> 
						&nbsp; <a href="http://pennebakerhegedusfilms.tumblr.com/" title="Tumblr" class="tooltip" target="_blank"><span class="tumblr">&nbsp;</span></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.8.3.min.js"></script>
<script>window.jQuery || document.write("<script src='<?php echo get_template_directory_uri(); ?>/js/libs/jquery-1.8.3.min.js'>\x3C/script>")</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/init.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/minicart.js"></script>
<script>PAYPAL.apps.MiniCart.render();</script>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-1906067-30']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!--[if lt IE 7 ]>
  <script src="js/libs/dd_belatedpng.js"></script>
  <script>DD_belatedPNG.fix("img, .png_bg");</script>
<![endif]-->
<?php wp_footer(); ?>
</body>
</html>