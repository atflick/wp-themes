<?php if(strlen(get_field("date_joined_chart")) > 0) : ?>
<div class="member-mod-title">Member Since:</div>
<div class="member-block">
  <h4><?php the_field('date_joined_chart'); ?> </h4>
</div>
<?php endif; ?>
