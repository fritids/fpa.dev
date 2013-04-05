<?php get_header(); ?>

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
<?php page_header($term->name); ?>
			
<?php if ( have_posts() ) : ?>

<section class="row-fluid plain parent-row">
	<!-- <div class="row-fluid">
		<div class="span4">
			<form action="<?php bloginfo('url'); ?>" method="get">
			<?php 
				$args = array(
					'show_option_all'    => 'All Albums',
					'show_option_none'   => 'Choose Album ',
					'orderby'            => 'ID', 
					'order'              => 'ASC',
					'show_count'         => 1,
					'hide_empty'         => 1, 
					'child_of'           => 0,
					'exclude'            => '',
					'echo'               => 1,
					'selected'           => 0,
					'hierarchical'       => 0, 
					'name'               => 'gallery-album',
					'id'                 => '',
					'class'              => 'postform',
					'depth'              => 0,
					'tab_index'          => 0,
					'taxonomy'           => 'gallery-album',
					'hide_if_empty'      => false
				); 
				wp_dropdown_categories( $args ); 
			?>
			<input type="submit" name="submit" value="view" />
			</form>
		</div>
	</div> -->
	<div class="row-fluid">
		<ul class="span12 gallery">
			<?php $track = 1; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php if($track == 1 || $track % 5 == 0) : ?>
					<div class="row-fluid">
				<?php endif; ?>
				
				<li class="span3 overlay-item gallery-item">
					<?php 
						if(types_render_field("gallery-image", $raw)) :
							$href = types_render_field("gallery-image", $raw);
							$img = types_render_field("gallery-image", $thumbnail);
						else :
							$imgid = types_render_field("vimeo-video-id", $raw);
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
				
				<?php if($track % 4 == 0) : ?>
					</div>
				<?php endif; ?>
				<?php $track++; ?>
			<?php endwhile; ?>
		</ul>
	</div>
</section>

<?php else : ?>

	<?php get_template_part( 'no-results', 'archive' ); ?>

<?php endif; ?>

<?php get_footer(); ?>