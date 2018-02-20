<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); ?>

<section id="main-section" class="main-section">


	<div id="primary" class="row-fluid">
		<div id="content" role="main" class="span8 offset2">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); $class=""; ?>


					<section id="the-main-content" class="the-main-content">

						<div class="content-container <?php print $class; ?>">

							<article class="post">

									<div class="the-content">
                    <h1><?php the_title(); ?></h1>
										<?php the_content(); ?>
                    <?php if( have_rows('documents') ):   ?>
                      <?php while( have_rows('documents') ): the_row();?>
                        <div class="flex-col document">
                          <h6 class="document-name"><a href="<?php the_sub_field('document_file'); ?>"><?php the_sub_field('document_file'); ?></a></h6>
                        </div>
                      <?php endwhile; ?>
                    <?php endif; ?>



										<?php wp_link_pages(); ?>
									</div><!-- the-content -->

							</article>

						</div>


					</section>


				<?php endwhile; ?>


			<?php else : ?>

				<article class="post error">
					<h1 class="404">Nothing has been posted like that yet</h1>
				</article>

			<?php endif;  ?>

		</div><!-- #content .site-content -->
	</div><!-- #primary .content-area -->

	<?php include ("modules/modules.php"); ?>

</section>
<?php get_footer(); ?>
