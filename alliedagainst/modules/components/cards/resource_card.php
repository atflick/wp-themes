<?php if( has_category('educational_resources') ) : ?>
<?php $post_type = get_post_type(); ?>
    <div class="flex-container column resource">
     <h6><?php echo $post_type; ?></h6>
<svg width="87px" height="87px" viewBox="0 0 87 87" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <!-- Generator: Sketch 47.1 (45422) - http://www.bohemiancoding.com/sketch -->
    <title>Group 2</title>
    <desc>Created with Sketch.</desc>
    <defs></defs>
    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="Act-Page-Design" transform="translate(-365.000000, -2173.000000)">
            <g id="Group-2" transform="translate(365.000000, 2173.000000)">
                <circle id="Oval-3-Copy" fill="#F5E9D5" cx="43.5" cy="43.5" r="43.5"></circle>
                <g id="Group-19" transform="translate(23.000000, 11.000000)">
                    <path d="M38,47 L29,57 L29,47 L38,47 Z M41.8684211,7 L36.2105263,7 L36.2105263,12 L37.3421053,12 C37.9667368,12 38.4736842,12.56 38.4736842,13.25 L38.4736842,44.5 L28.2894737,44.5 C27.6648421,44.5 27.1578947,45.06 27.1578947,45.75 L27.1578947,57 L5.65789474,57 C5.03326316,57 4.52631579,56.44 4.52631579,55.75 L4.52631579,13.25 C4.52631579,12.56 5.03326316,12 5.65789474,12 L6.78947368,12 L6.78947368,7 L1.13157895,7 C0.506947368,7 0,7.56 0,8.25 L0,60.75 C0,61.44 0.506947368,62 1.13157895,62 L41.8684211,62 C42.4930526,62 43,61.44 43,60.75 L43,8.25 C43,7.56 42.4930526,7 41.8684211,7 L41.8684211,7 Z" id="Fill-4445" fill="#E68049"></path>
                    <path d="M36.5454545,5 L29.1272727,5 C28.4523636,2.15 25.5112727,0 22,0 C18.4887273,0 15.5476364,2.15 14.8727273,5 L7.45454545,5 C6.65163636,5 6,5.56 6,6.25 L6,13.75 C6,14.44 6.65163636,15 7.45454545,15 L36.5454545,15 C37.3483636,15 38,14.44 38,13.75 L38,6.25 C38,5.56 37.3483636,5 36.5454545,5" id="Fill-4446" fill="#E68049"></path>
                    <rect id="Rectangle-9" fill="#FFFFFF" x="4" y="11" width="35" height="47" rx="3"></rect>
                    <path d="M30.8333333,32.8 L12.1666667,32.8 C11.5226667,32.8 11,32.352 11,31.8 C11,31.248 11.5226667,30.8 12.1666667,30.8 L30.8333333,30.8 C31.4773333,30.8 32,31.248 32,31.8 C32,32.352 31.4773333,32.8 30.8333333,32.8" id="Fill-4441" fill="#E68049" class="resource-path" stroke-width=".2"></path>
                    <path d="M30.8333333,24 L12.1666667,24 C11.5226667,24 11,23.552 11,23 C11,22.448 11.5226667,22 12.1666667,22 L30.8333333,22 C31.4773333,22 32,22.448 32,23 C32,23.552 31.4773333,24 30.8333333,24" id="Fill-4441-Copy" fill="#E68049" class="resource-path" stroke-width=".2"></path>
                    <path d="M30.8333333,37.2 L12.1666667,37.2 C11.5226667,37.2 11,36.752 11,36.2 C11,35.648 11.5226667,35.2 12.1666667,35.2 L30.8333333,35.2 C31.4773333,35.2 32,35.648 32,36.2 C32,36.752 31.4773333,37.2 30.8333333,37.2" id="Fill-4442" fill="#E68049" class="resource-path" stroke-width=".2"></path>
                    <path d="M30.8333333,28.4 L12.1666667,28.4 C11.5226667,28.4 11,27.952 11,27.4 C11,26.848 11.5226667,26.4 12.1666667,26.4 L30.8333333,26.4 C31.4773333,26.4 32,26.848 32,27.4 C32,27.952 31.4773333,28.4 30.8333333,28.4" id="Fill-4442-Copy" fill="#E68049" class="resource-path" stroke-width=".2"></path>
                    <path d="M30.8333333,41.6 L12.1666667,41.6 C11.5226667,41.6 11,41.152 11,40.6 C11,40.048 11.5226667,39.6 12.1666667,39.6 L30.8333333,39.6 C31.4773333,39.6 32,40.048 32,40.6 C32,41.152 31.4773333,41.6 30.8333333,41.6" id="Fill-4443" fill="#E68049" class="resource-path" stroke-width=".2"></path>
                    <path d="M22.8181818,46 L12.1818182,46 C11.5294545,46 11,45.552 11,45 C11,44.448 11.5294545,44 12.1818182,44 L22.8181818,44 C23.4705455,44 24,44.448 24,45 C24,45.552 23.4705455,46 22.8181818,46" id="Fill-4444" fill="#E68049" class="resource-path" stroke-width=".2"></path>
                </g>
            </g>
        </g>
    </g>
</svg>
     <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
</div>
<?php elseif(has_category('disposal') ) : ?>
    <?php
    $locales = get_the_terms(get_the_ID(), 'locale');
    $state = $locales[0]->name;
    ?>
    <div class="flex-container column disposal-location-card">
        <h6 class="<?php echo $state == 'National' ? 'national' : 'state'; ?>"> <?php echo $state; ?> </h6>
        <div class="title-box flex-container column">
          <h3> <?php the_title(); ?></h3>
        </div>
        <div class="button-container">
          <a href="<?php the_field('link'); ?>" target="_blank" class="orange-button">Visit Site</a>
        </div>
    </div>
<?php endif; ?>
