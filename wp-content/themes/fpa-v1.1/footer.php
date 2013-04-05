		</div><!-- #content -->
	</div><!-- #main -->

	<footer id="colophon" class="row-fluid" role="contentinfo">
		<div class="span6">
			<h5><span class="copyright">&#0169;</span> <?php echo date("Y"); ?> Freestyle Players Association. All Rights Reserved.</h5>
		</div>
		<div class="span6">
			<?php 
			    wp_nav_menu( array(
			        'menu'       => 'Footer Navigation',
			        'depth'      => 2,
			        'container'  => false,
			        'menu_class' => 'pull-right',
			        //Process nav menu using our custom nav walker
			        'walker' => new twitter_bootstrap_nav_walker())
			    );
			?>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/lib/js/main.min.js"></script>
<script type="text/javascript">var loopHandler = "<?php echo get_template_directory_uri(); ?>/ajax-load-media.php";</script>

<?php if(is_page_template("template-learn-moves.php")) { ?>
	<script src="<?php echo get_template_directory_uri(); ?>/lib/js/ajax-load-media.min.js"></script>
<?php } ?>

<?php if(is_page_template("template-membership.php") || is_page_template("template-membership-options.php")) { ?>
	<script type="text/javascript">
		var $pricedetails = $(".pricedetails");
		$window.resize(function() {
			if($window.width() > 767) {
				sameHeight($pricedetails);
			}
			else {
				$pricedetails.css({height: "auto"});
			}
		}).resize();
		var $signupBtns = $(".button.blue");
		$signupBtns.html("<i class='icon-arrow-right'></i>");
		$signupBtns.addClass("btn-red btn-submit").removeClass("button blue");
		
		$(".form-membership").attr("action", function() {
			return $(this).attr("action") + "?action=registeruser";
		});
		
		//$("input[type=image]").attr("type", "submit").addClass("btn-upgrade");
		var $btn, btnHtml;
		$("input[type=image]").each(function() {
			$btn = $(this);
			btnHtml = $('<div>').append($btn.clone()).html();
			btnHtml = btnHtml.replace('<input', '<button');
			btnHtml = btnHtml.replace('type="image"', 'type="submit"');
			btnHtml = btnHtml.replace('>', 'class="btn-upgrade"><i class="icon-arrow-right"></i></button>');
			$btn.after(btnHtml).remove();
		});
		
	</script>
<?php } ?>

<?php if(is_page_template("template-account-overview.php")) { ?>
<!--
	<script src="<?php echo get_template_directory_uri(); ?>/lib/js/plugins/awesome-cropper-master/components/imgareaselect/scripts/jquery.imgareaselect.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/lib/js/plugins/awesome-cropper-master/build/jquery.awesome-cropper.js"></script>
	
	<script>
		$(document).ready(function() {
			var $uploader, uploaderHtml, $parent;
			$(".crop-me input[type=file]").each(function() {
				$uploader = $(this);
				$parent = $uploader.parent(".crop-me");
				$uploader.attr("id", "action_shot_one").attr("type", "hidden");
				$uploader.awesomeCropper({ width: 750, height: 310 });
				$parent.children(".awesome-cropper .control-group input[type=file]").change(function() {
					$("input[name=action_shot_one]").val($(this).val());
				});
			});
		});
	</script>
-->
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>