<?php
/**
 * Template Name: Contact Us template
 */
 ?>

<?php include ("modules/secondary_menu.php"); ?>

	<section id="main-section" class="main-section">

		<?php get_header(); ?>

		<section id="the-main-content" class="module the-main-content gray-bg flex-padding contact-page">

        <h2 class="underlined"><?php the_title();?></h2>

  			<div class="flex-container width-960">
  				<div class="contact-form">
  					<?php wpforms_display( '4877' ); ?>
  				</div>

    			<section class="sidebar-right">
    					<div class="the-content">
    						<?php while ( have_posts() ) : the_post(); ?>
    							<?php the_content(); ?>
    						<?php endwhile; ?>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12042.741361897186!2d-80.09462456428442!3d40.316790579198816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8834f89a42751de5%3A0x79ba8b8be633b46f!2sChart+Institute+LLC!5e0!3m2!1sen!2sus!4v1497976028986" width="100%" height="300" frameborder="0" style="border:0" disableDefaultUI="true" scrollwheel="false" navigationControl="false" mapTypeControl="false"></iframe>
    						<?php wp_link_pages(); ?>
    					</div><!-- the-content -->

    			</section>
        </div>

		</section>

		<?php include ("modules/modules.php"); ?>


	</section>

<?php get_footer(); ?>
