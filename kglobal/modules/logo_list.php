<?php
$hero_text = get_sub_field('module_title');
$logos = get_sub_field('image_repeater');
?>
<section id="module-<?php echo $iterator; ?>" class="flex-container column justify-center align-vert-center module-padding logo-list side-padding slant-bottom">
  <h2><?php echo $hero_text; ?></h2>
  <div class="flex-container flex-90 flex-col logos animation-series" data-animation="fadeIn">
    <?php if(have_rows('image_repeater') ) : $i = 0; ?>
      <?php while(have_rows('image_repeater') ) : the_row(); ?>
        <div class="logo-container flex-container hide-opacity">
          <div class="image" style="background: url(<?php echo get_sub_field('image'); ?>) center no-repeat; background-size: contain;">
          </div>
        </div>

        <?php if(($i + 1) % 3 === 0) { ?>
          <hr class="hide-opacity">
        <?php }  ?>
      <?php
      $i++;
    endwhile; ?>
    <?php endif; ?>
  </div>
  <?php if( get_sub_field('button_link') && get_sub_field('button_text') ) : ?>
    <div class="flex-container flex-100 justify-center align-vert-center">
      <a class="button-container flex-1-3 flex-col" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
    </div>
<?php endif; ?>
</section>
