<?php
/**
* The template for displaying any single Member Page.
*
*/

// CHECK IF CURRENT USER HOSPITAL field match this MEMBER PAGE hospital field
// SHOW the page if match else
// Access Denied
$user_hos = get_field('hospital', 'user_'.get_current_user_id());
$hos_id = get_field('member')[0];

if( !is_user_logged_in() ) :
  $redirect_link = get_the_permalink();
  wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
  exit;

else :
get_header();
?>


<?php

  $term = get_the_terms(get_queried_object(), 'member_page_categories')[0];
  ?>
  <section id="member-page" class="profile">
    <?php
      $current_user = wp_get_current_user();
      $member_hos_ids = get_field("hospital", 'user_'.$current_user->ID);
      $hos_id = get_field('member')[0];
      $hospital = get_post($hos_id);
      $hos_index = array_search($hos_id, $member_hos_ids);
      ?>
    <?php if (!in_array($hos_id, $member_hos_ids)) : ?>
      <div class="profile-title"><h3 class="container center-text">Access Denied.</h3></div>
      <h4 class="container flex-padding center">Sorry! You are not authorized to access this page.</h4>
    <?php else : ?>
    <div class="flex-container member-container gray-bg">
      <div class="flex-container profile-title"><h3><?php the_title(); ?></h3>
        <?php
        $user_info = get_userdata(get_current_user_id());
        $user_roles = $user_info->roles;
        ?>
        <?php include('modules/dashboard_search.php'); ?>
      </div>
      <?php include("member_sidebar.php"); ?>
      <div class="flex-col flex-3-4 padding-4 member-content">
        <?php if($term->slug == 'claims') : ?>
          <?php include('modules/loss_run.php'); ?>
        <?php elseif($term->slug == 'pso') : ?>
          <?php include('modules/box_iframe.php'); ?>
        <?php endif; ?>
        <div class="pdf-container hide member-block">
        </div>
        <div class="align-center hide close-pdf"><div class="close-button learn-more">Close </div></div>
        <?php if (have_rows("documents")): ?>
          <div class="member-block file-list">
            <?php  $term_array = array();
            while(have_rows("documents")): the_row();
            if( get_sub_field('year') ) :
              $year = get_sub_field('year');
            endif;

            $category = get_term(get_sub_field('category'),"member_page_categories");
            if($category->parent) :
              $category_parent = get_term($category->parent, "member_page_categories");
              else :
                $category_parent = "";
              endif;

              if(!in_array($year, $term_array) ) :
                echo "<h5>";
                echo get_sub_field('year');
                echo "</h5>";
                $term_array[] = $year;
              endif;

              // NEED TO: show the parents of the category so for example Not just show HPL but instead:

              //<h3>Policies & Endorsements</h3>
              //<h4>HPL</h4>

              //Look at the list of the categories here http://chart.nclud.com/wp-admin/edit-tags.php?taxonomy=member_page_categories&post_type=member_page

              if( $category->parent != 0 ): ?>
                <?php if ($category_parent->parent != 0) : ?>
                  <div class="indent-category">
                <?php else : ?>
                  <div>
                <?php endif; ?>
                <div class="indent-category">
              <?php
                echo "<h3 class='toggle-docs'>" . $category->name . "</h3>";
                $term_array[] = $category->name;
              else :
                echo "<div> <div>";
                echo "<h4 class='toggle-docs'>" . $category->name . "</h4>";
                $term_array[] = $category->name;
              endif;
                ?>

                <?php
                if (have_rows("files")): ?>

                <div class="<?php echo $category_parent ? 'indent-category' : ""; ?> table-rows hide">

                  <?php while(have_rows("files")): the_row();
                  ?>

                    <div class="table-row flex-container">
                      <?php if( get_sub_field('file_or_post') == 'file' ) : ?>

                        <?php $file = get_sub_field("file");

                        $ext = pathinfo($file['url'], PATHINFO_EXTENSION); ?>
                        <div class="flex-col file-type"><?php echo $ext; ?></div>
                        <div class="flex-col bold-text file-name">
                          <?php if (get_sub_field("name")) the_sub_field("name");
                          else echo $file['filename']; ?>
                        </div>


                          <?php if($ext === 'pdf') : ?>
                            <a href="<?php echo $file['url']; ?>" target="_blank" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                            <div data-admin="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-ext="<?php echo $ext; ?>" data-type="file" data-url="<?php echo $file['url']; ?>" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></div>
                          <?php else :?>
                            <div class="flex-col file-download"></div>
                            <a href="<?php echo $file['url']; ?>" target="_blank" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                          <?php endif; ?>
                        <?php elseif( get_sub_field('file_or_post') == 'post' ) : ?>
                        <?php $post_item = get_sub_field('post')[0]; ?>
                        <div class="flex-col file-type"> POST </div>
                        <div class="flex-col bold-text file-name"> <?php echo $post_item->post_title; ?></div>
                        <div class="flex-col file-download"></div>
                        <div data-admin="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-ext="none" data-type="post" data-url="<?php echo $post_item->ID; ?>" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></div>
                      <?php endif; ?>
                    </div>

                  <?php endwhile; ?>
                </div>
              <?php else : ?>
                <div></div>
              <?php endif; ?>
              </div>
              </div>

            <?php endwhile; ?>
          </div>
          <!--  end if for if have documents -->
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>

        <!-- Universal Resources-->
      <!-- <div class="flex-container"> -->
        <?php include ("modules/universal_page_item.php"); ?>
      <!-- </div> -->

        <div class="member-module">
          <div class="member-mod-title">My Resources</div>
          <?php include ("my_resources.php"); ?>
        </div>


      </div>
    </div>
  </section>
  <?php // wp_reset_query(); ?>

  <?php // if ( have_posts() ) : ?>
    <?php // while ( have_posts() ) : the_post();

    // include ("modules/modules.php");

    // endwhile;

    // endif; ?>
    <!-- page access  -->
  <?php endif; ?>
  <?php endif; ?>
  <?php get_footer(); ?>
