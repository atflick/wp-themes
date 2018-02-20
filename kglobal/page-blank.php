<?php
/**
 * Template Name: Blank Content
 *
 */
get_header();

?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="flex-container column module-padding justify-center side-padding">
	<div class="content-area">
		<?php the_content(); ?>
	</div>
</section>
<?php endwhile; endif; ?>
<?php include ("modules/modules.php"); ?>
<?php
get_footer();
?>
