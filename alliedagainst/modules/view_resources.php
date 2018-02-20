<?php if( have_rows('audiences') ) : ?>
<?php while( have_rows('audiences') ) : the_row(); ?>
<section class="flex-container view-resources module-padding center-center">
    <div class="view-resources-container flex-container column">
      <img class="icon" src="<?php the_sub_field('image'); ?>"/>
      <h1> <?php the_sub_field('title'); ?> </h1>
      <p> <?php the_sub_field('text'); ?> </p>
      <div class="button-container">
        <a class="white-button" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('button_text'); ?></a>
      </div>
    </div>
  </section>
    <?php endwhile; ?>
  <?php endif; ?>
