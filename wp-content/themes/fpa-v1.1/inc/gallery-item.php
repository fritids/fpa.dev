<li class="span3 gallery-item">
	<?php 
		if(types_render_field("gallery-image", $raw)) :
			$href = types_render_field("gallery-image", $raw);
			$img = types_render_field("gallery-image", $thumbnail);
		else :
			$imgid = types_render_field("gallery-video-id", $raw);
			$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
			$href = "http://player.vimeo.com/video/$imgid";
			$img = "<img src='" . $hash[0]['thumbnail_large'] . "' />";
		endif;
	?>
	<a href="<?php echo $href; ?>" rel="shadowbox[Gallery]">
		<?php echo $img; ?>
	</a>
	<div class="overlay">
		<h3><a href="<?php echo $href; ?>" rel="shadowbox[Gallery2]"><?php the_title(); ?></a></h3>
		<?php echo get_the_term_list($post->ID, "gallery-album", "", ", ", ""); ?>
	</div>
</li>