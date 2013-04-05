<?php /* Template Name: Membership Pages */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<?php if(get_the_content() != "") { ?>
	<section id="join-content" class="row-fluid parent-row plain">
		<?php the_content(); ?>
	</section>
<?php } ?>
<div id="join-forms" class="row-fluid parent-row">
	<?php filter_field("subscription-shortcode", $raw); ?>
</div>

<?php get_footer(); ?>