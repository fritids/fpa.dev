<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<?php the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span4 plain">
		<?php filter_field("sidebar-content", $raw); ?>
	</section>
	<section class="span8 gray checker">
		<?php the_content(); ?>
	</section>
</div>

<?php get_footer(); ?>