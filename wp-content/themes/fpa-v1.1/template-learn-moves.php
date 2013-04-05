<?php /* Template Name: learn/moves */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<section class="media-player-container row-fluid parent-row split-bg no-pad-left no-pad-top">
	<div class="media-categories pull-left add-pad-right">
		<div class="media-cat-header row-fluid add-pad-left add-pad-top checker">
			<h4>Categories</h4>
		</div>
		<ul class="media-cat-list row-fluid">
			<?php
				$postType = "move";
				$moveTypes = get_terms("move_type");
				$count = 1;
				foreach($moveTypes as $type) { ?>
					<li class="media-cat <?php if($count == 1) { echo "active"; } ?>" data-post_type="<?php echo $postType; ?>" data-taxonomy="<?php echo $type->taxonomy; ?>" data-tax_name="<?php echo $type->slug; ?>">
						<?php echo $type->name; ?><i class="icon-arrow-right pull-right"></i>
					</li>
					<?php $count++;
				}
			?>
		</ul>
	</div>
	<div id="ajax-load-media" class="media-player span8 no-mar pull-right add-pad-top">
		<div id="media-loader" class="loading">
			<img src="<?php echo get_template_directory_uri(); ?>/lib/img/loading.png" />
			<i class="icon-repeat icon-spin"></i>
		</div>
	</div>
</section>

<div class="row-fluid parent-row">
	<section class="span12 plain">
		<h3 class="row-fluid">Featured Clips</h3>
		<?php 
		$args = array(
			"post_type"			=>	"move",
			"posts_per_page"	=>	-1,
			"move-category"	=>	"featured"
		);
		$featured = new WP_Query($args);
		if($featured->have_posts()) : ?>
			<div class="row-fluid parent-row">
				<ul id="feature-carousel" class="elastislide-list">
					<?php while($featured->have_posts()) : $featured->the_post(); ?>
						<?php
						$imgid = types_render_field("vimeo-video-id", $raw);
						$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
						$href = "http://player.vimeo.com/video/$imgid";
						$img = "<img src='" . $hash[0]['thumbnail_medium'] . "' />";
						
						$title = get_the_title();
						
						$desc = types_render_field("video-description", $raw);;
						?>
						<li id="<?php echo $imgid; ?>" class="overlay-item">
							<a href="<?php echo $href; ?>" rel="shadowbox[Gallery]"><?php echo $img; ?></a>
							<div class="overlay">
								<h3><a href="<?php echo $href; ?>" rel="shadowbox[Gallery2]"><?php the_title(); ?></a></h3>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; wp_reset_postdata(); ?>
	</section>
</div>

<?php get_footer(); ?>