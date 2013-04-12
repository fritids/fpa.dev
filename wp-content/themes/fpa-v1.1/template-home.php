<?php /* Template Name: Home */ ?>

<?php get_header(); the_post(); ?>

<?php $slides = new WP_Query(array("post_type" => "slide")); ?>
<?php if($slides->have_posts()) : ?>
<section class="carousel-wrap row-fluid plain no-pad no-radius-top-right no-radius-top-left">
	<div id="home-carousel" class="carousel slide">
		<div class="carousel-inner">
			<?php $count = 0; ?>
			<?php while ( $slides->have_posts() ) : $slides->the_post(); ?>
				<?php if($count == 0) { 
					$firstExcerpt = types_render_field("slide-description", $raw);
					$firstHref = types_render_field("slide-url", $raw);
					if(types_render_field("slide-btn-text", $raw)) {
						$firstBtnText = types_render_field("slide-btn-text", $raw);
					}
					else {
						$firstBtnText = "Learn More";
					}
				} ?>
				<div class="item<?php if($count == 0) { echo ' active'; } ?>" data-excerpt="<?php echo types_render_field("slide-description", $raw); ?>" data-href="<?php echo types_render_field("slide-url", $raw); ?>" data-button="<?php echo types_render_field("slide-btn-text", $raw); ?>">
					<div class="row-fluid slide-upper">
						<?php echo types_render_field("slide-image", $full); ?>
						<div class="slide-overlay">
							<h2 class="ellipsis" title="<?php the_title(); ?>"><?php the_title(); ?></h2>
						</div>
					</div>
				</div>
				<?php $count++; ?>
			<?php endwhile; ?>
		</div>
	</div>
	
	<div id="home-carousel-controls-wrap" class="row-fluid">
		<div id="slide-excerpt-wrap" class="row-fluid">
			<?php if($firstExcerpt != "") { ?>
				<div id="slide-excerpt" class="span9 hidden-phone">
					<?php echo $firstExcerpt; ?>
				</div>
				<a href="<?php echo $firstHref; ?>" id="slide-btn" class="span3 btn btn-red"><?php echo $firstBtnText; ?></a>
			<?php }
			else { ?>
				<a href="<?php echo $firstHref; ?>" id="slide-btn" class="span12 btn btn-red"><?php echo $firstBtnText; ?></a>
			<?php } ?>
		</div>
		<?php if($count > 0) { ?>
			<div id="home-carousel-controls" class="row-fluid">
				<div class="control-wrap left">
					<a class="carousel-control" href="#home-carousel" data-slide="prev"><i class="icon-arrow-left"></i></a>
				</div>
				<div class="control-wrap right">
					<a class="carousel-control" href="#home-carousel" data-slide="next"><i class="icon-arrow-right"></i></a>
				</div>
			</div>
		<?php } ?>
	</div>
</section>
<?php endif; wp_reset_postdata(); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<h3>Recent Posts</h3>
		<?php post_list("post", 5); ?>
		<div class="row-fluid">
			<div class="span3">Hey Now</div>
		</div>
	</section>
	<div class="span4">
		<section class="row-fluid no-pad plain">
			<img src="http://placehold.it/370x300" />
		</section>
		<section class="row-fluid parent-row plain">
			<?php tribe_calendar_mini_grid(); ?>
		</section>
	</div>
</div>

<div class="row-fluid parent-row">
	<div class="span12 btn-area">
		<div class="row-fluid">
			<a href="#" class="span4 primary-btn">
				<div class="btn-icon camera"></div>
				<h4>Submit Story</h4>
			</a>
			<a href="#" class="span4 primary-btn">
				<div class="btn-icon fpa"></div>
				<h4>Join the FPA</h4>
			</a>
			<a href="#" class="span4 primary-btn">
				<div class="btn-icon cart"></div>
				<h4>Store</h4>
			</a>
		</div>
	</div>
</div>

<?php get_footer(); ?>