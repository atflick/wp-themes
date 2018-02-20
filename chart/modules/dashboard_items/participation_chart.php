<div class="flex-col <?php // echo $flex; ?> member-module fixed-height min-width-mod">
  <div class="member-mod-title">Participation</div>
<div class="flex-container member-block participations">
  <?php
  global $post;
  $post = $hospital;
  setup_postdata($post);
  $chart_participation = get_field_object('chart_participation');
  if ($chart_participation) :
    $chart_participation_value = $chart_participation['value'];
  endif;
  $rl_user = "no";
  $rl_icon = "deny";
  $rl_user = get_field("rl_user");
  if ($rl_user == "pending") $rl_icon= "pending"; if ($rl_user == "yes") $rl_icon= "check"; ?>

  <div class="table-rows">

    <div class="table-row padding-0-1">
      <div class="flex-container">
        <div class="part-status bold-text">PSO Member Since</div>
        <div class="part-label"><?php the_field('pso_member_since'); ?></div>
      </div>
    </div>
    <div class="table-row padding-0-1">
      <div class="flex-container">
        <div class="part-status bold-text">Last RQ</div>
        <div class="part-label"><?php the_field('last_rq'); ?></div>
      </div>
    </div>
    <div class="table-row padding-0-1">
      <div class="flex-container">
        <div class="part-status bold-text">Next RQ</div>
          <div class="part-label"><?php the_field('next_rq'); ?></div>
      </div>
    </div>

    <div class="table-row padding-0-2">
      <div class="flex-container">
        <div class="part-label bold-text">RL User</div>
        <div class="part-status">
          <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icons/<?php echo $rl_icon; ?>.png"/>
        </div>
      </div>
    </div>
    <?php if ($chart_participation) foreach ($chart_participation['choices'] as $choice_value => $choice_label) { ?>
      <div class="table-row padding-0-2">
        <div class="flex-container">
          <div class="part-label bold-text"><?php echo $choice_label; ?></div>
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
        </div>
      </div>

    <?php  } ?>
  </div>
</div>
</div>
<?php  wp_reset_postdata();?>
