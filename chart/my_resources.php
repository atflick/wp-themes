
<?php
$args = array(
  'post_type' => 'member_page',
  'posts_per_page' => -1,
  'tax_query' => array(
    array(
      'taxonomy' => 'member_page_categories',
      'field' => 'slug',
      'terms' => 'my-resources',
    )
  )
);
$posts = get_posts($args);
$current_user = wp_get_current_user();
$user_info = get_userdata(get_current_user_id());
$user_roles = $user_info->roles;
?>

<?php if($posts) : ?>
  <?php foreach($posts as $post) : ?>
    <?php setup_postdata($post); ?>
    <div class="member-block">
      <div class="flex-container">
        <?php if( have_rows('my_resources') ) : ?>
          <?php while( have_rows('my_resources') ) : the_row(); ?>
            <?php while( have_rows('document_grouping') ) : the_row(); ?>
              <?php $roles = get_sub_field('roles');
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
                <div class="flex-col flex-1-2 padding-1">
                  <div class="light-green resource-title"><?php the_sub_field('name'); ?></div>
                  <?php if( have_rows('files') ) : ?>
                    <div class="table-rows">
                      <?php $i = 0; ?>
                      <?php while( have_rows('files') && $i < 3) : the_row(); ?>
                        <div class="table-row padding-0-2">
                          <div class="flex-container">
                            <?php if( get_sub_field('file_or_post') == 'file') :
                              $file = get_sub_field("file");
                              $ext = pathinfo($file['url'], PATHINFO_EXTENSION);?>
                              <div class="flex-col file-type"><?php echo $ext; ?></div>
                              <div class="flex-col bold-text file-name">
                                <?php if (get_sub_field("name")) the_sub_field("name");
                                else echo $file['filename']; ?>
                              </div>
                              <a href="<?php echo $file['url']; ?>"  target="_blank" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                            <?php elseif(get_sub_field('file_or_post') == 'post') : ?>
                              <?php $post_item = get_sub_field('post')[0];?>
                              <div class="flex-col file-type"> POST </div>
                              <div class="flex-col bold-text file-name"> <?php echo $post_item->post_title; ?></div>
                              <a href="<?php echo get_permalink($post_item->ID); ?>" class="flex-col file-view-no-ajax"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></a>
                            <?php endif; ?>
                          </div>
                        </div>
                        <?php $i++; ?>
                      <?php endwhile; ?>
                    <?php endif; ?>
                    <!--  end if have rows files -->
                  </div>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <?php $user_hospitals = get_field('hospital', 'user_' . $current_user->ID);
      $multiple_hospitals = count($user_hospitals) > 1;
      $hos_slug = ($multiple_hospitals) ? "?i=".$hos_index : ""; ?>
      <div class="align-center"><a href="/member_page/my-resources<?php echo $hos_slug?>" class="learn-more">See More</a></div>
    </div>
  <?php endforeach; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
