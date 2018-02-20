<section id="module-<?php echo $iterator; ?>" class="double-cta">
  <div class="flex-container flex-100">
    <?php if(have_rows('double_cta') ) :
        $x = 1;
        while(have_rows('double_cta') ) : the_row(); ?>
            <div class="flex-50 flex-col cta-box box-<?php echo $x; ?> module-padding">
              <h2><?php echo get_sub_field('header'); ?></h2>
              <div class="">

                <?php echo get_sub_field('cta_info'); ?>

                <div class="button-container">
                  <a href="<?php echo get_sub_field('button_link')?>" class="button">
                    <?php echo get_sub_field('button_text')?>
                    <?php
                    $cta_icon = (get_sub_field('button_icon')) ? '<i><img src="'.get_sub_field('button_icon').'" class="cta-icon" /></i>' : '' ;
                    echo $cta_icon;
                    ?>
                  </a>
                </div>
              </div>

            </div>
    <?php $x++; endwhile; ?>
    <?php endif; ?>
  </div>

</section>
