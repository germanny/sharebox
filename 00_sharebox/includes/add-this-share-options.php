<?php 
    // Customize the variables here
    $twitter_username = 'Twitter Username'; 
?>

<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">

<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>

<div class="addthis_twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php return $twitter_username; ?>" data-related="<?php return $twitter_username; ?>" data-count="horizontal">Tweet</a></div>

<div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>"></div>

<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?><div class="addthis_pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo jg_post_thumbnail_src(); ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal">Pin It</a></div><?php } ?>

<div class="addthis_share"><a class="addthis_counter addthis_pill_style"></a></div>
</div>

<!-- Facebook Like script -->
<div id="fb-root"></div>
<script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//connect.facebook.net/en_US/all.js#xfbml=1"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>

<!-- Twitter share script -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Google plusone button script -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<?php if(get_post_meta($post->ID, 'infographic_value', TRUE)) { ?><!-- Pinterest PinIt script -->
<script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script><?php } ?>

<!-- Add This share script -->
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4df6d1ea727c9b60"></script>
<!-- AddThis Button END -->