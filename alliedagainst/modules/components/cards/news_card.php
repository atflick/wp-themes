<?php $post_type = get_post_type();
  $post_type = ($post_type === 'post') ? 'News' : $post_type;
 ?>
<div class="flex-container flex-100 news-card">
  <div class="info">
    <h6><?php 
              switch ($post_type) {
                case 'News':
                  echo get_the_date('F j, Y');
                  echo (get_field('author')) ? '  <span>|</span>  by '.get_field('author') : '';
                  echo (get_field('publication_source')) ? '  <span>|</span>  '.get_field('publication_source') : '';                  
                  break;
                case 'resource':
                  $categories = get_the_category();
                  foreach($categories as $cat){
                    echo $cat->name;
                  }
                  break;
              }
              ?>
              </h6>
    <div class="">
      <h3><?php the_title(); ?></h3>
      <?php if(get_the_excerpt()) : ?>
         <p><?php excerpt(30); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <div class="flex-container btn center-center">
    <?php if( has_category('disposal') ) : ?>
    <div class="button-container">
      <a href="<?php the_field('link'); ?>" class="orange-button">Visit Site</a>
    </div>
  <?php else : ?>
       <div class="button-container">
      <a href="<?php the_permalink(); ?>" class="orange-button">Read More</a>
      </div>
  <?php endif; ?>
  </div>
</div>
