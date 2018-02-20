<section id="module-<?php echo $iterator; ?>" class="flex-container client_list module-padding column justify-center align-vert-center">
  <h2> <?php the_sub_field('module_title'); ?> </h2>
  <div class="list-container flex-100">
    <?php if( have_rows('client_list') ) : ?>
      <?php while( have_rows( 'client_list') ) : the_row(); ?>
        <div class="">
          <?php if( get_sub_field('relationship') ) :
                  $client = get_sub_field('client'); ?>
                  <a href="<?php echo get_the_permalink($client[0]);?>"><?php echo get_the_title($client[0]); ?></a>
          <?php else : ?>
                <p> <?php echo get_sub_field('name'); ?> </p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</section>
