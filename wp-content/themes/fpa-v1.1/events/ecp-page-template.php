<?php
/**
*  If 'Default Events Template' is selected in Settings -> The Events Calendar -> Theme Settings -> Events Template, 
*  then this file loads the page template for all ECP views except for the individual 
*  event view.  Generally, this setting should only be used if you want to manually 
*  specify all the shell HTML of your ECP pages in this template file.  Use one of the other Theme 
*  Settings -> Events Template to automatically integrate views into your 
*  theme.
*
* You can customize this view by putting a replacement file of the same name (ecp-page-template.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); } ?>
	
<?php get_header(); ?>

<?php page_header("Events Calendar"); ?>

<div class="row-fluid parent-row no-pad">
	<div class="span7 no-pad">
		<section class="row-fluid plain no-pad relative">
			<?php tribe_events_before_html(); ?>
			<?php include(tribe_get_current_template()); ?>
			<?php tribe_events_after_html(); ?>
		</section>
		<div class="row-fluid parent-row btn-area">
			<a href="#" class="span12 primary-btn">
				<div class="btn-icon grant"></div>
				<h4>Jam Grant</h4>
			</a>
		</div>
	</div>
	<div class="span5 no-pad">
		<section class="row-fluid plain">
			<h3>Upcoming Events</h3>
			<?php
			$args = array(
				"post_type"			=>	"tribe_events",
				"posts_per_page"	=>	3,
				"paged"				=>	$paged
			);
			post_list($args); ?>
		</section>
		<section class="row-fluid parent-row plain">
			<h3>Freestyle World Map</h3>
			<p>This map includes places all over the world where frisbee freestylers meet to jam.</p>
			<?php echo apply_filters( 'the_content','[wpgmza id="1"]'); ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>