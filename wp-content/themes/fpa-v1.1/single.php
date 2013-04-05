<?php
/**
 * The Template for displaying all single posts.
 *
 * @package fpa
 * @since fpa 1.0
 */

get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<?php get_template_part( 'content', 'single' ); ?>

		<?php fpa_content_nav( 'nav-below' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template( '', true );
		?>
	</section>
	<section class="span4 plain">
		<?php get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>