<?php
 $hospital_with_claims_id = get_field('member')[0];
$claimsArgs = array(
  'post_type'           => 'claim',
  'posts_per_page'      => -1,
  'paged' => $paged,
  'orderby' => 'meta_value',
  'meta_key' => 'loss_date',
  'order' => 'DESC',
  'meta_query' => array(
    array(
      'key' => 'policy_holder',
      'value' => '"' . $hospital_with_claims_id . '"',
      'compare' => 'LIKE'
    )
  )
);
$claims = new WP_Query($claimsArgs);

?>
    <?php $current_user = wp_get_current_user();?>
          <div class="member-mod-title"><?php echo get_the_title($hospital_with_claims_id); ?> Claims</div>
          <div class="flex-container claims-header">
            <label class="flex-col flex-1-4">Claim No</label>
            <div class="flex-col flex-1-2 bold-text">Date Submitted
            </div>
            <div class="flex-col flex-1-4">Loss</div>
          </div>
          <div class="claim-list-container">

            <div class="" id="claims-list">
                <div class="table-rows">
                  <?php $claims_num_array = array(); ?>
                  <?php $total_amount = 0; ?>
              		<?php $i=0; while ( $claims->have_posts() ) : $claims->the_post();  $arrow=""; ?>
                    <?php
                      if( !in_array(get_the_title(), $claims_num_array) ) :
                        $i++;


                      $amount = get_field('totals_incurred');
                      $amount = ltrim($amount, '$');
                      $new_amount = (float)str_replace(',', '', $amount);
                      $total_amount += $new_amount;

                    if($i % 2 == 0 || $i == 0) :
                      $border_class = '';
                      else :
                      $border_class = 'with-border';
                    endif;
                    ?>
                    <?php if( get_field('status') == 'CLOSED' ) :
                        $status_class = 'status_closed';
                      elseif( get_field('status') == 'OPEN') :
                        $status_class = 'status_open';
                      elseif( get_field('status') == 'REOPEN' ) :
                        $status_class = 'status_reopen';
                      endif; ?>
                      <div class="table-row hide-show <?php echo $status_class; ?> flex-container">
                        <label class="flex-col flex-1-4"><?php the_title(); ?></label>
                        <div class="flex-col flex-1-2 bold-text"><?php
                          $loss_date = get_field('loss_date');
                          echo $loss_date;
                        ?></div>
                        <div class="flex-col flex-1-4"><?php the_field('totals_incurred'); ?></div>
                      </div>
                      <div class="flex-container descrip-of-loss hide">
                        <p> Insured: <?php the_field('insured'); ?> </p>
                        <p> Claimant Name: <?php the_field('claimant_name'); ?></p>
                        <p> <?php echo get_field('description_of_loss'); ?> </p>
                        <p> Status: <?php the_field('status'); ?> </p>
                        <p> Claim Type: <?php the_field('claim_type'); ?></p>
                        <p> Report Date: <?php the_field('report_date'); ?> </p>
                        <p> Policy Year: <?php the_field('policy_year'); ?> </p>
                        <p> Indemnity Paid To Date: <?php the_field('indemnity_paid_to_date'); ?> </p>
                        <p> Indemnity Incurred: <?php the_field('indemnity_incurred'); ?> </p>
                        <p> Expense Paid to Date: <?php the_field('expense_paid_to_date'); ?> </p>
                        <p> Expense Incurred: <?php the_field('expense_incurred'); ?> </p>
                        <p> Totals Incurred: <?php the_field('totals_incurred'); ?> </p>
                      </div>
                      <?php  $claims_num_array[] = get_the_title(); ?>
                    <?php endif; ?>
              		<?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                </div>

            </div>

          <div class="flex-container legend">
            <div class="closed">
              <div></div> Closed
            </div>
            <div class="open">
              <div></div> Open
            </div>
            <div class="reopened">
              <div></div> Reopened
            </div>
          </div>
        </div>

          <div class="flex-container total-money">
            <p>Total Incurred on Open and Closed Claims: </p>
            <p>$<?php echo number_format($total_amount); ?> </p>
          </div>
