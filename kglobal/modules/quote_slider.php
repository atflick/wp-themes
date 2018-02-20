<section id="module-<?php echo $iterator; ?>" class="flex-container justify-center align-vert-center module-padding side-padding column quotes-container bottom-slant from-left white">
  <div class="slant-bg">
  </div>
  <div class="quote-bubble">
    <div class="inner">
    </div>
  </div>
  <h2> <?php echo get_sub_field('module_title'); ?> </h2>
  <?php if( have_rows('quotes') ) : ?>
    <div class="quotes flex-70 flex-container column justify-center align-vert-center">
    <?php while( have_rows('quotes') ) : the_row(); ?>
      <div class="quote-single flex-container justify-center column align-vert-center">
        <p><?php the_sub_field('quote'); ?></p>
        <h5><?php the_sub_field('name'); ?></h5>
        <h6><?php the_sub_field('title'); ?></h6>
        <p class="company"><?php the_sub_field('company'); ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
</section>
