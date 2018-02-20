
  <?php

    $claim_number_args = array(
      'post_type' => 'claim',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'policy_holder',
          'value' => '"' . get_field('member')[0] . '"',
          'compare' => 'LIKE'
        ),
        array(
          'key' => 'status',
          'value' => 'OPEN',
          'compare' => 'LIKE'
        )
      )
    );
    $claim_number_query = new WP_Query($claim_number_args);
    $claim_number = 0;
    $claims_num_array = array();
    if($claim_number_query->have_posts() ) :
      while( $claim_number_query->have_posts() ) : $claim_number_query->the_post();
        if( !in_array(get_the_title(), $claims_num_array) ) :
          $claim_number++;
          $claims_num_array[] = get_the_title();
        endif;
    endwhile;
  endif;
  wp_reset_postdata();

    $open_reserves_args = array(
      'post_type' => 'claim',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'policy_holder',
          'value' => '"' . get_field('member')[0] . '"',
          'compare' => 'LIKE'
        ),
        array(
          'key' => 'status',
          'value' => 'OPEN',
          'compare' => 'LIKE'
        )
      )
    );
    $open_reserves = get_posts($open_reserves_args);
    $totals_paid_array = array();
    $totals_paid_check = array();
    foreach($open_reserves as $reserve){
      if( !in_array($reserve->post_title, $totals_paid_check) ) :
      $amount = get_post_meta($reserve->ID, 'totals_incurred')[0];
      $amount = ltrim($amount, '$');
      $new_amount = str_replace(',', '', $amount);
      $totals_paid_array[] = (float)$new_amount;
      $totals_paid_check[] = $reserve->post_title;
    endif;
    }
    $totals_paid = array_sum($totals_paid_array);

    $claims_page_args = array(
      'post_type' => 'member_page',
      'post_parent' => $post->ID,
      'tax_query' => array(
      array (
        'taxonomy' => 'member_page_categories',
        'field' => 'slug',
        'terms' => 'insurance',
        )
      )
    );

    $claim_page_query = new WP_Query($claims_page_args);
    $claim_page_link = '';
    if($claim_page_query->have_posts() ) :
      while( $claim_page_query->have_posts() ) : $claim_page_query->the_post();
        $insurance_id = get_the_ID();
      endwhile;
    endif;
    wp_reset_postdata();

    $claims_page_args = array(
      'post_type' => 'member_page',
      'post_parent' => $insurance_id,
      'tax_query' => array(
      array (
        'taxonomy' => 'member_page_categories',
        'field' => 'slug',
        'terms' => 'claims',
        )
      )
    );

    $claim_page_query = new WP_Query($claims_page_args);
    $claim_page_link = '';
    if($claim_page_query->have_posts() ) :
      while( $claim_page_query->have_posts() ) : $claim_page_query->the_post();
        $claim_page_link = get_the_permalink();
      endwhile;
    endif;
    wp_reset_postdata();
  ?>
  <?php if($claim_number !== 0 ) : ?>
  <div class="member-mod-title">Last Quarterly Loss Run</div>
  <div class="member-block">
  <div class="bold-text">Total Open Claims</div>
  <div class="align-center module-number"><?php echo $claim_number; ?></div>
  <div class="bold-text">Total Incurred for Open Claims</div>
  <div class="align-center module-number large">$<?php echo number_format($totals_paid); ?></div>
  <div class="align-center"><a href="<?php echo $claim_page_link; ?>" class="learn-more">See More</a></div>
</div>
<?php endif; ?>
