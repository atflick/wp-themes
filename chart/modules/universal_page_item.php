
<?php
$path = '/universal-'.$term->slug;
$universal_page = get_page_by_path($path, OBJECT, 'member_page');
$posts = get_post($universal_page->ID);
$current_user = wp_get_current_user();
$user_info = get_userdata(get_current_user_id());
$user_roles = $user_info->roles;



if($posts) : ?>
<?php foreach($posts as $post) : ?>

  <?php setup_postdata($post);

  if( have_rows('universal_module') ): $i=0;
    while( have_rows('universal_module') ): the_row();

      $type = get_sub_field('module_type');

      if (($type != "hero")&&($type != "secondary_menu")){
        $i++;
        include ($type.'.php');

      }

    endwhile;
  endif;
?>

<?php if (have_rows("universal_documents")): ?>
  <div class="member-block file-list">
    <?php  $term_array = array();
    while(have_rows("universal_documents")): the_row();
    if( get_sub_field('year') ) :
      $year = get_sub_field('year');
    endif;

    $category = get_term(get_sub_field('category'), "member_page_categories");
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
        <?php if ($category_parent->parent !=0) : ?>
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

          <?php while(have_rows("files")): the_row(); ?>
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

<?php endforeach; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
