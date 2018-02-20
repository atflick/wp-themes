<?php
$dashboard_switcher = get_sub_field('dashboard_switcher');
$width = get_sub_field('width');
$title = get_sub_field('module_title');
$roles = get_sub_field('roles');
$user = get_userdata(get_current_user_id());
$check = false;
$administrator_check = false;
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
<!-- for admin debugging -->
<?php if($administrator_check) { ?>
  <h6 class="admin-text">Viewable by: <?php foreach($roles as $role){ echo $role['label']." ";} ?></h6>
<?php } ?>
<div class="member-module flexible-module flex-col <?php echo $width; ?>">
  <div class="member-mod-title"><?php echo $title; ?></div>
  <div class="member-block">
<?php
  if( $dashboard_switcher == 'content') :
    the_sub_field('wysiwyg_content'); ?>
<?php  elseif( $dashboard_switcher == 'files' ) : ?>
    <?php if( have_rows('file_repeater') ) : ?>
      <div class="table-rows">
      <?php while( have_rows('file_repeater') ) : the_row(); ?>
          <div class="table-row padding-0-2">
            <div class="flex-container">
              <?php $file = get_sub_field("file");
              $ext = pathinfo($file['url'], PATHINFO_EXTENSION); ?>
              <div class="flex-col file-type"><?php echo $ext; ?></div>
              <div class="flex-col bold-text file-name">  <?php if (get_sub_field("file_name")) the_sub_field("file_name");
                      else echo $file['filename']; ?>
              </div>
              <a href="<?php echo $file['url']; ?>" target="_blank" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
            </div>
          </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  <?php endif; ?>
  </div>
</div>
<?php endif; ?>
