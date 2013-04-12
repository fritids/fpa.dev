<?php

// BOOTSTRAP NAVIGATION
/////////////////////////////////////////////////////////////////////
require_once('twitter_bootstrap_nav_walker.php');

//ECHO AND FILTER CUSTOM FIELD OUTPUT
/////////////////////////////////////////////////////////////////////
function filter_field($field, $output_type) {
	$output = types_render_field($field, $output_type);
	$output = apply_filters("the_content", $output);
	$output = str_replace(']]>', ']]&gt;', $output);
	echo $output;
}

//PAGINATION
/////////////////////////////////////////////////////////////////////
function pagination($pages = '', $range = 2) {
	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}
	
	if(1 != $pages) {
		echo "<div class='pagination pagination-centered'><ul>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
		if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";
	
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
			}
		}
		
		if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
		if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
		echo "</ul></div>\n";
	}
}

function post_list($args) {
	$posts = new WP_Query($args);
	if($posts->have_posts()) : ?>
		<ul class="posts">
		<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
			<li class="post row-fluid">
				<?php if(has_post_thumbnail()) : ?>
					<a href="<?php if(types_render_field("news-source-link", $raw)) : echo types_render_field("news-source-link", $raw); else : the_permalink(); endif; ?>" class="span4">
						<?php the_post_thumbnail(); ?>
					</a>
					<div class="span8">
				<?php else : ?>
					<div class="span12">
				<?php endif; ?>
					<h5><?php echo get_the_date(); ?></h5>
					<h4><a href="<?php if(types_render_field("news-source-link", $raw)) : echo types_render_field("news-source-link", $raw); else : the_permalink(); endif; ?>"><?php the_title(); ?></a></h4>
					<?php if(types_render_field("news-description", $raw)) : ?>
						<?php echo types_render_field("news-description", $raw); ?>
					<?php else : ?>
						<?php the_excerpt(); ?>
					<?php endif; ?>
					<?php if(types_render_field("news-source-name", $raw)) : ?>
						<h6><?php echo types_render_field("news-source-name", $raw); ?></h6>
					<?php endif; ?>
				</div>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php pagination($posts->max_num_pages); ?>
		<?php $has_posts = true; ?>
	<?php else : ?>
		<?php $has_posts = false; ?>
	<?php endif; wp_reset_postdata(); ?>
<?php }

//GET RESOURCES
//$resource_cat: (STRING)->Resource Category Slug 
//$show: (BOOLEAN)->Set to true if you want to display the accordion group on page load. Set to false to collapse it.
//Outputs accordion group and list of resources.
/////////////////////////////////////////////////////////////////////
function get_resources($resource_cat, $show = false) {
	$args = array(
		"post_type"			=>	"resource",
		"posts_per_page"	=>	-1,
		"resource-category"	=>	$resource_cat
	);
	$resources = new WP_Query($args);
	if($resources->have_posts()) : ?>
	<div class="accordion-group <?php if($show == true) : echo "active-group"; endif; ?>">
		<div class="accordion-heading row-fluid">
			<a class="accordion-toggle <?php if($show == false) : echo "collapsed"; endif; ?>" data-toggle="collapse" data-parent="#resource-accordian" href="#<?php echo $resource_cat; ?>">
				<?php $term = get_term_by( 'slug', $resource_cat, "resource-category" ); ?>
				<h4 class="span11"><?php echo $term->description; ?></h4>
				<div class="span1"><i class="icon-chevron-down pull-right"></i></div>
			</a>
		</div>
		<div id="<?php echo $resource_cat; ?>" class="accordion-body row-fluid collapse <?php if($show == true) : echo "in"; endif; ?>">
			<div class="accordion-inner blue checker inset">
				<ul class="downloads row-fluid">
					<?php while($resources->have_posts()) : $resources->the_post(); ?>
						<li class="download span3">
							<?php $file = types_render_field("resource-file", $raw); ?>
							<?php $pieces = explode(".", $file); ?>
							<?php $extension = end($pieces); ?> 
							<a href="<?php echo $file; ?>" target="_blank">
								<div class="file-icon-wrap">
									<!-- <img src="<?php echo get_template_directory_uri(); ?>/lib/img/file-download.png" /> -->
									<div class="ascpect-ratio"></div>
									<div class="file-icon <?php echo $extension; ?>"></div>
									<h5 class="file-type"><?php echo $extension; ?></h5>
								</div>
								<h3><?php the_title(); ?></h3>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php endif; wp_reset_postdata();
}

