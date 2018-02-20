<?php
$case_studies = get_sub_field('case_studies');
?>
<section id="module-<?php echo $iterator; ?>" class="flex-container case-studies">
  <div class="flex-100 module-title">
    <h2> <?php echo get_sub_field('module_title'); ?> </h2>
  </div>
  <?php if($case_studies) : ?>
  <div class="flex-container flex-100 case-study-container">
    <div class="case-study-row flex-100 flex-container space-between">
      <?php foreach($case_studies as $post) : ?>
        <?php setup_postdata($post); ?>
        <a href="<?php the_permalink(); ?>" class="flex-container case-study flex-col">
          <div class="inner flex-container flex-100 column">
            <div class="case-study-image" style="background: url(<?php the_post_thumbnail_url();?>) no-repeat center center; background-size: cover;">
              <div class="">
              </div>
            </div>
            <div class="case-study-details">
              <h5> <?php the_title(); ?></h5>
            </div>
          </div>
        </a>
      <?php endforeach; ?>
      <?php wp_reset_postdata(); ?>

      <div class="kglobal-logo-accent">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/kglobal-svg_bg.svg" alt="">
      </div>
    </div>
    <div class="flex-100 flex-container justify-center">
      <a class="button-container flex-1-3" href="<?php the_sub_field('button_link');?>"> <?php the_sub_field('button_text'); ?> </a>
    </div>
  </div>
  <?php endif; ?>
</section>
