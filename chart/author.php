<?php if ( !is_user_logged_in() ) {
   auth_redirect();
} ?>
<?php get_header(); ?>

<section id="profile" class="profile">
    <?php
      $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
      $id = $curauth->ID;
      $user_info = get_userdata($id);
      $roles = $user_info->roles;
      $current_user = wp_get_current_user();
      $hos_id = get_field("hospital");
      $hospital = get_post($hos_id[0]);


    ?>
    <?php if ($current_user->ID !== $curauth->ID ) : ?>
      <div class="profile-title"><h3 class="container">Access Denied.</h3></div>
      <h4 class="container flex-padding">Sorry! You are not authorized to access this page.</h4>
    <?php else : ?>
    <div class="profile-title"><h3 class="container">My Account</h3></div>
    <div class="flex-container member-container gray-bg">

      <?php include("member_sidebar.php"); ?>

    <?php setup_postdata( $post );
      $post = get_post( $hospital, OBJECT );
    ?>
      <div class="flex-col flex-3-4 padding-4 member-content">
        <h2>Dashboard Overview</h2>
        <div class="flex-container">
          <div class="flex-col flex-2-3 member-module member-summary margin-right-1">
            <div class="member-mod-title"><?php echo $hospital->post_title; ?></div>
            <div class="member-block">

              <div class="hospital-liability">

                <h5>Hospital Professional Liability</h5>
                <div class="table-rows">

                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Coverage Type</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("coverage_type_hospital"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Primary Limits Mcare eligible</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("pa_mcare_eligible_limits"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Primary Limits Non-Mcare eligible</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("pa_non_mcare_eligible_limits"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Excess Limits</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("hospital_xs_limits"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Ded/SIR</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("primary_sir_or_ded"); ?></div>
                  </div>

                </div>



              </div>

              <div class="physician-liability">

                <h5>Physician Professional Liability</h5>
                <div class="table-rows">

                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Coverage Type</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("coverage_type_physicians"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Limits</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("physician_limit"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Number of Insured Physicians at 1/1/<?php echo date('Y'); ?></label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("insured_physicians"); ?></div>
                  </div>

                </div>

              </div>

              <div class="physician-liability">

                <h5>Cyber Liability</h5>
                <div class="table-rows">

                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Limits</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("cyber_limits"); ?></div>
                  </div>
                  <div class="table-row flex-container">
                    <label class="flex-col flex-1-2">Notifications</label>
                    <div class="flex-col flex-1-2 bold-text"><?php the_field("cyber_notifications_-_primary"); ?></div>
                  </div>

                </div>

              </div>

              <div class="small-caption">
                This is a summary only and does not include all coverages, retentions, sub-limits or aggregates.<br>
                Please refer to your policy for specific details.
              </div>


            </div>
          </div>

          <div class="flex-col flex-1-3 summary-right">
            <div class="member-mod-title">Last Quarterly Loss Run</div>
            <div class="member-block">
              <?php

                $claim_number_args = array(
                  'post_type' => 'claim',
                  'posts_per_page' => -1,
                  'meta_query' => array(
                    'relation' => 'AND',
                    array(
                      'key' => 'policy_holder',
                      'value' => '"' . get_the_ID() . '"',
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
                $claim_number = $claim_number_query->post_count;

                $open_reserves_args = array(
                  'post_type' => 'claim',
                  'posts_per_page' => -1,
                  'meta_query' => array(
                    array(
                      'key' => 'policy_holder',
                      'value' => '"' . get_the_ID() . '"',
                      'compare' => 'LIKE'
                    )
                  )
                );
                $open_reserves = get_posts($open_reserves_args);
                $totals_paid_array = array();
                foreach($open_reserves as $reserve){
                  $amount = get_post_meta($reserve->ID, 'totals_incurred')[0];
                  $amount = ltrim($amount, '$');
                  $totals_paid_array[] = (int)$amount;
                }
                $totals_paid = array_sum($totals_paid_array);
              ?>
              <div class="bold-text">Total Open Claims</div>
              <div class="align-center module-number"><?php echo $claim_number; ?></div>
              <div class="bold-text">Total Incurred for Open Claims</div>
              <div class="align-center module-number">$<?php echo $totals_paid; ?></div>
              <div class="align-center"><a href="#" class="learn-more">See More</a></div>
            </div>

            <div class="member-mod-title">Quarterly Financial Reports</div>
            <div class="member-block">
              <div class="table-rows">
                <div class="table-row padding-0-2">
                  <div class="flex-container">
                    <div class="flex-col file-type">PDF</div>
                    <div class="flex-col bold-text file-name">Quarterly Financial Report 07-2017</div>
                    <a href="#" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                    <a href="#" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></a>
                  </div>
                </div>

                <div class="table-row padding-0-2">
                  <div class="flex-container">
                    <div class="flex-col file-type">PDF</div>
                    <div class="flex-col bold-text file-name">Quarterly Financial Report 04-2017</div>
                    <a href="#" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                    <a href="#" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></a>
                  </div>
                </div>
                <div class="table-row padding-0-2">
                  <div class="flex-container">
                    <div class="flex-col file-type">PDF</div>
                    <div class="flex-col bold-text file-name">Quarterly Financial Report 01-2017</div>
                    <a href="#" class="flex-col file-download"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/download.png';?>"/></a>
                    <a href="#" class="flex-col file-view"><img src="<?php echo get_template_directory_uri().'/dist/images/icons/view.png';?>"/></a>
                  </div>
                </div>
              </div>
              <div class="align-center"><a href="#" class="learn-more">See More</a></div>
            </div>
          </div>
      </div>


        <div class="member-module">
          <div class="member-mod-title">Support Overview</div>
          <div class="flex-container member-block">
            <?php echo do_shortcode( ' [wp_support_plus] ' ); ?>
          </div>
        </div>

        <div class="flex-container">

          <div class="member-module flex-col flex-1-3">
            <div class="member-mod-title">Participation</div>

          </div>



          <div class="member-module flex-col flex-1-3">
            <div class="member-mod-title">Upcoming Events</div>

          </div>

          <div class="member-module flex-col flex-1-3 ">
            <div class="member-mod-title">Offering / Announcements</div>

          </div>


        </div>

        <div class="flex-container">

          <!--Participations -->
          <div class="member-module flex-col flex-1-3 member-block participations">
            <div class="">

              <?php
              $chart_participation = get_field_object('chart_participation');

              if ($chart_participation) :
                $chart_participation_value = $chart_participation['value'];
              endif;
              $rl_user = "no";
              $rl_icon = "deny";
              $rl_user = get_field("rl_user");
              if ($rl_user == "pending") $rl_icon= "pending"; if ($rl_user == "yes") $rl_icon= "check"; ?>

              <div class="table-rows">
                <div class="table-row padding-0-2">
                  <div class="flex-container">
                    <div class="part-status">
                      <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/<?php echo $rl_icon; ?>.png"/>
                    </div>
                    <div class="part-label bold-text">RL User</div>
                  </div>
                </div>
                <?php if ($chart_participation) foreach ($chart_participation['choices'] as $choice_value => $choice_label) { ?>
                  <div class="table-row padding-0-2">
                    <div class="flex-container">
                      <div class="part-status">
                        <?php if(is_array($chart_participation_value) ): ?>
                          <?php if (in_array($choice_value, $chart_participation_value)) {
                            echo '<img src="'.get_template_directory_uri().'/dist/images/icons/check.png"/>';
                              } else {
                            echo '<img src="'.get_template_directory_uri().'/dist/images/icons/deny.png"/>';
                            } ?>
                        <?php else :
                          echo '<img src="'.get_template_directory_uri().'/dist/images/icons/deny.png"/>';
                            endif; ?>
                      </div>
                      <div class="part-label bold-text"><?php echo $choice_label; ?></div>
                    </div>
                  </div>

                <?php  } ?>
              </div>
            </div>
          </div>

          <!-- Upcoming Events -->


          <div class="flex-1-3 member-module flex-col flex-1-3 member-block no-padding">
            <div class=" margin-bottom-0 padding-1-0 events-rows">
              <?php
              $event_args = array(
                'post_type' => 'event',
                'posts_per_page' => 3,
              );
              $events = get_posts($event_args);
              ?>
              <?php foreach($events as $event): ?>
                <div class="event-row padding-0-2">
                  <div class="bold-text"><?php echo $event->post_title; ?></div>
                  <div class="event-date">
                    <?php
                      $start_date = get_post_meta($event->ID, 'start_date');
                    if($start_date) :
                      echo date('F j', $start_date[0]);
                    else :
                      echo 'No Date Set';
                    endif;
                  ?>
                </div>
                </div>
              <?php endforeach; ?>
              <div class="align-center"><a href="#" class="learn-more">See More</a></div>

          </div>
        </div>

        <!--General Offering -->
        <div class="member-module flex-col flex-1-3 member-block offering-module">
          <div class="offering-content"><?php if (get_field("offering__announcements")) the_field("offering__announcements"); else echo "No Announcements available"?></div>
        </div>





        </div>

          <?php
          global $post;
          $post = $hospital;
          setup_postdata($post);
          ?>
          <?php include('modules/growth-chart.php'); ?>

          <div class="flex-container">
            <div class="flex-2-3 projections-module">
              <?php include('modules/projections-chart.php'); ?>
            </div>
            <?php  wp_reset_postdata();?>

            <div class="flex-1-3 member-module flex-col flex-1-3">


              <div class="member-mod-title">Forum</div>
              <div class="member-block no-padding">

                <?php echo do_shortcode( ' [bbp-single-view id="popular"] ' ); ?>
              </div>
            </div>




          </div>

          <div class="member-module">
            <div class="member-mod-title">My Resources</div>
            <?php include ("my_resources.php"); ?>
          </div>

      </div>
    </div>
  <?php endif; ?>
</section>
<?php wp_reset_postdata(); ?>
<?php get_footer();?>
