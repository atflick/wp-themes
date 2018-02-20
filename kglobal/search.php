<?php
/* Template Name: Custom Search */
get_header();
?>

<main class="search-page">
  <section id="hero" class="flex-container column justify-center hero hero-bottom-slant bg-blue">
    <div class="inner-hero">
      <h1>Searching for: <?php echo htmlspecialchars($_GET['s']); ?></h1>
    </div>
  </section>

  <section id="module-2" class="results flex-container justify-center align-vert-center module-padding">
    <?php if ( have_posts() ) : ?>
      <?php while( have_posts() ) : the_post(); ?>
          <?php include('modules/components/' . get_post_type() . '_card.php'); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </section>

</main>

<?php get_footer(); ?>
