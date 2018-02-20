<section id="module-<?php echo $iterator; ?>" class="flex-container featured-resources column center-center">
    <?php if(have_rows('featured_resource_container') ) : ?>
        <?php while( have_rows('featured_resource_container') ) : the_row(); ?>
        <div class="flex-container center-center flex-100 outer-container module-padding">
        <div class="featured-resource-container flex-container column center-center">
        <h2> <?php the_sub_field('title'); ?> </h2> 
        <p> <?php the_sub_field('content'); ?> </p> 
            <?php $post_objects = get_sub_field('featured_resources'); ?>
            <?php if($post_objects) : ?>
                <div class="flex-container resources-container">
                <?php foreach($post_objects as $post) : setup_postdata($post);
                    include('components/cards/resource_card.php');
                 endforeach; ?>
                <?php wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
            <?php if(have_rows('featured_links') ) : ?> 
                 <div class="flex-container resources-container">
                <?php while(have_rows('featured_links') ) : the_row(); ?>
                <div class="flex-container column resource">
                     <h6>Page</h6>
                     <img src="<?php the_sub_field('image'); ?>"/>
                    <a target="_blank" href="<?php the_sub_field('link') ?>"> <?php the_sub_field('page_title'); ?></a>
                </div>  
                <?php endwhile; ?>
                 </div>
                <?php endif; ?>
            <?php if(get_sub_field('button_text') && get_sub_field('button_link') ) :?>
            <div class="flex-container button-container"> 
                <a href="<?php the_sub_field('button_link');?>" class="white-button"><?php the_sub_field('button_text'); ?></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
        <?php endwhile; ?>
    <?php endif; ?>
</section>