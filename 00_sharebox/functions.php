<?php

/* Customize the variables here
****************************************************************************************************************************************/
define('TWITTER_USERNAME', 'TW USERNAME');
define('FB_APP_ID', '253852751385205');
define('FB_PAGE', ''); //full page URL
define('DEFAULT_PHOTO', get_template_directory_uri().'/images/logo.gif');

/* NEAT TRIM: Trim length of excerpt to certain # of words - LIMITS BY CHARACTERS TO THE NEAREST WORD
used in jg_excerpt()
****************************************************************************************************************************************/
	function neat_trim($str, $n, $delim=' &hellip;') {	
	$len = strlen($str);
	if ($len > $n) {
		preg_match('/(.{' . $n . '}.*?)\b/', $str, $matches);
		return rtrim($matches[1]) . $delim;
	}
	else {
		return $str;
	}
}

/* CUSTOM EXCERPT
****************************************************************************************************************************************/
function jg_excerpt($length = 200, $more = 1){
	$orig = get_the_excerpt();
	$a = html_entity_decode($orig);
	$excerpt = strip_tags($a);
	$excerpt = neat_trim($excerpt,$length);

	if ($more == 1) {
?>
	<p><?php echo $excerpt; ?> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="more-link">View More</a></p>
<?php } if ($more == 2) {
	echo $excerpt;
	}
}

/* POST CUSTOM FIELDS UI
********************************************************************************************************************************/
include_once('functions/fn_post_custom_fields.php');


/*IMAGES
Add Post Thumbnail Images
***************************************************************************************************************************************/
add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 200, 150, true );

/* ADD SUPPORT FOR VARIOUS THUMBNAIL SIZES
http://codex.wordpress.org/Function_Reference/add_image_size
**************************************************************************************************************************************
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'homepage-thumb', 220, 180, true ); //(cropped)
}*/

/* POST THUMBNAIL
***************************************************************************************************************************************/
include_once('functions/fn_post_thumbnail.php');

?>
