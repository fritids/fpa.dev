<?php /* Template Name: Players */ ?>

<?php get_header(); the_post(); ?>

<?php page_header(get_the_title()); ?>

<section class="row-fluid parent-row gray">
	<div class="span6">
		<div class="row-fluid">
			<h3 class="white">Featured Men</h3>
		</div>
		<?php 
			$args = array(
				"orderby"	=>	"rand",
				"meta_key"	=>	"action_shot_one"
			); 
			$users = get_users( $args );
		?>
			
		<ul class="row-fluid">
			
		<?php foreach($users as $user) {
			$userID = $user->data->ID;
			$first_name = get_user_meta($userID, "first_name", true);
			$last_name = get_user_meta($userID, "last_name", true);
			$description = get_user_meta($userID, "description", true);
			$action_shot_one = get_user_meta($userID, "action_shot_one", true);
			$country_name = get_user_meta($userID, "country_name", true);
			$favorite_moves = get_user_meta($userID, "favorite_moves", true);
			$rank = get_user_meta($userID, "rank", true);
			
			?>
			
			<li class="row-fluid overlay-item feature-player">
				<a href="<?php echo get_author_posts_url($userID); ?>">
					<img src="<?php echo site_url() . "/wp-content/uploads" . $action_shot_one; ?>" />
					<div class="overlay">
						<h2><?php echo $first_name . " " . $last_name; ?></h2>
					</div>
				</a>
			</li>
			
		<?php } ?>
		</ul>
	</div>
	<div class="span6">
		<div class="row-fluid">
			<h3 class="white">Featured Women</h3>
		</div>
		<?php 
			$args = array(
				"orderby"	=>	"rand",
				"meta_key"	=>	"action_shot_one"
			); 
			$users = get_users( $args );
		?>
			
		<ul class="row-fluid">
			
		<?php foreach($users as $user) {
			$userID = $user->data->ID;
			$first_name = get_user_meta($userID, "first_name", true);
			$last_name = get_user_meta($userID, "last_name", true);
			$description = get_user_meta($userID, "description", true);
			$action_shot_one = get_user_meta($userID, "action_shot_one", true);
			$country_name = get_user_meta($userID, "country_name", true);
			$favorite_moves = get_user_meta($userID, "favorite_moves", true);
			$rank = get_user_meta($userID, "rank", true);
			
			?>
			
			<li class="row-fluid overlay-item feature-player">
				<a href="<?php echo get_author_posts_url($userID); ?>">
					<img src="<?php echo site_url() . "/wp-content/uploads/" . $action_shot_one; ?>" />
					<div class="overlay">
						<h2><?php echo $first_name . " " . $last_name; ?></h2>
					</div>
				</a>
			</li>
			
		<?php } ?>
		</ul>
	</div>
</section>

<?php get_footer(); ?>