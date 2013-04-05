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
		<h4>Event Victories</h4>
		<ul class="victories">
			<li><a href="#">Lorem ipsum dolor sit amet</a></li>
			<li><a href="#">onsectetur adipisicing elit</a></li>
			<li><a href="#">sed do eiusmod tempor incididunt ut labore</a></li>
			<li><a href="#">et dolore magna aliqua. Ut enim ad minim veniam</a></li>
			<li><a href="#">quis nostrud exercitation ullamco laboris nisi</a></li> 
			<li><a href="#">ut aliquip ex ea commodo consequat</a></li>
		</ul>
	</section>
</div>

<?php get_footer(); ?>