<section id="module-<?php echo $iterator;?>" class="flex-container column align-vert-center justify-center module-padding side-padding offerings-module bg-blue">
  <h2> <?php echo get_sub_field('module_title'); ?> </h2>
  <?php if( have_rows('offerings') ) : ?>
    <div class="offerings flex-container flex-100 align-vert-center justify-center offerings">
      <?php while( have_rows('offerings') ): the_row(); ?>
        <div class="offering flex-container">
          <a href="<?php echo get_sub_field('link'); ?>" class="flex-container flex-100 column justify-center align-vert-center ">
            <div class="icon">
              <div class="" style="background:url(<?php echo get_sub_field('icon'); ?>) no-repeat center center; background-size: cover;">
              </div>
            </div>
            <div class="flex-100">
              <p> <?php echo get_sub_field('name'); ?> </p>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
    </div>
<?php endif; ?>
</section>
