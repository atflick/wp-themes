<section id="module-<?php echo $iterator; ?>" class="flex-container column center-center module-padding all-posts <?php echo get_sub_field('selection'); ?>">
  <?php
  $selection = get_sub_field('selection');
  // set for AJAX pager
  $new_amount = 0;
  $posts_per_page = get_sub_field('number_of_posts');
  // determine what the post type is from the selection
  if($selection !== 'post'){
    $post_type = 'resource';
  } else {
    $post_type = 'post';
  }
  // basic loop to get post type based on selection and give it to the data variable for AJAX
  $args = array(
    'post_type' => $post_type,
  );

  // adding additional query parameters
  switch($selection){
    case 'all_resources_with_audience' : 
      $taxonomies = array(
        'audience' => 'audience'
      );
      $args['posts_per_page'] = $posts_per_page;
      $data = $args;
      $args['tax_query'] = array(
        array(
          'taxonomy'=> 'audience',
          'field' => 'slug',
          'terms' => 'patients'
        )
      );
      $include = 'resource';
      $data['include'] = $include;
      $audience = 'patients';
      break;
    case 'all_resources' :
      $taxonomies = array(
        'category_name' => 'category'
      );
      $args['posts_per_page'] = $posts_per_page;
      $data = $args;
      if( !isset($_GET['tax']) ) : 
        $args['category_name'] = 'educational_resources';
        $args['orderby'] = 'date';
        $args['order'] = 'DESC';
      else :
        if($_GET['tax'] == 'all'){
            $args['category_name'] = 'educational_resources, disposal';
            $args['orderby'] = 'date';
            $args['order'] = 'DESC';
        } else {
          $args['category_name'] = htmlspecialchars($_GET['tax']);
          $args['orderby'] = 'meta_value';
          $args['order'] = 'ASC';
          $args['meta_key'] = 'state';
        }
      endif;
      $include = 'resource';
      $data['include'] = $include;
      break;
    case 'disposal_resources':
      $taxonomies = array(
        'locale' => 'locale'
      );
      $args['posts_per_page'] = $posts_per_page;
      $args['category_name'] = 'disposal';
      $args['orderby'] = 'meta_value';
      $args['meta_key'] = 'state';
      $args['order'] = 'ASC';
      $data = $args;
      $include = 'resource';
      $data['include'] = $include;
      break;
    case 'post':
      $taxonomies = array(
        'news_type' => 'news_type'
      );
      $args['posts_per_page'] = $posts_per_page;
      $data = $args;
      if(isset($_GET['tax'])) :
        $args['tax_query'] = array(
          array(
            'taxonomy' => 'news_type',
            'field' => 'slug',
            'terms' => htmlspecialchars($_GET['tax'])
          )
          );
      endif; 
      $include = 'news';
      $data['include'] = $include;
      break;
  }



  include('components/resource_sorting.php');
  $query = new WP_Query($args);
  unset($args['posts_per_page']);
  $all_possible_posts = count(get_posts($args)); ?>
    <div class="all-posts-container column center-center flex-container">

<?php  include('components/post_listing.php'); ?>
</div>
</section>
