<div class="flex-col <?php // echo $flex; ?> member-module fixed-height min-width-mod">
  <div class="member-mod-title">Upcoming Events</div>
  <div class="member-block no-padding upcoming-events-module">
    <div class=" margin-bottom-0 padding-1-0 events-rows">
      <?php
      $event_args = array(
        'post_type' => 'event',
        'posts_per_page' => 3,
        'meta_key' => 'start_date',
        'orderby' => 'meta_value',
        'order' => 'DESC'
      );
      $events = get_posts($event_args);
      ?>
      <?php foreach($events as $event): ?>

        <div class="event-row padding-0-2">
          <div class="bold-text"><a href="<?php echo get_permalink($event->ID); ?>"><?php echo $event->post_title; ?></a></div>
          <div class="event-date">
            <?php
            $start_date = get_post_meta($event->ID, 'start_date');
            $dt = DateTime::createFromFormat('Ymd', $start_date[0]);
            if($start_date) :
              echo date_format($dt, 'F j');
              else :
                echo 'No Date Set';
              endif;
              ?>
            </div>
          </div>
        <?php endforeach;
        wp_reset_postdata();
        $user_hospitals = get_field('hospital', 'user_' . $current_user->ID);
        $multiple_hospitals = count($user_hospitals) > 1;
        $hos_slug = ($multiple_hospitals) ? "?i=".$hos_index : ""; ?>
        <div class="align-center"><a href="/member_page/events<?php echo $hos_slug?>" class="learn-more">See More</a></div>

      </div>
    </div>
  </div>