//GET INSTRUCTIONALS
//$difficulty: (STRING)->Difficulty Level Category Slug 
//$show: (BOOLEAN)->Set to true if you want to display the accordion group on page load. Set to false to collapse it.
//Outputs accordion group and list of resources.
/////////////////////////////////////////////////////////////////////
function get_instructionals($difficulty, $show = false) {
	$args = array(
		"post_type"			=>	"instructional",
		"posts_per_page"	=>	-1,
		"difficulty-level"	=>	$difficulty
	);
	$instructionals = new WP_Query($args);
	if($instructionals->have_posts()) : ?>
	<div class="accordion-group <?php if($show == true) : echo "active-group"; endif; ?>">
		<div class="accordion-heading row-fluid">
			<a class="accordion-toggle <?php if($show == false) : echo "collapsed"; endif; ?>" data-toggle="collapse" data-parent="#instructional-accordian" href="#<?php echo $difficulty; ?>">
				<?php $term = get_term_by( "slug", $difficulty, "difficulty-level" ); ?>
				<?php if($term->description) : ?>
					<h4 class="span11"><?php echo $term->description; ?></h4>
				<?php else :  ?>
					<h4 class="span11"><?php echo $term->name; ?></h4>
				<?php endif; ?>
				<div class="span1"><i class="icon-chevron-down pull-right"></i></div>
			</a>
		</div>
		<div id="<?php echo $difficulty; ?>" class="accordion-body row-fluid collapse <?php if($show == true) : echo "in"; endif; ?>">
			<div class="accordion-inner blue checker inset">
				<ul class="instructionals row-fluid">
					<?php while($instructionals->have_posts()) : $instructionals->the_post(); ?>
						<li class="instructional row-fluid">
							<?php
							$imgid = types_render_field("vimeo-video-id", $raw);
							$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
							$href = "http://player.vimeo.com/video/$imgid";
							$img = "<img src='" . $hash[0]['thumbnail_large'] . "' />";
							
							$title = get_the_title();
							
							$desc = types_render_field("video-description", $raw);;
							?>
							<a class="span4" href="<?php echo $href; ?>" rel="shadowbox[<?php echo $difficulty; ?>]">
								<?php echo $img; ?>
							</a>
							<div class="span8">
								<h3><a href="<?php echo $href; ?>" rel="shadowbox[<?php echo $difficulty; ?>2]"><?php echo $title; ?></a></h3>
								<?php echo $desc; ?>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php endif; wp_reset_postdata();
}

//PAGE HEADER
/////////////////////////////////////////////////////////////////////
function page_header($title) { ?>
	<div id="page-header">
		<h1 class="checker"><?php echo $title; ?></h1>
		<?php if(types_render_field("page-description", $raw)) : ?>
			<h2><?php echo types_render_field("page-description", $raw); ?></h2>
		<?php endif; ?>
	</div><!-- #page-header -->
<?php }

//MEDIA AJAX LOOP HANDLER
/////////////////////////////////////////////////////////////////////
function ajaxMediaLoop($postType, $taxonomy, $taxName) {
	$args = array(
		"post_type"			=>	$postType,
		"posts_per_page"	=>	1,
		$taxonomy			=>	$taxName
	);
	$mainVid = new WP_Query($args);
	if($mainVid->have_posts()) : while($mainVid->have_posts()) : $mainVid->the_post(); ?>
		<div class="row-fluid loading media-frame-wrap">
			<i class="icon-repeat icon-spin"></i>
			<?php $imgid = types_render_field("vimeo-video-id", $raw); ?>
			<iframe class="media-frame" src="http://player.vimeo.com/video/<?php echo $imgid; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=A20E00" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		</div>
		<div class="row-fluid media-details">
			<h2 class="media-title"><?php the_title(); ?></h2>
			<div class="media-desc">
				<?php filter_field("video-description", $raw); ?>
			</div>
		</div>
	<?php endwhile; endif; wp_reset_postdata();
	
	$args = array(
		"post_type"			=>	$postType,
		"posts_per_page"	=>	-1,
		$taxonomy			=>	$taxName
	);
	$media = new WP_Query($args);
	
	if ($media->have_posts()) : ?>
		<div class="row-fluid parent-row elastislide-container">
			<ul id="carousel" class="elastislide-list">
				<?php $track = 1; ?>
				<?php while ($media->have_posts()) : $media->the_post();
					$imgid = types_render_field("vimeo-video-id", $raw);
					$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$imgid.php"));
					$href = "http://player.vimeo.com/video/$imgid";
					$img = "<img src='" . $hash[0]['thumbnail_medium'] . "' />";
					
					$title = get_the_title();
					
					$desc = types_render_field("video-description", $raw); ?>
					
					<li id="<?php echo $imgid; ?>" class="overlay-item <?php if($track == 1) { echo 'active'; } ?>" data-title="<?php the_title(); ?>" data-desc="<?php filter_field("video-description", $raw); ?>">
						<?php echo $img; ?>
						<div class="overlay">
							<h3><?php the_title(); ?></h3>
							<i class="playing icon-play-circle"></i>
						</div>
					</li>
					<?php $track++; ?>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; wp_reset_query();
}

//REGISTER OTHER MENUS
/////////////////////////////////////////////////////////////////////
register_nav_menus( array(
	'footer_menu' => 'Footer Menu'
));
register_nav_menus( array(
	'account-menu' => 'Account Menu'
));

//POST RELATIONSHIPS
/////////////////////////////////////////////////////////////////////
function my_connection_types() {
	p2p_register_connection_type( 
		array(
		    'name'				=> 'player_to_event',
		    'from'				=> 'player',
		    'to'				=> 'tribe_events',
		    'admin_column'		=> true,
		    'admin_dropdown'	=> true,
		    'admin_box'			=> array('show' => 'any', 'context' => 'advanced'),
		    'fields'			=> array(
		    	'round'	=> array(
		    		'title'	=> 'Round',
		    		'type'	=> 'text'
		    	),
		    	'finish'	=> array(
		    		'title'	=> 'Finished',
		    		'type'	=> 'number'
		    	)
		    )
		)
	);
}
add_action( 'p2p_init', 'my_connection_types' );