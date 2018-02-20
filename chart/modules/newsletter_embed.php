<?php
$roles = get_sub_field('roles');
$user = get_userdata(get_current_user_id());
$check = false;
if($roles) {
  foreach($roles as $role){
    if( in_array($role['value'], $user->roles) ) {
      $check = true;
    } elseif (in_array('administrator', $user->roles)) {
      $check = true;
      $administrator_check = true;
    }
  };
}
if($check) :
  ?>
  <div class="member-module flex-1 flex-col">
    <div class="member-mod-title"><?php the_sub_field('module_title'); ?></div>
    <div class="member-block">
      <?php the_sub_field('module_content'); ?>
      <!--Begin CTCT Archive-->
      <script id="archiveScript" src="//static.ctctcdn.com/js/archive-static/current/archive-static.min.js"></script> <div id="archiveList" data-archive-count="<?php the_sub_field('count'); ?>" data-m="a07e43nb9bk0"></div>
      <!--End CTCT Archive-->
      <div id="newsletter-hide-show" class="flex-1 border-top align-center"><div class="newsletter-button"> <?php the_sub_field('module_title_2'); ?></div></div>
      <div class="flex-col hide newsletter-signup">
        <?php echo do_shortcode(' [wpforms id=7641] '); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
