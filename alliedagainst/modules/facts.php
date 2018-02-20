<?php
$button_text = get_sub_field('button_text');
$button_link = get_sub_field('button_link');
$background = get_sub_field('background_color'); ?>

<section id="module-<?php echo $iterator; ?>" class="flex-container column center-center module-padding facts <?php echo $background ?>">
    <?php if(get_sub_field('image') ) : ?>
    <img class="icon" src="<?php the_sub_field('image'); ?>"/>
    <?php endif; ?>
    <h2> <?php the_sub_field('module_title'); ?> </h2>
    <div class="facts-content">
      <?php the_sub_field('module_content'); ?>

    </div>

    <?php if(have_rows('wysiwyg_repeater') ) : $i = 1; ?>
    <div class="content-columns flex-container">
        <?php while(have_rows('wysiwyg_repeater') ) : the_row();  ?>
            <div class="flex-1-3"><?php the_sub_field('content'); ?></div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <?php if($button_text) { ?>
    <div class="button-container">
      <a href="<?php echo $button_link; ?>" class="<?php echo ($background === 'light_orange' || $background === 'orange') ? 'white-button' : 'orange-button'; ?>"><?php echo $button_text; ?></a>
    </div>
    <?php } ?>
</section>
