<?php
/* Template Name: Custom Search */
get_header();
?>
<?php
$post_type = (isset($_GET['post_type'])) ? $_GET['post_type'] : "";
$hospital_ids = get_field("hospital", 'user_'.$current_user->ID);
$hos_id = (isset($_GET['current_hos'])) ? $_GET['current_hos'] : "";
$user_info = get_userdata(get_current_user_id());
$roles = $user_info->roles;
$member_hos_ids = get_field("hospital", 'user_'.$current_user->ID);
$hos_index = array_search($hos_id, $member_hos_ids);

?>

<?php if( $post_type && $hospital_ids ) : ?>
  <section id="member-page" class="profile">
    <div class="flex-container member-container gray-bg">
      <div class="flex-container profile-title"><h3>Search Results</h3>
        <?php include('modules/dashboard_search.php'); ?>
      </div>
      <?php include("member_sidebar.php"); ?>
      <div class="flex-col flex-3-4 padding-4 member-content">


        <div class="pdf-container hide member-block">
        </div>
        <div class="align-center hide close-pdf"><div class="close-button learn-more">Close </div></div>
        <?php
        $s = get_search_query();
        if( in_array('c_suite', $roles) || in_array('admin', $roles)) {
          $terms = array('risk-management', 'education', 'insurance', 'pso', 'claims', 'underwriting', 'financial', 'education-programs', 'simulation', 'membership-info');
        } elseif( in_array('risk_manager', $roles) ) {
          $terms = array('risk-management', 'insurance', 'claims', 'underwriting', 'financial', 'education-programs');
        } elseif( in_array('educator', $roles) ) {
          $terms = array('education-programs', 'simulation', 'education');
        } elseif( in_array('private_phys_entity', $roles) ) {
          $terms = array('risk-management', 'claims', 'underwriting', 'education', 'education-programs', 'membership-info');
        } elseif( in_array('physician', $roles) ) {
          $terms = array('risk-management', 'insurance', 'claims', 'education', 'underwriting', 'financial', 'education-programs');
        }
        $meta_query = array('relation' => 'OR');
        foreach($hospital_ids as $id){
          $meta_query[] = array(
            'key' => 'member',
            'value' => $id,
            'compare' => 'LIKE'
          );
        };
        $args = array(
          'post_type' => $post_type,
          'posts_per_page' => -1,
          'meta_query' => $meta_query,
          'taxonomy_query' => array(
            'relation' => 'OR',
            array(
              'taxonomy' => 'member_page_categories',
              'field' => 'slug',
              'terms' => $terms,
            ),
            array(
              'taxonomy' => 'member_page_categories',
              'field' => 'slug',
              'terms' => get_terms(array(
                'taxonomy' => 'member_page_categories',
                'hide_empty' => false
              )),
              'operator' => 'NOT IN'
            ),
          )
        );
        $query = new WP_Query($args);
        ?>
        <div class="member-mod-title">Searching For: <?php echo $s; ?></div>
        <div class="member-block flex-col">
          <!--  main array wherein the files found are kept -->
          <?php $file_results = array(); ?>

          <!--  first loop -->
          <?php if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
            // looking through documents
            if( have_rows('documents') ) :
              $documents = get_field('documents');
              foreach($documents as $document_field) :
                foreach($document_field['files'] as $file):
                  if( stripos($file['name'], $s) !== false || stripos($file['description'], $s) !== false || stripos($file['file']['filename'], $s) !== false ) :
                    $file_results[] = $file;
                  endif;
                endforeach;
              endforeach;
            endif;
            // looking through dashboard modules
            if( have_rows('module') ) :
              while( have_rows('module') ) : the_row();
              if( get_sub_field('module_type') == 'dashboard_module' ) :
                if( get_sub_field('dashboard_switcher') == 'files' ) :
                  if( have_rows('file_repeater') ) :
                    while( have_rows('file_repeater') ) : the_row();
                    if( stripos(get_sub_field('name'), $s) !== false || stripos(get_sub_field('description'), $s) !== false || stripos(get_sub_field('file')['filename'], $s) !== false ) :
                      $file = array(
                        'file_or_post' => get_sub_field('file_or_post'),
                        'name' => get_sub_field('name'),
                        'description' => get_sub_field('description'),
                      );
                      if( get_sub_field('file_or_post')== 'file' ) {
                        $file['file'] = get_sub_field('file');
                      } elseif( get_sub_field('file_or_post') == 'post' ){
                        $file['post'] = get_sub_field('post');
                      }
                      $file_results[] = $file;
                    endif;
                  endwhile;
                endif;
              endif;
            endif;
          endwhile;
        endif;
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
    <!--  end first loop -->
    <?php
    $tax_query = array('relation' => 'OR');
    $tax_query[] = array(
      'taxonomy' => 'member_page_categories',
      'field' => 'slug',
      'terms' => 'universal',
    );
    $tax_query[] = array(
      'taxonomy' => 'member_page_categories',
      'field' => 'slug',
      'terms' => 'my-resources',
    );

    $args2 = array(
      'post_type' => 'member_page',
      'posts_per_page' => -1,
      'tax_query' => $tax_query
    );
    $query2 = new WP_Query($args2);
    if ( $query2->have_posts() ) :
      while ( $query2->have_posts() ) : $query2->the_post();
      $term_check = false;
      $internal_terms = get_the_terms(get_the_ID(), 'member_page_categories');
      foreach($internal_terms as $internal_term){
        if( in_array($internal_term->slug, $terms) || $internal_term->slug == 'dashboard' || $internal_term->slug == 'my-resources') {
          $term_check = true;
        }
      }
      if($term_check) {
      // first check all universal pages
      if(have_rows('my_resources')):
        $my_resources = get_field('my_resources');
        foreach($my_resources as $resource) :
          foreach($resource['document_grouping'][0]['roles'] as $doc_role) :
            // if the user role matches
            if( in_array($doc_role['value'], $roles) ) :
              // iterate through each file
              foreach( $resource['document_grouping'] as $file_group ) :
                foreach($file_group['files'] as $file) :
                  if( stripos($file['name'], $s) !== false || stripos($file['description'], $s) !== false || stripos($file['file']['filename'], $s) !== false ) :
                    $file_results[] = $file;
                  endif;
                endforeach;
              endforeach;

            endif;
          endforeach;
        endforeach;
      endif;
      // second check
      if( have_rows('module') ) :
        while( have_rows('module') ) : the_row();
        if( get_sub_field('module_type') == 'dashboard_module' ) :
          if( get_sub_field('dashboard_switcher') == 'files' ) :
            $check = false;
            foreach( get_sub_field('roles') as $role){
              if(in_array($role['value'], $roles)){
                $check = true;
              }
            }
            if( $check ) :
              if( have_rows('file_repeater') ) :
                while( have_rows('file_repeater') ) : the_row();
                if( stripos(get_sub_field('name'), $s) !== false || stripos(get_sub_field('description'), $s) !== false || stripos(get_sub_field('file')['filename'], $s) !== false ) :
                  $file = array(
                    'file_or_post' => get_sub_field('file_or_post'),
                    'name' => get_sub_field('name'),
                    'description' => get_sub_field('description'),
                  );
                  if( get_sub_field('file_or_post')== 'file' ) {
                    $file['file'] = get_sub_field('file');
                  } elseif( get_sub_field('file_or_post') == 'post' ){
                    $file['post'] = get_sub_field('post');
                  }
                  $file_results[] = $file;
                endif;
              endwhile;
            endif;
          endif;
        endif;
      endif;
    endwhile;
  endif;

  // third check - document grouping
  if( have_rows('universal_documents') ) :
    $documents = get_field('universal_documents');
    foreach($documents as $document_field) :
      if($document_field['files']) :
        foreach($document_field['files'] as $file):
          if( stripos($file['name'], $s) !== false || stripos($file['description'], $s) !== false || stripos($file['file']['filename'], $s) !== false ) :
            $file_results[] = $file;
          endif;
        endforeach;
      endif;
    endforeach;
  endif;
}
endwhile;
endif;
wp_reset_postdata();
?>
<!--  end of second loop-->

