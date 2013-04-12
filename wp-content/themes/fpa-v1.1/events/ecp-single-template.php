<?php
/**
*  If 'Default Events Template' is selected in Settings -> The Events Calendar -> Theme Settings -> Events Template, 
*  then this file loads the page template for all for the individual 
*  event view.  Generally, this setting should only be used if you want to manually 
*  specify all the shell HTML of your ECP pages in this template file.  Use one of the other Theme 
*  Settings -> Events Template to automatically integrate views into your 
*  theme.
*
* You can customize this view by putting a replacement file of the same name (ecp-single-template.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); } 
?>
<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<?php tribe_events_before_html(); ?>
<div class="row-fluid parent-row">
	<section id="post-<?php the_ID(); ?>" <?php post_class("span8 plain"); ?>>
		<h2 class="entry-title"><?php the_title(); ?></h2>
		<?php include(tribe_get_current_template()); ?>
		<?php edit_post_link(__('Edit','tribe-events-calendar'), '<span class="edit-link">', '</span>'); ?>
	</section><!-- post -->
	<section class="span4 plain">
		<h4>Results</h4>
		<?php
		echo get_queried_object();
		$results = new WP_Query( array(
			  'connected_type' => 'player_to_event',
			  'connected_items' => get_queried_object(),
			  'nopaging' => true
			) 
		);
		if($results->have_posts()) : ?>
			<table class="player-events">
				<tr class="labels"><td class="event-label">Name</td><td class="finish-label">Finish</td></tr>
				<?php while($results->have_posts()) : $results->the_post();
					$playerName = get_the_title();
					$playerLink = get_permalink();
					$playerFinish = p2p_get_meta( $post->p2p_id, 'finish', true );
					echo '<tr class="player-event"><td class="player-event-name"><a href="' . $playerLink . '">' . $playerName . '</a></td><td class="player-event-finish">' . $playerFinish . '</td></tr>';
				endwhile; ?>
			</table>
		<?php endif; ?>
	</section>
	<?php if(tribe_get_option('showComments','no') == 'yes'){ comments_template(); } ?>
</div>
<?php tribe_events_after_html(); ?>
<?php get_footer(); ?>
