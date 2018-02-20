<?php
// when included, this file MUST be included inside a post loop for Hospital post type
if( have_rows('growth') ) :
  $growth_data = array();
  $growth_data['xaxis'] = array();
  $growth_data['surplus'] = array();
  $growth_data['dividend'] = array();
  while( have_rows('growth') ) :  the_row();
    $growth_data['xaxis'][] = get_sub_field('year');
    $growth_data['surplus'][] = (int)get_sub_field('surplus');
    $growth_data['dividend'][] = (int)get_sub_field('dividend_cumulative');
  endwhile;
?>
<?php if( get_field('show_graph') ) : ?>
<div class="member-mod-title">Surplus Growth and Cumulative Dividends</div>
<div id="growth-graph" data-graphdata="<?php echo htmlspecialchars(json_encode($growth_data), ENT_QUOTES, 'UTF-8'); ?>" class="member-module flex-col flex-1">
</div>
<?php endif; 
endif;
?>
