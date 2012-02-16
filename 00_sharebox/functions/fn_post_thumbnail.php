<?php
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
			$atturl   = wp_get_attachment_image_src($image->ID, $size); // Get attachment thumbail image URL
		}
	}
	
	if ($featured_image) { // author sets a specific Featured Image
		$the_first_image = $featured_image[0];
	} elseif ($custom_image) { // theme has a Custom Field for "custom_image_value" and author sets the url
		$the_first_image = $custom_image; 
	} elseif ($atturl) { // author has uploaded various image attachments, and may or may not have put them in the content
		$the_first_image = $atturl[0]; 
	} elseif ($first_img) { // author put an image in the content area that is not an attachment (???)
		$the_first_image = $first_img; 
	} else { // there just isn't any images anywhere in the post, and a default image is what we need
		$the_first_image = get_template_directory_uri().'/images/photo-featured-default.jpg';
	}
	return $the_first_image;
}

function jg_post_thumbnail(){ //creates an img tag for use in post lists
	$the_featured_image = '<img src="'. jg_post_thumbnail_src() . '" alt="'. get_the_title().'">';
	echo $the_featured_image;
}
?>