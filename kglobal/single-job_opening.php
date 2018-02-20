<?php
/**
 * The template for displaying job openings.
 *
 */

get_header();
$post_id = get_the_ID();?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main class="job-post">
  <?php
  	$hero_image = get_the_post_thumbnail_url();
  	$hero_text = get_the_title();
  	$hero_content = get_field('preview_text');
  ?>

  <section id="hero" class="flex-container column justify-center hero hero-bottom-slant" style="<?php echo ($hero_image) ? 'background:url('.$hero_image.') no-repeat center center;background-size:cover; background-attachment: fixed;' : ''; ?>">
  	<div class="inner-hero">
  		<h1 class="text-shadow"><?php echo $hero_text; ?></h1>
  		<h2><?php echo $hero_content; ?></h2>
  	</div>
  </section>

  <section class="flex-container side-padding module-padding job-body">
    <aside class="flex-1-4 flex-col">

      <div class="social">
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="window.open(this.getAttribute('href'), 'newwindow', 'width=400,height=400'); return false;"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-facebook-orange.svg" alt=""></a>
        <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_permalink(); ?>" onclick="window.open(this.getAttribute('href'), 'newwindow', 'width=400,height=400'); return false;"><img class="twitter-icon" src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-twitter-orange.svg" alt=""></a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>" onclick="window.open(this.getAttribute('href'), 'newwindow', 'width=400,height=400'); return false;"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-linkedin-orange.svg" alt=""></a>
      </div>
    </aside>
    <div class="flex-3-4 flex-col">
      <?php the_content(); ?>
    </div>

    <div class="flex-100 flex-container justify-center align-vertical">
      <a class="button-container flex-1-3 flex-col" id="apply-now" data-job="<?php echo $hero_text; ?>" href="#">Apply Now</a>
    </div>
  </section>

  <section class="application-form">
    <div class="">
      <?php echo do_shortcode('[wpforms id="'.get_field('form_id').'"]'); ?>
    </div>
  </section>


<?php
  $taxonomy = get_the_terms($post_id, 'job_type');
  $internship = false;
  foreach ($taxonomy as $item) {
    if($item->slug == 'internship') {
      $internship = true;
    }
  }
  if($internship) {
    $post = get_post(328);
    setup_postdata($post);
    $image = get_field('image');
    $title = get_field('module_title');
    $content = get_field('module_content');
    $sub_content = get_field('module_sub_content');
    $button_link = get_field('button_link');
    $button_text = get_field('button_text');
    wp_reset_postdata();
 ?>

 <section class="flex-container big_image_text_left module-padding column" style="background: url(<?php echo $image ?>) no-repeat center center; background-size: cover;">
 <!--  image left section -->
   <div class="module-title flex-container flex-100 flex-col orangeline">
     <h2 class="text-shadow"> <?php echo $title; ?></h2>
   </div>
 <!--  text right section -->
   <div class="flex-40 flex-col flex-container column">
     <h5> <?php echo $content; ?></h5>
     <p> <?php echo $sub_content; ?></p>
     <a class="button-container" href="<?php echo $button_link;?>"> <?php echo $button_text; ?> </a>
   </div>
 </section>
<?php } ?>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
