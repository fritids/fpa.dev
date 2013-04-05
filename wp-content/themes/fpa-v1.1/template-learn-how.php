<?php /* Template Name: learn/how-where */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php page_header(get_the_title()); ?>

<div class="row-fluid parent-row">
	<section class="span12 gray">
		<div class="span8">
			<?php $imgid = types_render_field("vimeo-video-id", $raw); ?>
			<iframe src="http://player.vimeo.com/video/<?php echo $imgid; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=A20E00" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<div class="span4">
			<div class="row-fluid plain">
				<h2>Ad Space</h2>
				<p>Need to discuss how ads are being maintained? Manually? Google Adsense, BuySellAds, etc? Will affect how this area is developed</p>
			</div>
			<div class="row-fluid">
				<a href="#" class="span12 primary-btn small">
					<div class="btn-icon cart pull-left"></div>
					<h4 class="pull-right">Purchase Video</h4>
				</a>
			</div>
		</div>
	</section>
</div>

<div class="row-fluid parent-row">
	<section class="span6 plain no-pad">
		<div class="row-fluid add-pad border-bottom">
			<h3 class="no-mar">Instruction</h3>
		</div>
		<div class="accordion" id="instructional-accordian">
			<?php get_instructionals("basic", true); ?>
			<?php get_instructionals("advanced"); ?>
		</div>			
	</section>
	<div class="span6">
		<section class="row-fluid plain">
			<h3>Freestyle World Map</h3>
			<p>This map includes places all over the world where frisbee freestylers meet to jam.</p>
			<?php echo apply_filters( 'the_content','[wpgmza id="1"]'); ?>
		</section>
		<div class="row-fluid parent-row">
			<a href="#" class="span12 primary-btn small">
				<div class="btn-icon player pull-left"></div>
				<h4 class="pull-right">Join Jammers on the Net</h4>
			</a>
		</div>
		<div class="row-fluid parent-row">
			<a href="#" class="span12 primary-btn small">
				<div class="btn-icon book pull-left"></div>
				<h4 class="pull-right">Teacher's Manual</h4>
			</a>
		</div>
		<div class="row-fluid parent-row">
			<a href="#" class="span12 primary-btn small">
				<div class="btn-icon scroll pull-left"></div>
				<h4 class="pull-right">History</h4>
			</a>
		</div>
		<div class="row-fluid parent-row">
			<a href="#" class="span12 primary-btn small">
				<div class="btn-icon grant pull-left"></div>
				<h4 class="pull-right">Jam Grant</h4>
			</a>
		</div>
	</div>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>