<?php /* Template Name: Membership Options */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div id="my-subscription-options" class="row-fluid parent-row">
	<section class="row-fluid plain">
		<h3>My Subscription</h3>
		<p>Your current subscriptions are listed here. You can renew, cancel or upgrade your subscriptions by using the forms below.</p>
	</section>
	<div class="row-fluid parent-row">
		<?php filter_field("renew-shortcode", $raw); ?>
	</div>
</div>

<?php get_footer(); ?> 