<?php if(!empty($file_results)) : ?>
  <div class="table-rows">
    <?php foreach($file_results as $file) : ?>
      <?php $file_info = $file['file']; ?>
      <div class="table-row flex-container">
        <?php if( $file['file_or_post'] == 'file' ) :
          $ext = pathinfo($file_info['url'], PATHINFO_EXTENSION); ?>
          <div class="flex-col file-type"><?php echo $ext; ?></div>
          <div class="flex-col bold-text file-name">
            <?php if ($file["name"]) echo $file["name"];
            else echo $file_info['filename']; ?>
          </div>

          <a href="<?php echo $file_info['url']; ?>" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
          <div data-admin="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-ext="<?php echo $ext; ?>" data-type="file" data-url="<?php echo $file_info['url']; ?>" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></div>
        <?php else : ?>
          <?php $post = $file['post'][0]; ?>
          <div class="flex-col file-type"> POST </div>
          <div class="flex-col bold-text file-name"> <?php echo $post->post_title; ?></div>
          <div data-admin="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-ext="none" data-type="post" data-url="<?php echo $post->ID; ?>" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <h3> No results found. </h3>
<?php endif; ?>
</div>
</div>
</div>
</section>
<?php else : ?>
  <section id="main-section" class="main-section">
    <section id="the-main-content" class="the-main-content">
      <div class="content-container">

        <div class="flex-container news-releases">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $i=""; $arrow=""; ?>
            <div class="flex-col news-item full-width">
              <?php include ('modules/news_horizontal.php'); ?>
            </div>
          <?php endwhile; ?><?php endif; ?>
        </div>

        <?php
        global $wp_query;
        $big = 999999999; // need an unlikely integer
        $translated = __( '', 'mytextdomain' ); // Supply translatable string

        echo paginate_links( array(
          'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'format' => '?paged=%#%',
          'current' => max( 1, get_query_var('paged') ),
          'total' => $wp_query->max_num_pages,
          'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
          ) );
          ?>
        </div>
      </section>
    </section>
  <?php endif; ?>


  <?php get_footer(); ?>
