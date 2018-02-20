<?php $posts = get_sub_field('featured_items');
$post_type = get_sub_field('post_type'); ?>
<section id="module-<?php echo $iterator; ?>" class="flex-container featured-items column center-center module-padding <?php echo $post_type; ?>">
<?php if(get_sub_field('image') ) { ?>
  <img class="icon" src="<?php the_sub_field('image');?>"/>
<?php } ?>
  <?php if (get_sub_field('module_title') ) { ?>
    <h2> <?php echo get_sub_field('module_title'); ?> </h2>
  <?php } ?>
  <?php if($posts) : ?>
    <div class="flex-container posts-container">
      <?php if (get_sub_field('module_subtitle')): ?>
        <h3 class="subtitle"><?php the_sub_field('module_subtitle'); ?></h3>
      <?php endif; ?>
      <?php foreach($posts as $post) : setup_postdata($post);
        if( $post_type == 'disposal_location' || $post_type == 'resource') :
          include('components/cards/resource_card.php');
        else :
          include('components/cards/news_card.php');
        endif;
        wp_reset_postdata();
        endforeach;?>
    </div>
  <?php endif; ?>

  <?php if(get_sub_field('button_text') && get_sub_field('button_link')) : ?>
  <?php if( get_sub_field('national') ) : ?>
      <div class="flex-container button-container">
          <div id="national-resources" class="orange-button">
            <?php echo get_sub_field('button_text'); ?>
          </div>
        </div>
  <?php else : ?>
  <div class="flex-container button-container">
    <a href="<?php echo get_sub_field('button_link'); ?>" class="<?php echo (get_sub_field('post_type') == 'news') ? 'cream-button' : 'orange-button'; ?>">
      <?php echo get_sub_field('button_text'); ?>
    </a>
  </div>
   <?php endif;?>
<?php endif; ?>

</section>
