<?php if(strlen(get_field("coverage_type_hospital")) > 0) : ?>
  <div class="member-mod-title">Summary of Coverage</div>
  <div class="member-block">

    <div class="hospital-liability">

      <h5>Hospital Professional Liability</h5>

      <div class="table-rows">
        <div class="table-row flex-container">
          <label class="flex-col flex-1-2">Coverage Type</label>
          <div class="flex-col flex-1-2 bold-text"><?php the_field("coverage_type_hospital"); ?></div>
        </div>
        <?php if(strlen(get_field("primary_limits")) > 0 ) : ?>
          <div class="table-row flex-container">
            <label class="flex-col flex-1-2">Primary Limits</label>
            <div class="flex-col flex-1-2 bold-text"><?php the_field("primary_limits"); ?></div>
          </div>
        <?php endif ?>
        <?php if(strlen(get_field("pa_mcare_eligible_limits")) > 0 ) : ?>
          <div class="table-row flex-container">
            <label class="flex-col flex-1-2">Primary Limits Mcare eligible</label>
            <div class="flex-col flex-1-2 bold-text"><?php the_field("pa_mcare_eligible_limits"); ?></div>
          </div>
        <?php endif ?>
        <?php if(strlen(get_field("pa_non_mcare_eligible_limits")) > 0 ) : ?>
          <div class="table-row flex-container">
            <label class="flex-col flex-1-2">Primary Limits Non-Mcare eligible</label>
            <div class="flex-col flex-1-2 bold-text"><?php the_field("pa_non_mcare_eligible_limits"); ?></div>
          </div>
        <?php endif ?>
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
<?php endif; ?>
