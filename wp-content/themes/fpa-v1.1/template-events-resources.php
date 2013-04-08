<?php /* Template Name: Events -> Resources */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain no-pad">
		<div class="accordion" id="resource-accordian">
			<?php get_resources("applications", true); ?>
			<?php get_resources("tournament-organization"); ?>
			<?php get_resources("judging"); ?>
			<?php get_resources("press"); ?>
		</div>
	</section>
	<div class="span4 btn-area">
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon grant"></div>
				<h4>Jam Grant</h4>
			</a>
		</div>
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon fpa"></div>
				<h4>Contact FPA Board</h4>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>