<section id="module-<?php echo $iterator; ?>" class="flex-container sources module-padding column">
    <h3> <?php the_sub_field('module_title'); ?></h3>
    <?php if(have_rows('citations') ) : ?>
    <div class="sources-container">
    <?php while(have_rows('citations') ) : the_row(); ?>
        <p><sup><?php echo get_sub_field('number', false, false); ?></sup> <?php echo get_sub_field('citation', false, false); ?></p>
    <?php endwhile; ?>
</div>
<?php endif; ?>
</section>
