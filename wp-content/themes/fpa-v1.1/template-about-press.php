<?php /* Template Name: About -> Press */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<?php
		$args = array(
			"post_type"			=>	"news",
			"posts_per_page"	=>	7,
			"paged"				=>	$paged
		);
		post_list($args); ?>
	</section>
	<div class="span4 btn-area">
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon player"></div>
				<h4>What is Freestyle?</h4>
			</a>
		</div>
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon grant"></div>
				<h4>Become a Sponsor</h4>
			</a>
		</div>
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon camera"></div>
				<h4>View Gallery</h4>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>