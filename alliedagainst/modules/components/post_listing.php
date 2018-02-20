<?php if( $query->have_posts() ) : ?>
    <div class="flex-container fetched-posts center-center">
  <?php while( $query->have_posts() ) : $query->the_post(); ?>
    <?php include('cards/'. $include .'_card.php'); ?>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</div>
<div data-offset="<?php echo $new_amount; ?>" class="flex-container pagination">
  <div class="flex-30 flex-container center-center">
    <?php if($new_amount !== 0) : ?>
      <p id="previous" class="pager flex-container center-center">Previous Page</p>
    <?php endif; ?>
  </div>

  <div class="flex-30 flex-container center-center page-num">
    <p> Page <?php echo ((int)$new_amount + (int)$posts_per_page) / (int)$posts_per_page; ?> of <?php echo $query->max_num_pages; ?> </p>
  </div>

  <div class="flex-30 flex-container center-center">
    <?php if( ((int)$new_amount + (int)$posts_per_page)  / (int)$posts_per_page !== (int)$query->max_num_pages ) : ?>
      <p id="next" class="pager flex-container center-center">Next Page</p>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>
