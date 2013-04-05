<?php
/**
 * The Template for displaying all single posts.
 *
 * @package fpa
 * @since fpa 1.0
 */

get_header(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<?php while ( have_posts() ) : the_post(); ?>
	
			<?php fpa_content_nav( 'nav-above' ); ?>
	
			<?php get_template_part( 'content', 'single' ); ?>
	
			<?php fpa_content_nav( 'nav-below' ); ?>
	
			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template( '', true );
			?>
	
		<?php endwhile; // end of the loop. ?>
	</section>
	<div class="span4">
		
	</div>
</div>

<?php get_footer(); ?>