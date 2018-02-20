<?php // template for areas where we repeat same rectangular post preview ?>


  <a href="<?php the_permalink(); ?>" class="post-card flex-100">
    <div class="flex-container inner-card">

    <?php // image view
    if(get_the_post_thumbnail_url()) { ?>

      <div class="image flex-50 flex-col" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) center no-repeat; background-size: cover;">
        <div class="inner">
        </div>
      </div>
      <div class="post-info flex-container column flex-50 flex-col">

      <?php // list view
      } else {  ?>

      <div class="post-info flex-container column flex-100">

      <?php } ?>

        <?php $post_categories = wp_get_post_categories( get_the_ID() ); ?>

        <h4 class="categories"><?php
          foreach($post_categories as $c){
            $cat = get_category( $c );
             echo '<span>'.$cat->name.' </span>';
          } ?>
        <h3 class="line-after short"><?php the_title(); ?></h3>
        <div class="date-box">

          <h5><?php echo get_the_date('F j, Y'); ?></h5>
          <?php // getting rows of authors, if team member setting up post object, if guest then just grabbing name from text field
          if (have_rows('authors')) : ?>
          <h5> | by
            <?php while (have_rows('authors')) : the_row(); ?>
              <?php if (get_sub_field('author_type') === 'team_member') {
                $author_obj = get_sub_field('author'); ?>
                <span><?php echo $author_obj->post_title ?></span>
              <?php } elseif (get_sub_field('author_type') === 'guest') { ?>
                <span><?php the_sub_field('guest_author_name'); ?></span>
              <?php } ?>
            <?php endwhile; ?>
          </h5>
          <?php endif; // end authors?>

        </div>

        <p><?php (get_field('excerpt')) ? the_field('excerpt') : the_excerpt(); ?></p>
      </div>
    </div>
  </a>
