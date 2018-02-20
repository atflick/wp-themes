<?php
/**
 *  Template Name: Tickets Page
 */

 if ( !is_user_logged_in() ) {
   $redirect_link = get_the_permalink();
   wp_redirect( '/wp-login.php/?redirect_to='.$redirect_link );
   exit;
 }

get_header();
?>


<section id="member-page" class="profile">
  <div class="flex-container member-container gray-bg">
    <div class="flex-container profile-title"><h3>Member Services</h3>
      <?php
      $user_info = get_userdata(get_current_user_id());
      $user_roles = $user_info->roles;
      $hos_index = (isset($_GET['i'])) ? $_GET['i'] : 0;
      if(!isset($hos_id)){
        $hos_id = get_field("hospital", 'user_'.get_current_user_id())[$hos_index];
      }
      ?>
      <?php include('modules/dashboard_search.php'); ?>
    </div>
    <?php $hos_id = get_field('hospital', 'user_'.get_current_user_id())[0]; ?>
    <?php include("member_sidebar.php"); ?>
    <div class="flex-col flex-3-4 ">


        <?php include('modules/ticketing_nav.php'); ?>


      <?php echo do_shortcode(' [wp_support_plus] '); ?>
    </div>
  </div>
</section>
<script>
// console.log($("#create_ticket_category"));
// $("#create_ticket_category").on('change', function() {
//   if($("#create_ticket_category").val() !== '2' || $("#create_ticket_category").val() !== '1' || $("#create_ticket_category").val() !== '3'){
//     var cat = $("#create_ticket_category option:selected").text();
//     $("#frmCreateNewTicket").append("<div> <strong> Please make sure to include the required " + cat + " form for this ticket. </strong>It can be found in the Forms section.</div>");
//   }
// })

</script>
<?php
get_footer();
 ?>
