<section id="module-<?php echo $iterator; ?>" class="flex-container column services justify-center align-vert-center">
  <h2> <?php the_sub_field('module_title'); ?> </h2>
  <?php if( have_rows('services') ) : ?>
    <?php $service_num = 1; ?>
    <div class="flex-container flex-100 service-container justify-center">
      <?php while( have_rows('services') ) : the_row(); ?>
        <div id="service-<?php echo $service_num; ?>" class="flex-100 flex-container service flex-col">
          <h5><?php the_sub_field('service_name'); ?></h5>
          <div class="open-button" data-url="<?php echo get_template_directory_uri(); ?>" data-status="closed"></div>

          <div class="flex-100 flex-container service-detail flex-col">
            <div class="flex-container flex-100">
              <?php $desc_two = get_sub_field('description_two'); ?>
              <div class="<?php echo ($desc_two) ? 'flex-50' : 'flex-100';?> flex-col">
                <?php the_sub_field('description'); ?>
              </div>
              <?php if($desc_two) { ?>
                <div class="flex-50 flex-col">
                  <?php echo $desc_two; ?>
                </div>
              <?php } ?>
            </div>
          </div>
          <?php $service_num++; ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>
</section>
