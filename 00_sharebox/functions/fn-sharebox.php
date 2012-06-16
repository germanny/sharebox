<?php
/*
Plugin Name: JG Sharebox
Description: Custom share options.
Version: 1.0
Author: Jen Germann
Author URI: http://jengermann.com
License: Take it, use it, change it, whatever
*/

function jg_sharebox( $comments = 0, $comments_div = '', $include_tooltip_script = true ){
?>
<div class="sharebox<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?> sharebox-wide<?php } ?>"> 
	<div class="share-fb share-method">
		<span>Facebook</span>
		<div class="tooltip">
<<<<<<< HEAD:00_sharebox/includes/inc-sharebox.php
			<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-width="152" data-show-faces="false"></div>
=======
			<div id="fb-root"><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=box_count&amp;show_faces=false&amp;appId=<?php echo FB_APP_ID; ?>" scrolling="no" frameborder="0" style="width:51px; height:62px;" allowTransparency="true"></iframe></div>
>>>>>>> a1b255519db50e24d331298ee1f8861d530a737c:00_sharebox/functions/fn-sharebox.php
		</div><!-- /.tooltip -->
	</div><!-- /.share-fb -->

	<div class="share-tw share-method">
		<span>Twitter</span>
		<div class="tooltip">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo TWITTER_USERNAME; ?>" data-related="<?php echo TWITTER_USERNAME; ?>" data-count="vertical">Tweet</a>
		</div><!-- /.tooltip -->
	</div><!-- /.share-fb -->

	<div class="share-go share-method">
		<span>Google+</span>
		<div class="tooltip">
			<g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone>
		</div><!-- /.tooltip -->
	</div><!-- /.share-go -->

<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?>
	<div class="share-pi share-method">
		<span>Pinterest</span>
		<div class="tooltip">
			<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo jg_post_thumbnail_src(2) ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
		</div><!-- /.tooltip -->
	</div><!-- /.share-pi -->
<?php } ?>

	<div class="share-em share-method">
		<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><span>Email</span></a>
	</div><!-- /.share-em -->

<?php if ($comments == 0) { 
	// no comments icons
 } if ($comments == 1) { ?>
	<div class="comments-link<?php if($num_comments == 0) { echo " zero-comments"; }?>">
		<?php comments_popup_link( 'Post a Comment', '1','%', '','' ); ?><?php if ($num_comments >= 1) {?><a href="#respond" title="" rel="bookmark" class="url"> &#8212; Post a Comment</a><?php } else{} ?>
	</div>
<?php } if ($comments == 2) { ?>
	<div class="comments-link">
		<a href="#<?php echo $comments_div; ?>" title="" rel="bookmark" class="url"> &#8212; Post a Comment</a>
	</div>
<?php } ?>
</div> 
 
<<<<<<< HEAD:00_sharebox/includes/inc-sharebox.php
<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
=======
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
>>>>>>> a1b255519db50e24d331298ee1f8861d530a737c:00_sharebox/functions/fn-sharebox.php

<?php if ( $include_tooltip_script == true ) { ?>
<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
<script> 
 
// initialize tooltip
$(".share-fb span, .share-tw span, .share-go span, .share-pi span").tooltip({
 
   // tweak the position
   position: 'bottom, center',
 
   // use the "slide" effect
   effect: 'slide'
 
// add dynamic plugin with optional configuration for bottom edge
}).dynamic({ bottom: { direction: 'down', bounce: true, relative: false } });

</script>

<?php } // end if $include_tooltip_script = 1 
else {} // don't show tooltip script

} // end jg_sharebox() ?>

