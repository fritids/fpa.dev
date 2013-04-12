<?php get_header();

$user = get_user_by( 'slug', $author_name );
$userID = $user->data->ID;
$first_name = get_user_meta($userID, "first_name", true);
$last_name = get_user_meta($userID, "last_name", true);
$full_name = $first_name . " " . $last_name;
$description = get_user_meta($userID, "description", true);
$action_shot_one = get_user_meta($userID, "action_shot_one", true);
$country_name = get_user_meta($userID, "country_name", true);
$favorite_moves = get_user_meta($userID, "favorite_moves", true);
$rank = get_user_meta($userID, "rank", true);
		
page_header($full_name); ?>

<div class="row-fluid parent-row">
	<section class="span8 plain">
		<?php if($action_shot_one != "") { ?>
			<div class="row-fluid">
				<img src="<?php echo site_url() . "/wp-content/uploads/" . $action_shot_one; ?>" />
			</div>
		<?php } ?>
		<ul class="row-fluid user-meta">
			<?php if($country_name != "") { ?>
				<li>
					<h4>Country</h4>
					<p><?php echo $country_name; ?></p>
				</li>
			<?php }
			if($description != "") { ?>
				<li>
					<h4>About Me</h4>
					<p><?php echo $description; ?></p>
				</li>
			<?php } ?>
		</ul>
	</section>
	<section class="span4 plain">
		<h4>Recent Finishes</h4>
		<?php
		$events = new WP_Query( array(
			  'connected_type' => 'player_to_event',
			  'connected_items' => get_user_by( 'slug', $author_name ),
			  'suppress_filters' => false,
			  'nopaging' => true
			) 
		);
		if($events->have_posts()) : ?>
			<table class="player-events">
				<tr class="labels"><td class="event-label">Event</td><td class="finish-label">Finish</td></tr>
				<?php while($events->have_posts()) : $events->the_post();
					$eventTitle = get_the_title();
					$eventLink = get_permalink();
					$finish = p2p_get_meta( $post->p2p_id, 'finish', true );
					echo '<tr class="player-event"><td class="player-event-name"><a href="' . $eventLink . '">' . $eventTitle . '</a></td><td class="player-event-finish">' . $finish . '</td></tr>';
				endwhile; ?>
			</table>
		<?php endif; ?>
	</section>
</div>

<?php get_footer(); ?>