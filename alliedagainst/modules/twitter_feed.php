<section id="module-<?php echo $iterator; ?>" class="twitter-feed flex-container module-padding">
  <div class="flex-container column center-center">
    <h3>Recent Tweets</h3>
    <?php echo do_shortcode("[custom-twitter-feeds]"); ?>
  </div>

  <div class="flex-100 button-container center-center">
    <!-- <a class="twitter-follow  button cream"  href="//twitter.com/intent/follow?screen_name=EvanitoJ" onclick="window.open(this.getAttribute('href'), 'newwindow', 'width=400,height=400'); return false;">Follow Us On Twitter <i><img src="<?php echo get_template_directory_uri();?>/dist/images/icon-twitter.svg" class="cta-icon" /></i></a> -->
    <a class="twitter-follow  button cream"  href="//twitter.com/intent/follow?original_referer=<?php echo get_site_url(); ?>&region=follow_link&screen_name=AAOA_tweets&tw_p=followbutton&variant=2.0">Follow Us On Twitter <i><img src="<?php echo get_template_directory_uri();?>/dist/images/icon-twitter.svg" class="cta-icon" /></i></a>
  </div>
</section>
