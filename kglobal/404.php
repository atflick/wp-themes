<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

<main class="nav-padding">
	<section class="error-404 flex-container module-padding side-padding">
		<div class="squirrel">

		</div>
		<h1>Oops! That page can&rsquo;t be found.</h1>

		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyseventeen' ); ?></p>
			<?php get_search_form(); ?>
		</div>

	</section>
</main>

<?php get_footer();
