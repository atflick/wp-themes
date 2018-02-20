<?php $tabs_type = "text_tabs"; if (get_sub_field("tab_type")) $tab_type = get_sub_field("tab_type"); ?>

<section id = "module-<?php echo $i; ?>" class="module flex-container tabs-module <?php echo $tab_type; ?> gray-bg">
  <div class="container flex-padding clearfix">
    <h2 class="underlined"><?php the_sub_field("module_title"); ?></h2>
    <?php if (get_sub_field("module_content")) { ?><h5 class="module-summary"><?php the_sub_field("module_content"); ?></h5><?php } ?>
      <?php $j=0; if( have_rows('tab_content') ): ?>
        <div id="tabs-<?php echo $i;?>" class="tab-container">
          <div class="tabs-buttons">
            <ul>
            <?php while ( have_rows('tab_content') ) : the_row(); ?>
              <li><a href="#tab-<?php echo $j.'-'.$i; $j++?>"><?php echo get_sub_field("tab_name"); ?></a></li>
            <?php endwhile; ?>
            </ul>
          </div>
          <?php if ($tab_type == "text_tabs"){ ?>
          <?php $j=0; while ( have_rows('tab_content') ) : the_row(); ?>
            <div id="tab-<?php echo $j.'-'.$i;$j++;?>" class="tab-item">
              <?php include('tab_item.php'); ?>
            </div>
          <?php endwhile; ?>
          <?php } else { ?>
            <?php $j=0; while ( have_rows('tab_content') ) : the_row(); ?>
              <div id="tab-<?php echo $j.'-'.$i;$j++;?>" class="tab-item">
                <?php include('checklist_tab_item.php'); ?>
              </div>
            <?php endwhile; ?>
          <?php } ?>
        </div>
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>

  </div>
</section>
<?php wp_reset_query(); ?>
