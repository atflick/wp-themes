<?php
// Module for displaying posts based on options from ACF
$logo_bg_class = (get_sub_field('logo_background')) ? 'logo-background' : '';
 ?>
<section id="module-<?php echo $iterator; ?>" class="post-display-module flex-container module-padding <?php echo get_sub_field('select_post_type'); ?> <?php echo (get_sub_field('cream_background')) ? 'cream-offset-bg' : ''; ?>">

  <div class="flex-100 module-title">
    <h2><?php the_sub_field('module_title'); ?></h2>
    <?php $subtitle = get_sub_field('description');  ?>

    <p><?php echo $subtitle; ?></p>

  </div>
  <?php
  $module_description = get_sub_field('module_description');
  if($module_description) { ?>
    <div class="flex-100 description">
      <p><?php echo $module_description ?></p>
    </div>
  <?php
}
  $post_type = get_sub_field('select_post_type');
  $post_amount = get_sub_field('posts_per_page');
  $tax_obj = get_sub_field('filter_by_'.$post_type);
  $order_by = get_sub_field('order_by');
  $order = get_sub_field('order');

  // if custom order then just repeat the posts that are selected
  if($order_by === 'custom') {

    if( have_rows('custom_post_repeater') ):
    	while( have_rows('custom_post_repeater') ): the_row();

  			$post = get_sub_field('select_post');
        setup_postdata($post);
        include ('components/'.$post_type.'_card.php');
        wp_reset_postdata();

    	endwhile;
    endif;


  } else {
  // otherwise build the query from the options selected in WP
    $args = array(
      'post_type' => $post_type,
      'posts_per_page' => $post_amount,
      'order'				=> $order,
    );

    if( $order_by == 'last_name') {
      $args['meta_key'] = $order_by;
      $args['orderby'] = 'meta_value';
    } else {
      $args['orderby'] = $order_by;
    }

    // if a taxonomy is selected, we will add that to the query

    if ( $tax_obj ) {
      $terms = array();
      foreach ($tax_obj as $tax) {
        $terms[] = $tax->slug;
      }
      $args['tax_query'] = array(
        array(
          'taxonomy' => $tax_obj[0]->taxonomy,
          'field' => 'slug',
          'terms' => $terms,
        ),
      );
    }
    $query = new WP_Query($args);
    ?>

    <?php if($query->have_posts()) :
      while($query->have_posts() ) : $query->the_post(); ?>

        <?php include ('components/'.$post_type.'_card.php'); ?>

      <?php endwhile; ?>
    <?php endif;?>

  <?php } ?>


  <?php if(get_sub_field('button_text')) { ?>
  <div class="flex-100 flex-container justify-center align-vertical">
    <a class="button-container flex-1-3" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
  </div>
  <?php } ?>
  <?php wp_reset_postdata();?>
</section>
