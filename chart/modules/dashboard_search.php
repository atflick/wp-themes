<div class="flex-container center-content">
<form class="hide" role="search" method="get" id="searchform" action="<?php echo get_home_url(); ?>">
    <div class="flex-container file-search">
    <input type="text" value="" placeholder="Search files..." name="s" id="s" />

    <input type="hidden" value="<?php echo $hos_id; ?>" name="current_hos"/>
    <input type="hidden" value="member_page" name="post_type" />

    <input type="submit" id="searchsubmit" value="Search" />
    </div>
  </form>
  <img src="<?php echo get_template_directory_uri(); ?>/dist/images/search.png" class="dashboard-search" />
</div>
