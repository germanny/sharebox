<?php

/* CUSTOM EXCERPT
****************************************************************************************************************************************/
function jg_excerpt($length = 200, $more = 1){
	$orig = get_the_excerpt();
	$a = html_entity_decode($orig);
	$excerpt = strip_tags($a);
	$excerpt = neat_trim($excerpt,$length);

	if ($more == 1) {
?>
	<p><?php echo $excerpt; ?><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="more-link">View More</a></p>
<?php } if ($more == 2) {
	echo $excerpt;
	}
}

/* POST CUSTOM FIELDS UI
********************************************************************************************************************************/
include_once('functions/fn_post_custom_fields.php');

/* IMAGES *********************************************************************************************************************************
/* Add Post Thumbnail Images
********************************************************************************************************************************/
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 150, 150, true );

/* POST THUMBNAIL
********************************************************************************************************************************/
include_once('functions/fn_post_thumbnail.php');

?>
