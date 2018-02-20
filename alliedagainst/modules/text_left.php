<section id="module-<?php echo $iterator; ?>" style="background:url(<?php the_sub_field('image'); ?>) no-repeat; background-size: cover;" class="flex-container text-left module-padding">
    <div class="flex-50">

    </div>
    <div class="flex-container text-left-container flex-50 flex-col column">
        <h2> <?php the_sub_field('module_title'); ?></h2>
        <?php the_sub_field('module_content');?>
            <?php if( get_sub_field('button_text') && get_sub_field('button_link') ) : ?>
        <div class="button-container">
          <a class="blue-button" href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a>
         </div>
        <?php endif; ?>
    </div>
</section>
