<?php
// must set hospital with claims id before including
$args = array(
  'post_type' => 'claim',
  'posts_per_page' => -1,
  'orderby' => 'meta_value',
  'meta_key' => 'loss_date',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'policy_holder',
      'value' => '"' . $hospital_with_claims_id . '"',
      'compare' => 'LIKE'
    )
  )
);
$args2 = array(
  'post_type' => 'claim',
  'posts_per_page' => -1,
  'meta_query' => array(
    'relation' => 'AND',
    array(
      'key' => 'policy_holder',
      'value' => '"' . $hospital_with_claims_id . '"',
      'compare' => 'LIKE'
    ),
    array(
      'key' => 'claim_type',
      'value' => 'CLAIM',
      'compare' => 'LIKE'
    )
  )
);
$args3 = array(
  'post_type' => 'claim',
  'posts_per_page' => -1,
  'meta_query' => array(
    'relation' => 'AND',
    array(
      'key' => 'policy_holder',
      'value' => '"' . $hospital_with_claims_id . '"',
      'compare' => 'LIKE'
    ),
    array(
      'key' => 'claim_type',
      'value' => 'SUIT',
      'compare' => 'LIKE'
    )
  )
);
$all_claims = get_posts($args);
$only_claims = get_posts($args2);
$suits = get_posts($args3);
if($all_claims) :
  $claims_data = array();
  $claims_data['xaxis'] = array();
  $claims_data['claims'] = array();
  $claims_data['suits'] = array();
  foreach($all_claims as $claim):
    $date_data = get_post_meta($claim->ID, 'loss_date')[0];
    $date = date('Y', strtotime($date_data));
    if(!in_array($date, $claims_data['xaxis'])) {
      $claims_data['xaxis'][] = $date;
    }
  endforeach;
  $test_array = array();
  foreach($claims_data['xaxis'] as $date):
    $test_array['claims'][$date] = 0;
    $test_array['suits'][$date] = 0;
  endforeach;
  foreach($all_claims as $claim):
    $date_data = get_post_meta($claim->ID, 'loss_date')[0];
    $date = date('Y', strtotime($date_data));
    $claim_type = get_post_meta($claim->ID, 'claim_type')[0];
    if($claim_type == 'SUIT') :
      $test_array['suits'][$date] += 1;
    elseif($claim_type == 'CLAIM') :
      $test_array['claims'][$date] += 1;
    endif;
  endforeach;
  foreach($test_array['suits'] as $num):
    $claims_data['suits'][] = $num;
  endforeach;
  foreach($test_array['claims'] as $num):
    $claims_data['claims'][] = $num;
  endforeach;
endif;

 ?>
 <div class="member-mod-title">Claims</div>
 <div id="claims-graph" data-graphdata="<?php echo htmlspecialchars(json_encode($claims_data), ENT_QUOTES, 'UTF-8'); ?>" class="member-module flex-col flex-1">
 </div>
