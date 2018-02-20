<?php
/**
 * The template for displaying archive pages

 */

get_header(); ?>

<main>

	<?php if ( have_posts() ) : ?>
		<section class="nav-padding">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>

	<?php endif; ?>



		<?php
		if ( have_posts() ) : ?>
			<?php

			while ( have_posts() ) : the_post();

         the_title();

			endwhile;

		else :



		endif; ?>

</main>


<?php get_footer();
