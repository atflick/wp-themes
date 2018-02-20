<?php
/**
 * The template for displaying any single post.
 *
 */

get_header();
$post_type = get_post_type();
$post_id = get_the_ID();
  // getting categories used for some conditional things
$categories = get_the_category($post_id);
$cat_args = array();
$cat_slugs = array();
foreach($categories as $cat){
  $cat_args[] = $cat->term_id;
  $cat_slugs[] = $cat->slug;
}

$disposal_location = in_array('disposal', $cat_slugs);

?>

<?php if(have_posts() ) : ?>
  <?php while(have_posts() ) : the_post(); ?>

    <section class="flex-container alternate-hero <?php echo (get_the_post_thumbnail_url()) ? '': 'full-width-header-text'; ?>" style="background:<?php echo (get_the_post_thumbnail_url()) ? 'url('.get_the_post_thumbnail_url().') no-repeat center; background-size:cover;' : '#07496B'; ?> ">
      <div class="flex-container flex-60 flex-col highlight-container column">
        <div class="inner">
          <h1><?php the_title(); ?></h1>
          <p><?php the_field('subtitle', false, false); ?></p>
        </div>
      </div>
    </section>

    <section class="single post-container <?php echo $post_type;?>-type flex-container module-padding">
      <div class="flex-container flex-100">
        <aside class="flex-30 flex-col">
        <?php if($post_type !== 'partner' && !$disposal_location) { ?>
          <p><?php echo get_the_date('F j, Y'); ?></p>
          <p><?php echo (get_field('author')) ? 'by '.get_field('author') : ''; ?></p>
          <p><?php echo (get_field('publication_source')) ? the_field('publication_source') : ''; ?></p>
        <?php } else if($post_type == 'partner') { ?>
          <div class="flex-100">
            <img src="<?php the_field('logo'); ?>" class="logo"/>
          </div>
        <?php } ?>
          <?php if($post_type == 'resource') {
            $tax_label = 'Category: ';
            $post_categories = wp_get_post_categories( $post_id );
            $locales = get_the_terms( $post_id , 'locale');
            $index_page = 'resources';
          } else {
            $tax_label = 'News Type: ';
            $post_categories = get_the_terms( $post_id , 'news_type');
            $index_page = 'all-news';
          }
          ?>
          <p class="categories"><?php
            if($post_categories) {
              echo $tax_label;
              foreach($post_categories as $c){
                $cat = get_category( $c );
                if($cat->slug !== 'educational_resources'){
                  echo '<a href="/'.$index_page.'/?tax='.$cat->slug.'"><span>'.$cat->name.'</span></a>';
                } else {
                  echo '<a href="/'.$index_page.'"><span>'.$cat->name.'</span></a>';
                }
              }
            }
          ?></p>

          <?php if(isset($locales)) { ?>
            <p class="categories">
              <?php
              if($locales) {
                $location_name = '';
                echo 'Location: ';
                foreach($locales as $l){
                  $loc = get_category( $l );
                  $location_name = $loc->name;
                   echo $location_name;
                }
              } ?>
            </p>
          <?php } ?>

          <div class="social">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" class="facebook" onclick="return openLinkWindow(this, 400, 300)" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-facebook.svg" alt=""></a>
            <a href="https://twitter.com/intent/tweet?text=<?php echo get_the_permalink(); ?>" class="twitter" onclick="return openLinkWindow(this, 400, 300)" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-twitter.svg" alt=""></a>
            <a href="mailto:#?body=<?php echo get_the_permalink(); ?>&subject=<?php echo get_the_title(); ?>" class="email"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-email.svg" alt=""></a>
            <?php if(get_field('download')) { ?>
            <a href="<?php echo get_field('download'); ?>" class="download" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-download.svg" alt=""></a>
            <?php } ?>
          </div>
        </aside>
        <div class="content flex-col wysiwyg">
          <?php the_content(); ?>

          <!--  PDF Viewer iframe and download button -->

          <?php  if(get_field('type') ) : ?>
            <p> <?php  the_field('type'); ?> </p>
          <?php  endif; ?>
          <?php  if(get_field('link') ) : ?>
            <div class="button-container">
              <a href="<?php  the_field('link'); ?>" target="_blank" class="orange-button">Visit Site</a>
            </div>
          <?php  endif; ?>

          <?php if(get_field('download') ) : ?>
          <div class="flex-container pdf-viewer">
              <h6> Scroll Down To View More </h6>
            <object data="<?php echo get_field('download'); ?>" type="application/pdf" width="100%" height="800">
              <iframe src="<?php echo get_field('download'); ?>" width="100%" height="100%" style="border: none;">
                This browser does not support PDFs. Please download the PDF to view it: <a target="_blank" href="<?php echo get_field('download'); ?>">Download PDF</a>
              </iframe>
            </object>
          </div>

          <div class="button-container">
            <a download href="<?php echo get_field('download'); ?>" class="orange-button">Download</a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
  <?php endwhile; ?>
