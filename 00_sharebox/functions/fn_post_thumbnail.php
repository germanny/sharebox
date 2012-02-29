<?php
function global_default_photo(){
	global $default_photo;
	$default_photo = get_template_directory_uri().'/images/logos/logo_facebook.jpg';
	return $default_photo;
}
function jg_post_thumbnail_src($size = thumbnail) { //get the src of first image
	global $post;

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1] [0];
	$custom_image = get_post_meta($post->ID, 'custom_image_value', TRUE);
	if (has_post_thumbnail( $post->ID ) ) { 
		$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $size );
	}
	if($images = get_children(array(
  	'post_type'      => 'attachment',
  	'post_parent'    => get_the_ID(),
  	'post_mime_type' => 'image',
  	'post_status'    => null,
  	'numberposts'    => 1,
	))) {
		foreach($images as $image) {
			$atturl   = wp_get_attachment_image_src($image->ID, $size); // Get attachment image URL
		}
	}
	
	if ($featured_image) { // author sets a specific Featured Image
		return $featured_image[0];
	} elseif ($custom_image) { // theme has a Custom Field for "custom_image_value" and author sets the url
		return $custom_image; 
	} elseif ($atturl) { // author has uploaded various image attachments, and may or may not have put them in the content
		return $atturl[0]; 
	} elseif ($first_img) { // author put an image in the content area that is not an attachment (???)
		return $first_img; 
	} else { // there just isn't any images anywhere in the post, and a default image is what we need
		global_default_photo();
	}
}

function jg_post_thumbnail(){ //creates an img tag for use in post lists
    if ($src = jg_post_thumbnail_src()) {
		echo '<a href="'. get_permalink() .'" title="Permanent Link to '. get_the_title() .'" class="post-thumb"><img src="'. $src . '" alt="'. get_the_title().'"></a>';
	}
}
?>