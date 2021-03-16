<?php 
function ph_films() {
 
	$labels = array(
		'name' => _x('Films', 'post type general name'),
		'singular_name' => _x('Film', 'post type singular name'),
		'add_new' => _x('Add New Film', 'Film item'),
		'add_new_item' => __('Add New Film'),
		'edit_item' => __('Edit Film'),
		'new_item' => __('New Film'),
		'view_item' => __('View Film'),
		'search_items' => __('Search Films'),
		'not_found' =>  __('No Films found'),
		'not_found_in_trash' => __('No Films found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array("slug" => "films"),
		'menu_position' => 3,
		'supports' => array('title','editor','thumbnail','excerpt'),
		'menu_icon' => 'dashicons-format-video',
	  ); 
 	
	if (class_exists('MultiPostThumbnails')) {
	        new MultiPostThumbnails(array(
	        'label' => 'Cover',
	        'id' => 'secondary-image',
	        'post_type' => 'film'
	        )
	    );
	        new MultiPostThumbnails(array(
	        'label' => 'Films Page Image',
	        'id' => 'secondary-image-2',
	        'post_type' => 'film'
	        )
	    );
	}

	register_post_type( 'Film' , $args );
}
add_action('init', 'ph_films');
register_taxonomy("type", array("film"), array("hierarchical" => true, "label" => "Types", "singular_label" => "Type", "rewrite" => true));



add_action("admin_init", "phf_meta_init");
function phf_meta_init(){
  	add_meta_box("phf_year", "Year", "phf_year", "Film", "side", "high");
	add_meta_box("phf_video", "Videos", "phf_video", "Film", "side", "low");	
  	add_meta_box("phf_credits", "Credits", "phf_credits", "Film", "advanced", "low");
	add_meta_box("phf_publicity", "Publicity", "phf_publicity", "Film", "advanced", "low");
	add_meta_box("phf_reviews", "Reviews", "phf_reviews", "Film", "advanced", "low");
	add_meta_box("phf_featuring", "Featuring", "phf_featuring", "Film", "advanced", "low");
	add_meta_box("phf_color", "Colors", "phf_color", "Film", "side", "low");
	add_meta_box("phf_price", "Purchase Options", "phf_price", "Film", "side", "low");
	//echo '<input type="hidden" name="ph_nonce" value="' . wp_create_nonce(__FILE__) . '" />';
}

function phf_year(){
  global $post;
	$custom = get_post_custom($post->ID);
	$ph_year = $custom["ph_year"][0];
	?>
	<label>Year</label>
	<input name="ph_year" value="<?php echo $ph_year; ?>" />
	<?php
}

function phf_video() {
  global $post;
	$custom = get_post_custom($post->ID);
	$video = $custom["video"][0];
	?>
	<label>URL:</label>
	<input name="video" value="<?php echo $video; ?>" style="width: 500px;"/>
	<?php
}

function phf_credits() {
  global $post;
	$custom = get_post_custom($post->ID);
	$credits = $custom["credits"][0];
	?>
	<div class="customEditor"><label>Credits:</label><br />
	<textarea cols="70" rows="5" name="credits"><?php echo $credits; ?></textarea></div>
	<?php
}
function phf_publicity() {
  global $post;
	$custom = get_post_custom($post->ID);
	$publicity = $custom["publicity"][0];
	?>
	<div class="customEditor"><label>Publicity:</label><br />
	<textarea cols="70" rows="5" name="publicity"><?php echo $publicity; ?></textarea></div>
	<?php
}

function phf_reviews() {
  global $post;
	$custom = get_post_custom($post->ID);
	$reviews = $custom["reviews"][0];
	?>
	<p><label>Reviews:</label><br />
	<textarea cols="70" rows="5" name="reviews"><?php echo $reviews; ?></textarea></p>
	<?php
}

function phf_featuring() {
  global $post;
	$custom = get_post_custom($post->ID);
	$featuring = $custom["featuring"][0];
	?>
	<p><label>Featuring:</label><br />
	<textarea cols="70" rows="5" name="featuring"><?php echo $featuring; ?></textarea></p>
	<?php
}

function phf_color() {
  global $post;
	$custom = get_post_custom($post->ID);
	$custom2 = get_post_custom($post->ID);
	$custom3 = get_post_custom($post->ID);
	$color = $custom["color"][0];
	$color2 = $custom2["color2"][0];
	$color3 = $custom3["color3"][0];
	?>
	<label>HEX:</label><input name="color" value="<?php echo $color; ?>" /><br />
	<label>HEX:</label><input name="color2" value="<?php echo $color2; ?>" /><br />
	<label>HEX:</label><input name="color3" value="<?php echo $color3; ?>" />
	<?php
}
function phf_price() {
  global $post;
	$custom = get_post_custom($post->ID);
	$custom2 = get_post_custom($post->ID);
	$custom3 = get_post_custom($post->ID);
	$custom4 = get_post_custom($post->ID);

	$price = $custom["price"][0];
	$price2 = $custom2["price2"][0];
	$price3 = $custom3["price3"][0];
	$price4 = $custom4["price4"][0];

	?>
	<p>Price:  (no dollar sign)</p>
	<label>Personal:</label><input name="price" value="<?php echo $price; ?>" /><br />
	<label>Library:</label><input name="price2" value="<?php echo $price2; ?>" /><br />
	<label>University:</label><input name="price3" value="<?php echo $price3; ?>" /><br />
	<p>Vendor/Distributor</p>
	<label>URL:</label><input name="price4" value="<?php echo $price4; ?>" /><br />
	<?php
}

add_action('save_post', 'phf_meta_save');
function phf_meta_save(){

	global $post;

  if( $post->post_type == 'film' )  {
  	if (isset( $_POST ) ) {
  		update_post_meta($post->ID, "ph_year", $_POST["ph_year"]);
  		update_post_meta($post->ID, "video", $_POST["video"]);
  		update_post_meta($post->ID, "credits", $_POST["credits"]);
  		update_post_meta($post->ID, "publicity", $_POST["publicity"]);
  		update_post_meta($post->ID, "featuring", $_POST["featuring"]);
  		update_post_meta($post->ID, "reviews", $_POST["reviews"]);	
  		update_post_meta($post->ID, "color", $_POST["color"]);
  		update_post_meta($post->ID, "color2", $_POST["color2"]);
  		update_post_meta($post->ID, "color3", $_POST["color3"]);
  		update_post_meta($post->ID, "price", $_POST["price"]);
  		update_post_meta($post->ID, "price2", $_POST["price2"]);
  		update_post_meta($post->ID, "price3", $_POST["price3"]);
  		update_post_meta($post->ID, "price4", $_POST["price4"]);
  	}
  }
}


add_action('manage_film_posts_custom_column', 'manage_film_columns', 10, 2);
function manage_film_columns($column_name, $id) {
	global $wpdb;
	switch ($column_name) {
	case 'id':
		echo $id;
	        break;
	case "thumbnail":
		echo the_post_thumbnail('small');
			break;
	case "cover":
		echo MultiPostThumbnails::the_post_thumbnail_thumb('film', 'secondary-image'); 
			break;
	case 'images':
		$num_images = $wpdb->get_var($wpdb->prepare("SELECT COUNT(*) FROM $wpdb->posts WHERE post_parent = %d", $id ));

		echo $num_images; 
		break;
	default:
		break;
	} 
}
add_filter('manage_edit-film_columns', 'add_new_film_columns');
function add_new_film_columns($film_columns) {
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = __('Film Name', 'column name');
	$new_columns['images'] = __('Images');
	$new_columns['thumbnail'] = __('thumbnail');
	$new_columns['cover'] = __('cover');
	$new_columns['date'] = __('Date', 'column name');
	return $new_columns;
}



add_action( 'admin_head', 'phf_icons' );
function phf_icons() { ?>
    <style type="text/css" media="screen">
    #icon-edit.icon32-posts-film {background: url(<?php bloginfo('template_url') ?>/img/film-icon.png) no-repeat;}
    </style>
<?php }

add_action('admin_print_footer_scripts','my_admin_print_footer_scripts',99);
function my_admin_print_footer_scripts()
{
    ?><script type="text/javascript">/* <![CDATA[ */
        jQuery(function($)
        {
            var i=1;
            $('.customEditor textarea').each(function(e)
            {
                var id = $(this).attr('id');
 
                if (!id)
                {
                    id = 'customEditor-' + i++;
                    $(this).attr('id',id);
                }
 
                tinyMCE.execCommand('mceAddControl', false, id);
 
            });
        });
    /* ]]> */</script><?php
}

add_action("template_redirect", 'ph_redirect');
function ph_redirect(){
	global $wp;
	global $wp_query;
	global $post;	
	if (isset($wp->query_vars["post_type"]) && $wp->query_vars["post_type"] != 'post' && $wp->query_vars["post_type"] != 'page') :
		if ( file_exists(TEMPLATEPATH . '/' . $wp->query_vars["post_type"] . '.php') ) :
			$ph_template = TEMPLATEPATH . '/' . $wp->query_vars["post_type"] . '.php';
		elseif 	( file_exists(TEMPLATEPATH . '/t_' . $wp->query_vars["post_type"] . '.php') ) :
			$ph_template = TEMPLATEPATH . '/t_' . $wp->query_vars["post_type"] . '.php';
		endif;
		if(isset($ph_template)) :
			if (have_posts()) :
				include($ph_template);
				die();
			else :
				$wp_query->is_404 = true;
			endif;
		endif;
	endif;
}
?>