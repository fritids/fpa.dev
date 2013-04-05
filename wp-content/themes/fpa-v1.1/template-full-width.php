<?php /* Template Name: Full Width */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span12 plain">
		<?php the_content(); ?>
	</section>
</div>

<?php get_footer(); ?>