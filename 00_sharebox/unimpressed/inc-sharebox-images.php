<div class="sharebox<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?> sharebox-wide<?php } ?>"> 
	<div class="share-fb share-method">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/icons/share-fb.png" alt="Share on Facebook" />
		<div class="tooltip">
			<div id="fb-root"><iframe src="https://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>" scrolling="no" frameborder="0" style="height: 62px; width: 100%" allowTransparency="true"></iframe></div>
			
			<a href="http://www.facebook.com/sharer.php?s= 100&amp;p[title]=<?php the_title(); ?>&amp;p[url]=<?php the_permalink(); ?>&amp;p[images][0]=<?php echo jg_post_thumbnail_src() ?>" target="_blank" class="fb-share">Share</a>
		</div><!-- /.tooltip -->
	</div><!-- /.share-fb -->

	<div class="share-tw share-method">
		<img src="<?php bloginfo( 'stylesheet_directory' );?>/assets/images/icons/share-tw.png" alt="Share on Twitter" />
		<div class="tooltip">
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo TWITTER_USERNAME; ?>" data-related="<?php echo TWITTER_USERNAME; ?>" data-count="vertical">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div><!-- /.tooltip -->
	</div><!-- /.share-tw -->

	<div class="share-go share-method">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/icons/share-go.png" alt="Share on Google" />
		<div class="tooltip">
			<g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone>
		</div><!-- /.tooltip -->
	</div><!-- /.share-go -->

<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?>
	<div class="share-pi share-method">
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/icons/share-pi.png" alt="Share on Pinterest" />
		<div class="tooltip">
			<a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo jg_post_thumbnail_src(); ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script>
		</div><!-- /.tooltip -->
	</div><!-- /.share-pi -->
<?php } ?>

	<div class="share-em share-method">
		<a href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' );?>/assets/images/icons/share-em.png" alt="Share by Email" /></a>
	</div><!-- /.share-em -->

	<div class="comments-link<?php if($num_comments == 0) { echo " zero-comments"; }?>">
		<?php comments_popup_link( 'Post a Comment', '1','%', '','' ); ?><?php if ($num_comments >= 1) {?><a href="#respond" title="" rel="bookmark" class="url"> &#8212; Post a Comment</a><?php } else{} ?>
	</div>

</div> 

<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>

<script> 
 
// initialize tooltip
$(".share-fb img, .share-tw img, .share-go img, .share-pi img").tooltip({
 
   // tweak the position
   position: 'bottom, center',
 
   // use the "slide" effect
   effect: 'slide'
 
// add dynamic plugin with optional configuration for bottom edge
}).dynamic({ bottom: { direction: 'down', bounce: true, relative: false } });

</script>