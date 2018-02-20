<?php
/**
 * Template Name: Blogs
 *
 */
 get_header(); ?>
 <?php
$post_type = 'post';
$post_amount = 6;
$cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$author = (isset($_GET['auth'])) ? $_GET['auth'] : false;
$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

function allow_wildcards( $where ) {
  global $wpdb;
  $where = str_replace(
    "meta_key = 'authors_%",
    "meta_key LIKE 'authors_%",
    $wpdb->remove_placeholder_escape($where)
  );
  return $where;
}
add_filter('posts_where', 'allow_wildcards');

$args = array(
  'post_type' => $post_type,
  'posts_per_page' => $post_amount,
  'category_name' => $cat,
  'tag' => $tag,
	'paged' => $paged,
);

if($author) {
  $args['meta_query'] = array(
    array(
      'key' => 'authors_%_author',
      'compare'	=> '=',
      'value' => $author,
    )
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

  <section id="hero" class="flex-container column justify-center hero" style="background:url('<?php echo $hero_image; ?>') no-repeat center center, #2691AF;background-size:cover; background-attachment: fixed;">
  	<div class="inner-hero">
  		<h1 class="text-shadow"><?php echo $hero_text; ?></h1>
  		<h2><?php echo $hero_content; ?></h2>
  	</div>
  </section>

  <?php
  $text_content = get_field('module_content', false, false);
  $top_slant = get_field('top_slant');
  $bottom_slant = get_field('bottom_slant');
  $line_style = get_field('line_style');
  $image = get_field('image');
   ?>

  <section id="" class="flex-container text-block <?php //echo ($top_slant) ? 'top-slant' : ''; ?> <?php echo ($bottom_slant) ? 'bottom-slant white' : ''; ?>">
    <?php if($top_slant) { ?>
    <div class="slant-bg" style="<?php echo ($image) ? 'background: url('.$image.') no-repeat left center, #fff; background-size: contain;' : ''; ?>">
    </div>
    <div class="slant-bg mobile">
    </div>
    <?php } ?>

    <div class="inner <?php echo ($line_style === 'blueline') ? 'blueline' : 'under-orangeline'; ?> flex-100">
      <h3><?php echo $text_content ?></h3>
    </div>
  </section>


	<section class="flex-container module-padding blog-list cream-offset-bg">
    <div class="flex-50 tag-results">
      <?php if($tag) {
        $tag_obj = get_term_by('slug', $tag, 'post_tag');
        ?>
      <h5>Results for <?php echo $tag_obj->name; ?></h5>
      <?php } ?>
    </div>
		<div class="flex-50 flex-container filter-container">
      <div class="">
        <div class="select-container arrow">
          <?php
          $all_text = 'All Posts';
          $dd_args = array(
            'post_type' => 'post',
            'echo' => true,
            'hide_empty' => 1,
            'show_option_all' => $all_text,
            'value_field' => 'slug',
            'selected' => $cat
          );
          wp_dropdown_categories( $dd_args ); ?>
        </div>
      </div>
		</div>
		<?php if($query->have_posts()) :
			while($query->have_posts() ) : $query->the_post(); ?>

				<?php include('modules/components/post_card.php'); ?>


			<?php endwhile; ?>
    <div class="flex-100 pagination">
      <p class="prev"><?php previous_posts_link( 'Previous' ); ?></p>
      <p> Page <?php echo $paged; ?> of <?php echo $query->max_num_pages; ?> </p>
      <p class="next"><?php next_posts_link( 'Next', $query->max_num_pages ); ?></p>

    <?php else : ?>
      <h3 class="sorry">No posts matching this category combination.</h3>
    <?php endif;  ?>
    </div>
    <?php  wp_reset_postdata();?>
	</section>

	<?php include ("modules/modules.php"); ?>

</main>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
