<?php /* Template Name: Sidebar Left */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span4 plain">
		<?php filter_field("sidebar-content", $raw); ?>
	</section>
	<section class="span8 plain">
		<?php the_content(); ?>
	</section>
</div>

<?php get_footer(); ?>