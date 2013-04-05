<?php /* Template Name: Load Moves Ajax */

// Our variables
$moveType = (isset($_GET['moves'])) ? $_GET['moves'] : 0;

query_posts(array("post_type" => "move", "posts_per_page" => -1, "move-type" => $moveType));

// our loop
if (have_posts()) : ?>
	<ul id="carousel" class="elastislide-list">
		<?php $track = 1; ?>
		<?php while (have_posts()) : the_post();
			$imgid = types_render_field("vimeo-video-id", $raw);
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
			$href = "http://player.vimeo.com/video/$imgid";
			$img = "<img src='" . $hash[0]['thumbnail_medium'] . "' />";
			
			$title = get_the_title();
			
			$desc = types_render_field("video-description", $raw);
			
			if($track == 1) : ?>
				<li id="<?php echo $imgid; ?>" class="overlay-item active">
			<?php else : ?>
				<li id="<?php echo $imgid; ?>" class="overlay-item">
			<?php endif; ?>
				<?php echo $img; ?>
				<div class="overlay">
					<h3><?php the_title(); ?></h3>
					<i class="playing icon-play-circle"></i>
				</div>
			</li>
			<?php $track++; ?>
		<?php endwhile; ?>
	</ul>
<?php endif; wp_reset_query(); ?>