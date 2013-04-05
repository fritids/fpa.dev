<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package fpa
 * @since fpa 1.0
 */

get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<?php get_template_part( 'content', 'page' ); ?>
	</section>
	<section class="span4 plain">
		<?php get_sidebar(); ?>
	</section>
</div>

<?php get_footer(); ?>