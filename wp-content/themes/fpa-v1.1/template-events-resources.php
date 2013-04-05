<?php /* Template Name: events/resources */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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
				<div class="btn-icon player"></div>
				<h4>Jam Camp</h4>
			</a>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>