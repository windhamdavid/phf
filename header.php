<?php ?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', '_ph' ), max( $paged, $page ) ); ?></title>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script><![endif]-->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url();?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body>
<div id="header-wrap">
	<header>
		<div class="container">
			<div class="row">
				<div class="twelvecol">
					<h1 class="josefin title"><a href="<?php echo home_url( '/' ); ?>">PENNEBAKER HEGEDUS FILMS</a></h1>	
					<nav><h2 class="josefin"><a href="<?php echo home_url( '/' ); ?>films">FILMS</a> | <a href="<?php echo home_url( '/' ); ?>history">HISTORY</a> | <a href="<?php echo home_url( '/' ); ?>press">PRESS</a> | <a href="<?php echo home_url( '/' ); ?>license">LICENSING</a> | <a href="<?php echo home_url( '/' ); ?>store">STORE</a></h2></nav>
				</div>
			</div>
		</div>
	</header>
</div>