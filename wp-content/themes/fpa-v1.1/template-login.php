<?php /* Template Name: Login */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<?php if(get_the_content() != "") { ?>
	<section class="row-fluid parent-row plain">
		<?php the_content(); ?>
	</section>
<?php } ?>

<section id="login-content" class="row-fluid parent-row gray checker">
	<div class="form-wrapper">
		<?php filter_field("login-shortcode", $raw); ?>
	</div>
</section>

<?php get_footer(); ?>