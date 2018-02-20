<?php
$slider_type = "wide_slider";
if (get_sub_field("slide_type")) $slider_type = get_sub_field("slide_type"); ?>

<section id = "module-<?php echo $i; ?>" class="module slider-container <?php echo get_sub_field("module_background"); ?>">

  <div class="center-aligned container">
    <h2><?php echo get_sub_field("slider_title"); ?></h2>
    <h5><?php echo get_sub_field("slider_description"); ?></h5>
  </div>

  <div class="slider <?php echo $slider_type; ?>">

      <?php if( have_rows('slides') ):
              if ($slider_type=="half_slider"){
                while ( have_rows('slides') ) : the_row();
                  include('half_slide_item.php');
                endwhile;
              }
              else if ($slider_type=="person_slider"){
                while ( have_rows('slides') ) : the_row();
                  include('person_slide_item.php');
                endwhile;
              }
              else if ($slider_type=="member_slider"){

                  include('member_slide_item.php');
              }
              else if ($slider_type=="staff_slider"){

                  include('staff_slide_item.php');
              }
              else {
                while ( have_rows('slides') ) : the_row();
                  include('slide_item.php');
                endwhile;
              }

      endif; ?>

      <?php wp_reset_postdata(); ?>

  </div>
</section>
<?php wp_reset_query(); ?>
