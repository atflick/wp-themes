<section id="module-<?php echo $iterator; ?>" <?php echo get_sub_field('image') ? "style='background: url(" . get_sub_field('image') .") no-repeat top center; background-size: cover;'" : ""; ?> class="flex-container module-padding main-hero column">
  <div class="flex-container column hero-text-container">
    <h1 class="flex-col"> <?php the_sub_field('module_title'); ?> </h1>
    <p class="flex-col"> <?php the_sub_field('module_content', false, false); ?> </p>
    <?php if( get_sub_field('button_text') && get_sub_field('button_link') ) : ?>
    <div class="button-container">
      <a class="orange-button" href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a>
    </div>
<?php endif; ?>
</div>

</section>
