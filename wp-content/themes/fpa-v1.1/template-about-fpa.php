<?php /* Template Name: About -> FPA */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row matched-row">
	<section class="span4 plain match-me">
		<?php the_content(); ?>
	</section>
	<section id="logo-wrap" class="span8 blue checker match-me text-align-center">
		<img id="about-logo" src="<?php echo get_template_directory_uri(); ?>/lib/img/fpa-logo-big.png" />
	</section>
</div>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<h3>FPA's Official Blog</h3>
		<?php
		$args = array(
			"post_type"			=>	"post",
			"posts_per_page"	=>	5,
			"paged"				=>	$paged
		);
		post_list($args); ?>
	</section>
	<div class="span4 btn-area">
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon fpa"></div>
				<h4>Join the FPA</h4>
			</a>
		</div>
		<div class="row-fluid">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon grant"></div>
				<h4>Become a Sponsor</h4>
			</a>
		</div>
		<div class="row-fluid">
			<a href="#" class="span6 secondary-btn">
				<h4>Board Forum</h4>
			</a>
			<a href="#" class="span6 secondary-btn">
				<h4>By-Laws</h4>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>