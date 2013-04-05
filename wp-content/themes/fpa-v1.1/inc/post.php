<li class="post row-fluid">
	<?php if(has_post_thumbnail()) : ?>
		<div class="span4">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="span8">
	<?php else : ?>
		<div class="span12">
	<?php endif; ?>
		<h5><?php echo get_the_date(); ?></h5>
		<h4><a href="<?php if(types_render_field("news-source-url", $raw)) : echo types_render_field("news-source-url", $raw); else : the_permalink(); endif; ?>"><?php the_title(); ?></a></h4>
		<?php if(types_render_field("news-description", $raw)) : ?>
			<div><?php echo types_render_field("news-description", $raw); ?></div>
		<?php else : ?>
			<div><?php the_excerpt(); ?></div>
		<?php endif; ?>
		<?php if(types_render_field("news-source-name", $raw)) : ?>
			<h6><?php echo types_render_field("news-source-name", $raw); ?></h6>
		<?php endif; ?>
	</div>
</li>