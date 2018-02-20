<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wpsupportplus, $current_user, $wpdb;

$wpsp_user_session = $wpsupportplus->functions->get_current_user_session();

$ticket_sections = apply_filters( 'wpsp_tickets_sections', array(
    'ticket-list'     => array(
        'label' => __('Ticket List', 'wp-support-plus-responsive-ticket-system'),
        'path'  => WPSP_ABSPATH . 'template/tickets/ticket-list.php'
    ),
    'create-ticket'     => array(
        'label' => __('Create New Ticket', 'wp-support-plus-responsive-ticket-system'),
        'path'  => WPSP_ABSPATH . 'template/tickets/create-ticket.php'
    ),
		'dashboard'     => array(
        'label' => __('Dashboard', 'wp-support-plus-responsive-ticket-system'),
        'path'  => WPSP_ABSPATH . 'template/tickets/dashboard.php'
    )
));

if( $wpsupportplus->functions->is_staff($current_user) ) {
		$ticket_sections['agent-setting']=array(
			'label'=> __('Agent Setting', 'wp-support-plus-responsive-ticket-system'),
			'path'  => WPSP_ABSPATH . 'template/tickets/agent_setting.php'
		);
}

$default_tab = apply_filters( 'wpsp_tickets_default_section', 'ticket-list' );

$current_tab = isset($_REQUEST['section']) ? sanitize_text_field($_REQUEST['section']) : $default_tab;

?>
<div class="bootstrap-iso override flex-1">
  <nav class="navbar navbar-default secondery-menu">
    <div class="container-fluid support-ticket-sub-header">
      <ul class="nav navbar-nav">
        <?php
        foreach($ticket_sections as $key=>$val):
          $tab_class = $key==$current_tab ? 'active' : '' ;
          $tab_class = isset($_GET["page"]) ?  $_GET["page"] === 'faq' ? '' : $tab_class : $tab_class;
          if ($key === 'dashboard')  continue;
          ?>

          <li role="presentation" class="<?php echo $tab_class?>">
            <a href="<?php echo $wpsupportplus->functions->get_support_page_url(array('page'=>'tickets','section'=>$key,'dc'=>time()));?>"><?php echo $val['label']?></a>
          </li>
          <?php
        endforeach;
        ?>
          <li role="presentation" class="<?php echo $_GET["page"] === 'faq' ? 'active' : ''; ?>">
            <a href="/support/?page=faq">Forms</a>
          </li>
      </ul>
    </div>
  </nav>

</div>
