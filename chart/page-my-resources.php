<?php
/**
 *  Template Name: My Resources Page
 * Template Post Type: member_page
 */

 if ( !is_user_logged_in() ) {
   $redirect_link = get_the_permalink();
   wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
   exit;
 }
 ?>

 <?php get_header(); ?>
 <?php
$hos_index = (isset($_GET['i'])) ? $_GET['i'] : 0;
$current_user = wp_get_current_user();
$hos_id = get_field('hospital', 'user_'.$current_user->ID)[$hos_index];

$user_info = get_userdata(get_current_user_id());
$user_roles = $user_info->roles;
 ?>
 <section id="profile" class="profile">
   <div class="flex-container profile-title"><h3>My Resources</h3>
     <?php
     $user_info = get_userdata(get_current_user_id());
     $user_roles = $user_info->roles;
     ?>
     <?php include('modules/dashboard_search.php'); ?>
   </div>
    <div class="flex-container member-container gray-bg">
      <?php include("member_sidebar.php"); ?>
      <div class="flex-col flex-3-4 padding-4 member-content">
        <div class="pdf-container hide member-block">
        </div>
        <div class="align-center hide close-pdf"><div class="close-button learn-more">Close </div></div>
        <div class="member-module">
          <div class="member-mod-title">My Resources</div>
        </div>
          <?php if (have_rows('my_resources') ) : ?>
            <div class="member-block file-list">
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
                  if($check) : ?>
                  <h3 class='toggle-docs'>  <?php the_sub_field('name'); ?>  </h3>
                  <?php if (have_rows("files")): ?>


                    <div class="table-rows hide">
                     <?php while(have_rows("files")): the_row(); ?>
                         <div class="table-row flex-container">
                           <?php if( get_sub_field('file_or_post') == 'file') :
                             $file = get_sub_field("file");
                               $ext = pathinfo($file['url'], PATHINFO_EXTENSION);?>
                                 <div class="flex-col file-type"><?php echo $ext; ?></div>
                                   <div class="flex-col bold-text file-name">
                                     <?php if (get_sub_field("name")) the_sub_field("name");
                                       else echo $file['filename']; ?>
                                         </div>
                                      <?php if($ext === 'pdf') : ?>
                                         <a href="<?php echo $file['url']; ?>" target="_blank" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                                         <div data-admin="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-url="<?php echo $file['url']; ?>" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></div>
                                      <?php else : ?>
                                        <div class="flex-col file-download"></div>
                                        <a href="<?php echo $file['url']; ?>" target="_blank" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                                      <?php endif; ?>
                            <?php elseif(get_sub_field('file_or_post') == 'post') : ?>
                                          <?php $post_item = get_sub_field('post')[0];?>
                                            <div class="flex-col file-type"> POST </div>
                                              <div class="flex-col bold-text file-name"> <?php echo $post_item->post_title; ?></div>
                                              <div class="flex-col file-download"></div>
                                              <div data-admin="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-ext="none" data-type="post" data-url="<?php echo $post_item->ID; ?>" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></div>
                            <?php endif; ?>
                                  </div>
                                  <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
              <?php endif; ?>
            <?php   endwhile; ?>
            <?php endwhile; ?>
          <?php endif; ?>
      </div>
    </div>
</section>
 <?php get_footer(); ?>
