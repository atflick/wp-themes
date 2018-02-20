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
  <div id="newsletter-hide-show" class="flex-1 align-center"><div class="newsletter-button"> <?php the_sub_field('module_title_2'); ?></div></div>
  <div class="member-module hide flex-col newsletter-signup">
    <div class="member-mod-title"><?php the_sub_field('module_title'); ?></div>
    <div class="member-block">
      <?php the_sub_field('module_content'); ?>
      <?php echo do_shortcode(' [wpforms id=7641] '); ?>
    </div>
  </div>
<?php endif; ?>
