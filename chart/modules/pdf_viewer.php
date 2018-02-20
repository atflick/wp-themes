<?php
$file = get_sub_field('pdf');
$roles = get_sub_field('roles');
$check = false;
$user = get_userdata(get_current_user_id());
$administrator_check = false;
foreach($roles as $role){
  if( in_array($role['value'], $user->roles) ) {
    $check = true;
  } elseif (in_array('administrator', $user->roles)) {
    $check = true;
    $administrator_check = true;
  }
}
if($check) :
?>
  <!-- for admin debugging -->
  <?php if($administrator_check) { ?>
    <h6 class="admin-text">Viewable by: <?php foreach($roles as $role){ echo $role['label']." ";} ?></h6>
  <?php } ?>

  <div class="member-module flex-col flex-1">
    <div class="member-mod-title"><?php the_sub_field('module_title'); ?></div>
    <div class="member-block pdf-viewer">
      <object data="<?php echo $file; ?>" type="application/pdf" width="100%" height="500">
      <iframe src="<?php echo $file; ?>" width="100%" height="100%" style="border: none;">
      This browser does not support PDFs. Please download the PDF to view it: <a href="<?php echo $file; ?>">Download PDF</a>
      </iframe>
    </object>
    </div>
  </div>
<?php endif; ?>
