<?php /* Template Name: About -> Freestyle */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row matched-row">
	<section class="span12 plain match-me no-pad">
		<?php the_post_thumbnail("full"); ?>
	</section>
</div>

<section class="row-fluid parent-row plain">
	<div class="span7">
		<?php filter_field("about-freestyle-what", $raw); ?>
	</div>
	<div class="span5">
		<?php filter_field("about-freestyle-history", $raw); ?>
	</div>
</section>

<section class="row-fluid parent-row plain no-pad">
	<div class="row-fluid add-pad">
		<?php filter_field("about-freestyle-judging", $raw); ?>
	</div>
	<div class="row-fluid blue checker inset add-pad">
		<div class="span4">
			<?php filter_field("about-freestyle-judging-artistic", $raw); ?>
		</div>
		<div class="span4">
			<?php filter_field("about-freestyle-judging-difficulty", $raw); ?>
		</div>
		<div class="span4">
			<?php filter_field("about-freestyle-judging-execution", $raw); ?>
		</div>
	</div>
	<div class="row-fluid add-pad">
	
	</div>
</section>

<div class="row-fluid parent-row">
	<div class="span12 btn-area">
		<div class="row-fluid">
			<a href="#" class="span4 primary-btn">
				<div class="btn-icon grant"></div>
				<h4>Become a Sponsor</h4>
			</a>
			<a href="#" class="span4 primary-btn">
				<div class="btn-icon fpa"></div>
				<h4>Join the FPA</h4>
			</a>
			<a href="#" class="span4 primary-btn">
				<div class="btn-icon player"></div>
				<h4>Freestyle Moves</h4>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>