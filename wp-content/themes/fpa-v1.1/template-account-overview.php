<?php /* Template Name: Account Overview */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section id="my-profile" class="span8 plain">
		<div class="row-fluid">
			<h3>Edit Your Profile</h3>
		</div>
		<div class="row-fluid">
			<?php filter_field("edit-profile-shortcode", $raw); ?>
		</div>
	</section>
	<div class="span4">
		<section class="row-fluid plain">
			<h3>My Subscription</h3>
			<p>Your current subscriptions are listed here. You can renew, cancel or upgrade your subscriptions by using the forms below.</p>
		</section>
		<div id="my-subscription" class="row-fluid parent-row">
			<?php filter_field("renew-shortcode", $raw); ?>
		</div>
		<div class="row-fluid parent-row btn-area">
			<div class="row-fluid">
				<a href="<?php echo site_url(); ?>/join/" class="span12 primary-btn">
					<div class="btn-icon fpa"></div>
					<h4>Change Membership</h4>
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?> 