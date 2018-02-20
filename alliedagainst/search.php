<?php
get_header();
global $wp_query;
?>
<main id="main-section" class="main-section">
  <section id="search-result-header" class="flex-container alternate-hero" style="background:url(<?php the_field('hero_image', 'option');?>) no-repeat center center; background-size:cover;">
    <div class="flex-container flex-60 flex-col highlight-container column">
      <div class="inner">
        <h1> Search Results </h1>
        <p class="search-result-number">
          <?php if($wp_query->found_posts == 1):  ?>
            1 result for "<?php the_search_query(); ?>"
          <?php elseif($wp_query->found_posts == 0) : ?>
            No results found for "<?php the_search_query(); ?>"
          <?php else : ?>
            <?php echo $wp_query->found_posts ?> results for "<?php the_search_query(); ?>"
          <?php endif; ?>
        </p>
      </div>
    </div>
  </section>
  <section id="search-results" class="flex-container module-padding column">
    <?php if(have_posts() ) : ?>
      <div class="select-holder flex-container">
        <select class="search-post-selector" id="search-selector">
          <option <?php echo isset($_GET['sort']) ? '' : 'selected'; ?> disabled>Filter By</option>
          <option <?php echo isset($_GET['sort']) && $_GET['sort'] === 'most-recent' ? 'selected' : ''; ?> value="most-recent">Most Recent</option>
          <option <?php echo isset($_GET['sort']) && $_GET['sort'] === 'resources' ? 'selected' : ''; ?> value="resources">Resources</option>
          <option <?php echo isset($_GET['sort']) && $_GET['sort'] === 'press-releases' ? 'selected' : ''; ?> value="press-releases"> Press Releases </option>
          <option <?php echo isset($_GET['sort']) && $_GET['sort'] === 'blog-posts' ? 'selected' : ''; ?> value="blog-posts"> Blog Posts </option>
          <option <?php echo isset($_GET['sort']) && $_GET['sort'] === 'news-articles' ? 'selected' : ''; ?> value="news-articles">News Articles </option>
          <option <?php echo isset($_GET['sort']) && $_GET['sort'] === 'events' ? 'selected' : ''; ?> value="events"> Events </option>
        </select>
      </div>
      <?php while(have_posts() ) : the_post(); ?>
        <?php include('modules/components/cards/news_card.php'); ?>
      <?php endwhile; ?>
      <div class="pagination flex-container">

        <div class="flex-30 flex-container center-center prev">
          <?php if( get_previous_posts_link() ) :

            previous_posts_link( 'Previous Page', 0 );

          endif; ?>
        </div>

        <div class="flex-30 flex-container center-center page-num">
          <p>Page <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          echo $paged;
          ?> of <?php echo $wp_query->max_num_pages; ?>
          </p>
        </div>

        <div class="flex-30 flex-container center-center next">
          <?php if( get_next_posts_link() ) :
            next_posts_link( 'Next Page', 0 );
          endif; ?>
        </div>

      </div>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <h2> No search results found. </h2>
      <p> Try <a href="/resources">browsing resources</a> or finding a <a href="/disposal-locations">disposal location.</a> </p>
    <?php endif; ?>
  </section>
  <section id="mailing-list-section" class="flex-container form-module module-padding" style="background: url(<?php the_field('mailing_list_image', 'option') ?>) no-repeat center center; background-size:cover;">
    <div id="mailing-list" class="flex-container form-container column module-padding flex-40 flex-col">
      <h2><?php the_field('mailing_list_header', 'option'); ?></h2>
      <p> <?php the_field('mailing_list_content', 'option', false, false); ?> </p>
      <?php echo do_shortcode('[wpforms id="227"]'); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
