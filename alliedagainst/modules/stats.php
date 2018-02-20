<section id="module-<?php echo $iterator; ?>" class="flex-container column center-center module-padding stats">
    <h2> <?php the_sub_field('module_title'); ?></h2>
    <?php if(have_rows('stats') ) : ?>
    <div class="stats-container flex-container"> 
    <?php while(have_rows('stats') ) : the_row(); ?>
    <div class="stat flex-container column">
        <h1> <?php the_sub_field('stat'); ?> </h1>
        <p> <?php the_sub_field('stat_subtitle');?> </p>
    </div>
    <?php endwhile; ?> 
    </div>
    <?php endif; ?>
</section> 