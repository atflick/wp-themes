<?php
// when included, this file MUST be included inside a post loop for Hospital post type
if( have_rows('simulation_scores') ) :
  $simulation_data = array();
  $simulation_data['xaxis'] = array();
  $simulation_data['score'] = array();
  while( have_rows('simulation_scores') ) :  the_row();
    $simulation_data['xaxis'][] = get_sub_field('year');
    $simulation_data['score'][] = (int)get_sub_field('score');
  endwhile;
endif;
?>
<?php if( isset($simulation_data)) : ?>
<div class="flex-container no-wrap space-between">

  <div class="flex-col flex-1-2 member-module right-1">
    <div class="member-mod-title">Simulation Chart</div>
    <div id="simulation-graph" data-graphdata="<?php echo htmlspecialchars(json_encode($simulation_data), ENT_QUOTES, 'UTF-8'); ?>" class="member-module flex-col">
    </div>
  </div>

  <div class="flex-col member-module flex-1-2 fixed-height">
    <div class="member-mod-title">My Simulator</div>
    <div class="member-block">
      <?php the_field('my_simulator'); ?>
    </div>
  </div>

</div>
<?php endif; ?>
