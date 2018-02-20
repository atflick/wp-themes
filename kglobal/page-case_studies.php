<?php
/**
 * Template Name: Case Studies
 *
 */
 get_header(); ?>
 <?php
$post_type = 'client_case_study';
$post_amount = 6;
$cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $post_amount,
  'paged' => $paged,
);
if ( $cat ) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'case_study_type',
      'field' => 'slug',
      'terms' => $cat,
    ),
  );

}

$query = new WP_Query($args);
$total_posts = $query->found_posts;

?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main id="main-index" class="blog-template" data-page-slug="<?php echo( basename(get_permalink()) ); ?>">
  <?php
  	$hero_image = get_the_post_thumbnail_url();
  	$hero_text = get_field('hero_title');
  	$hero_content = get_the_content();
  ?>

  <section id="hero" class="flex-container column justify-center hero hero-bottom-slant <?php echo (!$hero_image) ? 'no-grad' : ''; ?>" style="background:url('<?php echo $hero_image; ?>') no-repeat center center, #2691AF;background-size:cover; background-attachment: fixed;">
  	<div class="inner-hero">
  		<h1 class="text-shadow"><?php echo $hero_text; ?></h1>
  		<h2><?php echo $hero_content; ?></h2>
  	</div>
  </section>

  <section class="flex-container side-padding module-padding blog-list case-studies cream-offset-bg">
    <div class="flex-100 flex-container filter-container">
      <div class="">
        <div class="select-container arrow">
    			<?php
    			$all_text = 'All Case Studies';
    			$dd_args = array(
    				'post_type' => 'client_case_study',
            'taxonomy' => 'case_study_type',
    				'echo' => true,
    				'hide_empty' => 1,
    				'show_option_all' => $all_text,
    				'value_field' => 'slug',
    				'selected' => $cat
    			);
    			wp_dropdown_categories( $dd_args );
    			?>
        </div>
      </div>
		</div>
		<?php if($query->have_posts()) :
			while($query->have_posts() ) : $query->the_post(); ?>

				<?php include('modules/components/client_case_study_card.php'); ?>

			<?php endwhile; ?>
      <div class="flex-100 pagination">
        <p class="prev"><?php previous_posts_link( 'Previous' ); ?></p>
        <p> Page <?php echo $paged; ?> of <?php echo $query->max_num_pages; ?> </p>
        <p class="next"><?php next_posts_link( 'Next', $query->max_num_pages ); ?></p>
      <?php endif;  ?>
      </div>
      <?php  wp_reset_postdata();?>
	</section>

	<?php include ("modules/modules.php"); ?>

</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
