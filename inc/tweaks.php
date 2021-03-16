<?php

function phf_fromemail($email) {
	//$wpfrom = get_option('admin_email');
    //return $wpfrom;
	return 'david@phfilms.com';
}
 
function phf_fromname($email){
   	//$wpfrom = get_option('blogname');
    //return $wpfrom;
	return 'PHFilms.com';
}

add_filter('wp_mail_from', 'phf_fromemail');
add_filter('wp_mail_from_name', 'phf_fromname');

function _ph_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', '_ph_page_menu_args' );


function _ph_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter( 'body_class', '_ph_body_classes' );


function _ph_enhanced_image_navigation( $url, $id ) {
	if ( ! is_attachment() && ! wp_attachment_is_image( $id ) )
		return $url;
	$image = get_post( $id );
	if ( ! empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';
	return $url;
}
add_filter( 'attachment_link', '_ph_enhanced_image_navigation', 10, 2 );

function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

add_action('init', 'ph_head_cleanup');
function ph_head_cleanup() {
  remove_action('wp_head', 'feed_links');
  remove_action('wp_head', 'feed_links', 2 );
  remove_action('wp_head', 'feed_links_extra');
  remove_action('wp_head', 'feed_links_extra', 3 );
  remove_action('wp_head', 'rsd_link');
  remove_action('wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'index_rel_link');
  remove_action('wp_head', 'parent_post_rel_link');
  remove_action('wp_head', 'start_post_rel_link');
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
  remove_action('wp_head', 'wp_generator');
  remove_action('wp_head', 'wp_shortlink_wp_head');
  remove_action('wp_head', 'rel_canonical');
}

add_action('admin_menu', 'remove_menus');
function remove_menus () {
global $menu;
//	$restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Users'), __('Settings'), __('Comments'), __('Plugins'));
	$restricted = array();
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}

add_action('login_head', 'phf_login_logo');
function phf_login_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_bloginfo('template_directory').'/img/phf_login.png) !important; width: 326px;background-size:326px 67px;}
    </style>';
}

//add_action( 'admin_head', 'phf_hide' );
function phf_hide() {
    ?>
    <style type="text/css" media="screen">
    #footer {display:none;}
	/* #screen-meta-links {display: none;} */
	#wpadminbar {display: none;}
	body.admin-bar #wpcontent, body.admin-bar #adminmenu {padding-top:0;}
	html.wp-toolbar{padding-top:0;}
	#postexcerpt p {display: none;}
    </style>
<?php }

add_filter( 'script_loader_src', 'remove_src_version' );
add_filter( 'style_loader_src', 'remove_src_version' );
function remove_src_version ( $src ) {
  global $wp_version;
  $version_str = '?ver='.$wp_version;
  $version_str_offset = strlen( $src ) - strlen( $version_str );
  if( substr( $src, $version_str_offset ) == $version_str )
    return substr( $src, 0, $version_str_offset );
  else
    return $src;
}


add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
function remove_dashboard_widgets(){
  global$wp_meta_boxes;
  unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
  //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); 
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); 
  unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); 
}

function ph_rss_output(){
    echo '<div class="rss-widget">'; 
       wp_widget_rss_output(array(
            'url' => 'http://phfilms.com/feed/', 
            'title' => 'PHFilms.com',
            'items' => 4, 
            'show_summary' => 1,
            'show_author' => 0,
            'show_date' => 1
       ));
       echo "</div>";
}

add_action('wp_dashboard_setup', 'ph_rss_widget');
function ph_rss_widget(){
  wp_add_dashboard_widget( 'ph-rss', 'PHFilms', 'ph_rss_output');
}

function ph_editor_styles() {
    add_editor_style( 'style.css' );
}
//add_action( 'init', 'ph_editor_styles' );

?>