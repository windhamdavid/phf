<?php

if ( ! function_exists( '_ph_setup' ) ):
function _ph_setup() {
	require( get_template_directory() . '/inc/films-cpt.php' );
	require( get_template_directory() . '/inc/template-tags.php' );
	require( get_template_directory() . '/inc/multi-thumbs.php' );
	require( get_template_directory() . '/inc/tweaks.php' );
	add_theme_support( 'automatic-feed-links' );
	register_nav_menus( array( 'primary' => __( 'Primary Menu', '_ph' ), ) );	
	add_theme_support( 'post-formats', array( 'aside', ) );	
}
endif; 
add_action( 'after_setup_theme', '_ph_setup' );

add_action( 'wp_enqueue_scripts', '_ph_scripts' );
function _ph_scripts() {
	global $post;
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'style-2', get_template_directory_uri() . '/css/responsive.css');
	//wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', 'jquery', '20120206', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		// wp_enqueue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		// wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}



add_filter('show_admin_bar', '__return_false');

add_post_type_support('page', 'excerpt');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 600, 360, true );
add_image_size( 'slide', 600, 300, true );
add_image_size( 'film', 600, 400 );
add_image_size( 'cover', 250, 500 );
add_image_size( 'spotlight', 300, 640, true );
add_image_size( 'press', 200, 100, true );
add_image_size( 'small', 75, 75, true );
add_image_size( 'medium', 800, 600, true );
add_image_size( 'large', 1200, 800, true );

function ph_thumbs() {
    global $post;
    $post = get_post($post);
	$images =& get_children( 'post_type=attachment&post_mime_type=image&output=ARRAY_N&order=ASC&post_parent='.$post->ID);
	if($images){
	foreach( $images as $imageID => $imagePost ){
	unset($the_ph_img);
	$the_ph_img = wp_get_attachment_image($imageID, 'small', false);
	$thumblist = '<a class="film-link" href="'.get_attachment_link($imageID).'">'.$the_ph_img.'</a>';
	
	}
  }
return $thumblist;
}
function tinymce_excerpt_js(){ ?>
<script type="text/javascript">
        jQuery(document).ready( tinymce_excerpt );
            function tinymce_excerpt() {
                jQuery("#excerpt").addClass("mceEditor");
                tinyMCE.execCommand("mceAddControl", false, "excerpt");
            }
</script>
<?php }
add_action( 'admin_head-post.php', 'tinymce_excerpt_js');
add_action( 'admin_head-post-new.php', 'tinymce_excerpt_js');
function tinymce_css(){ ?>
<style type='text/css'>
            #postexcerpt .inside{margin:0;padding:0;background:#fff;}
            #postexcerpt .inside p{padding:0px 0px 5px 10px;}
            #postexcerpt #excerpteditorcontainer { border-style: solid; padding: 0; }
</style>
<?php }
add_action( 'admin_head-post.php', 'tinymce_css');
add_action( 'admin_head-post-new.php', 'tinymce_css');