<?php endif; ?>


<section class="related-posts flex-container column module-padding">
  <?php

  // different number of posts because the card sizes are different
  if($post_type == 'resource') {
    $post_amount = 3;
  } else {
    $post_amount = 2;
  }
  $args = array(
    'post_type' => $post_type,
    'posts_per_page' => $post_amount,
    'post__not_in' => array($post_id),
  );
  // if post type is a resource, pushing categor
  if($post_type == 'resource') {
    // adding category to args so it only returns similar category resources
    $args['category__and'] = $cat_args;
    // if disposal location post
    if ($disposal_location) {
      $args['posts_per_page'] = -1;
      // this is to activate different header for disposal locations
      $locale_slugs = array();
      foreach($locales as $l){
        $loc = get_category( $l );
        $locale_slugs[] = $loc->slug;
        $locale_slugs[] = 'national';
      }
      // adding tax query to args list so we only get disposal locations by same location
      $tax_query = array(
        array(
          'taxonomy' => 'locale',
          'terms' => $locale_slugs,
          'field' => 'slug',
        )
      );
      $args['tax_query'] = $tax_query;
    }
  }
  $query = new WP_Query($args);?>
  <?php if ($post_type !== 'partner') { ?>
    <?php if($query->have_posts()) : ?>
      <?php if($disposal_location) { ?>
      <h3><?php // echo $location_name;  ?>Other Disposal Locations</h3>
      <?php } else { ?>
      <h3>Related <?php echo ($post_type === 'post') ? 'News' : 'Resources'; ?> </h3>
      <?php } ?>
      <div class="flex-container related-posts-container">
        <?php
        $dif_post_type = ($post_type === 'post') ? 'news' : $post_type;
        // echo $post_type;
        while($query->have_posts()) : $query->the_post(); ?>

          <?php include('modules/components/cards/'.$dif_post_type.'_card.php'); ?>

        <?php endwhile; ?>
      </div>
    <?php wp_reset_postdata(); ?>
    <?php endif; ?>

  <?php } else { ?>
    <h3>Other Partners</h3>
    <div class="flex-container related-posts-container">
  <?php // for partners, i am getting the next and previous in the partners list so people can easily view all by
        // clicking through them and wont keep getting the same ones on these single partner pages
    $previous_post = get_previous_post();
    if (!empty( $previous_post )):
      $post = $previous_post; setup_postdata($post);
      include('modules/components/cards/'.$post_type.'_card.php');
      wp_reset_postdata();
    endif;

    $next_post = get_next_post();
    if (!empty( $next_post )):
      $post = $next_post; setup_postdata($post);
      include('modules/components/cards/'.$post_type.'_card.php');
      wp_reset_postdata();
     endif; ?>
    </div>
  <?php } ?>

</section>
<?php get_footer(); ?>

<script type="text/javascript">
function openLinkWindow(link, width, height) {
  var leftPosition, topPosition;
  //Allow for borders.
  leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
  //Allow for title and status bars.
  topPosition = (window.screen.height / 2) - ((height / 2) + 50);
  var windowFeatures = "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no";
  window.open(link.getAttribute('href'),'sharer', windowFeatures);
  return false;
}
</script>
