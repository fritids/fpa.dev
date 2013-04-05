<div id="page-header">
	<h1 class="checker"><?php the_title(); ?></h1>
	<?php if(types_render_field("page-description", $raw)) : ?>
		<h2><?php echo types_render_field("page-description", $raw); ?></h2>
	<?php endif; ?>
</div><!-- #page-header -->