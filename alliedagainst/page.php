<?php get_header(); ?>

<main id="main-section" class="main-section">
	<!-- Page Content Area -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php if( !have_rows('module') ) : ?>
				<section id="base-page-hero" class="flex-container alternate-hero <?php echo get_the_post_thumbnail_url() ? '': 'no-image full-width-header-text'; ?>" <?php echo get_the_post_thumbnail_url() ? 'style="background:url(' . get_the_post_thumbnail_url() . ') no-repeat top center;background-size: cover;' : ''; ?>>
					<div class="flex-container flex-60 flex-col highlight-container column">
						<h1> <?php the_title(); ?> </h1>
					</div>
				</section>

				<section class="flex-container column module-padding base-page-content wysiwyg">
					<?php the_content(); ?>
				</section><!-- the-content -->
			<?php endif; ?>
		<?php endwhile; ?>
	<?php endif;  ?>
	<!-- Page Modules -->
	<?php include ("modules/modules.php"); ?>
</main>

<?php get_footer(); ?>
