
<?php
global $post;
$post = $hospital;
setup_postdata($post);
if (get_field("offering__announcements")){
  $hos_announcement = get_field("offering__announcements");
} else {
  $hos_announcement = false;
}
wp_reset_postdata(); ?>

<?php include ("universal_announcements.php"); ?>



<?php if($hos_announcement || $universal_announcement) : ?>

<div class="flex-col <?php // echo $flex; ?> member-module fixed-height min-width-mod">
  <div class="member-mod-title">Offering/Announcements</div>
  <div class="member-block offering-module">
    <div class="offering-content">
      <?php echo $universal_announcement; ?>
      <?php echo $hos_announcement; ?>
    </div>
  </div>
</div>

<?php endif; ?>
