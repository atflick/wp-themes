<?php
// when included, this file MUST be included inside a post loop for Hospital post type
if( have_rows('projections') ) :
  $projections_data = array();
  $projections_data['xaxis'] = array();
  $projections_data['surplus'] = array();
  $projections_data['income'] = array();
  $projections_data['dividend'] = array();
  $projections_data['check'] = array();
  while( have_rows('projections') ) : the_row();
  $projections_data['xaxis'][] = get_sub_field('projected_year');
  $projections_data['surplus'][] = (int)get_sub_field('projected_surplus');
  $projections_data['income'][] = (int)get_sub_field('income_allocation');
  $projections_data['dividend'][] = (int)get_sub_field('dividend');
  $projections_data['check'][] = (int)get_sub_field('check');
  endwhile;
endif;

?>

<div class="member-mod-title">Projections</div>
<div id="projection-graph" data-graphdata="<?php echo htmlspecialchars(json_encode($projections_data), ENT_QUOTES, 'UTF-8'); ?>" class="member-module flex-col flex-1">
</div>
