<div class="sharebox<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?> sharebox-wide<?php } ?>"> 
	<div class="share-fb share-method">
		<span>Facebook</span>
		<div class="tooltip">
			<div id="fb-root"><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;send=false&amp;layout=box_count&amp;show_faces=false&amp;appId=<?php echo FB_APP_ID; ?>" scrolling="no" frameborder="0" style="width:51px; height:62px;" allowTransparency="true"></iframe></div>
		</div><!-- /.tooltip -->
	</div><!-- /.share-fb -->

	<div class="share-tw share-method">
		<span>Twitter</span>
		<div class="tooltip">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo TWITTER_USERNAME; ?>" data-related="<?php echo TWITTER_USERNAME; ?>" data-count="vertical">Twitter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
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
			<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo jg_post_thumbnail_src() ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>
		</div><!-- /.tooltip -->
	</div><!-- /.share-pi -->
<?php } ?>

	<div class="share-em share-method">
		<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><span>Email</span></a>
	</div><!-- /.share-em -->

<?php /*
	<div class="comments-link<?php if($num_comments == 0) { echo " zero-comments"; }?>">
		<?php comments_popup_link( 'Post a Comment', '1','%', '','' ); ?><?php if ($num_comments >= 1) {?><a href="#respond" title="" rel="bookmark" class="url"> &#8212; Post a Comment</a><?php } else{} ?>
	</div>
*/ ?>
</div> 
 
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
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