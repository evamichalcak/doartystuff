<?php

/**

 * The template for displaying all pages.

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site will use a

 * different template.

 *

 * @package aThemes

 */



get_header(); ?>



	<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">



			<?php while ( have_posts() ) : the_post(); ?>

<?php query_posts($query_string . '&category_name=events'); ?>
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php if(the_event_start_date(null, false, mdY) >= date(mdY)) : ?>
		<li class="event">
			<?php if ( is_new_event_day() ) : ?><h4 class="event-day"><?php echo the_event_start_date( null, false ); ?></h4><?php endif; ?>
			<div class="event-content">
				<?php the_title('<h2 class="event-title"><a href="' . get_permalink() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></h2>'); ?>
				<?php the_excerpt() ?>
			</div>
		</li>
	<?php endif; ?>
<?php endwhile; else: ?>
	<p>No Events</p>
<?php endif; ?>



<!-- 
				<?php get_template_part( 'content', 'page' ); ?>



				<?php

					// If comments are open or we have at least one comment, load up the comment template

					if ( comments_open() || '0' != get_comments_number() )

						comments_template();

				?> 



			<?php endwhile; // end of the loop. ?>



		<!-- #content --></div>

	<!-- #primary --></div>



<?php get_sidebar(); ?>

<?php get_footer(); ?>