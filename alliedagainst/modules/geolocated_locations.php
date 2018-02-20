<section id="geolocator" class="flex-container featured-items column center-center module-padding <?php echo isset($_GET['state']) ? '' : 'hide'; ?>">
    <?php 
    $state = htmlspecialchars($_GET['state']);
    $args = array(
        'post_type' => 'resource',
        'cat_name' => 'disposal',
        'tax_query' => array(
            array(
                'taxonomy'=>'locale',
                'field'=>'name',
                'terms'=> $state
            )
        )
    );
    $query = new WP_Query($args);
    ?>
  <?php if($query->have_posts() ) : ?>
    <div class="flex-container module-padding posts-container">
            <h3 class="locale" id="geolocate-title"> </h3>
      <?php while($query->have_posts()) : $query->the_post(); ?>
          <?php include('components/cards/resource_card.php'); ?>
        <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    </div>
<?php else : ?>
<h4> No results found! </h4>
  <?php endif; ?>

</section>
