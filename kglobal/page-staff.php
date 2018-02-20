<?php
/**
 * Template Name: Staff
 *
 */
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<main>
	<section class="hero nav-padding">
		<h1><?php the_field('hero_title'); ?></h1>
	</section>


	<section class="flex-container">
    <div class="flex-100">
      <h2>kglobal Staff</h2>
    </div>
		<?php
      $post_type = 'team_members';
      $post_amount = -1;
      $param = $post_type;
      $cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
      $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $post_amount,
        'meta_key'			=> 'last_name',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC',
        'tax_query' => array(
          array (
            'taxonomy' => 'staff_type',
            'field' => 'slug',
            'terms' => 'staff',
          )
        ),
      );

      $query = new WP_Query($args);
      ?>
		<?php if($query->have_posts()) :
			while($query->have_posts() ) : $query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="flex-1-3 flex-col">
          <?php include('components/staff_card.php'); ?>
        </a>
			<?php endwhile; ?>
		<?php endif;
    wp_reset_postdata();?>
	</section>

  <section class="flex-container">
    <div class="flex-100">
      <h2>Zenetex Staff</h2>
    </div>
    <?php
      $post_type = 'team_members';
      $post_amount = -1;
      $param = $post_type;
      $cat = (isset($_GET['cat'])) ? $_GET['cat'] : '';
      $args = array(
        'post_type' => $post_type,
        'posts_per_page' => $post_amount,
        'meta_key'			=> 'last_name',
        'orderby'			=> 'meta_value',
        'order'				=> 'ASC',
        'tax_query' => array(
          array (
            'taxonomy' => 'staff_type',
            'field' => 'slug',
            'terms' => 'zenetex',
          )
        ),
      );

      $query = new WP_Query($args);
    ?>
    <?php if($query->have_posts()) :
      while($query->have_posts() ) : $query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="flex-1-3 flex-col">
          <?php include('components/staff_card.php'); ?>
        </a>
      <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();?>
  </section>


	<?php include ("modules/modules.php"); ?>


</main>


<?php endwhile; endif; ?>
<?php get_footer(); ?>
