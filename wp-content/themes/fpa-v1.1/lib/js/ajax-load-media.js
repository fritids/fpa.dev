var loopHandler = window.loopHandler;
var $content = $("#ajax-load-media");
var $loading = $("#media-loader");
var loadingState = $content.html();

function afterLoad() {
	$loading.hide();
	$(".media-frame-wrap").fitVids();
	$('#carousel').elastislide();
	var $carItem, $videoFrame = $(".media-frame"), $videoDetails = $(".media-details"), output;
	$("#carousel li").click(function() {
		$carItem = $(this);
		if(!$carItem.hasClass("active")) {
			$("#carousel li.active").removeClass("active");
			$carItem.addClass("active");
			$videoFrame.attr("src", function() {
				return "http://player.vimeo.com/video/" + $carItem.attr("id") + "?title=0&amp;byline=0&amp;portrait=0&amp;color=A20E00";
			});
			output = '<h2 class="video-title">' + $carItem.data("title") + '</h2>';
			if($carItem.data("desc") !== "") {
				output += '<div class="video-desc">' + $carItem.data("desc") + '</div>';
			}
			$videoDetails.html(output);
		}
	});
}
//$content.load(loopHandler + "catches", function() { afterLoad(); });

var $activeCat = $(".media-cat.active"), query;
function loadMedia() {
	$content.html(loadingState);
	query = "?post_type=" + $activeCat.data('post_type') + "&taxonomy=" + $activeCat.data('taxonomy') + "&tax_name=" + $activeCat.data('tax_name');
	$content.load(loopHandler + query, function() { afterLoad(); });
}
loadMedia();
$(".media-cat").click(function() {
	$(".media-cat.active").removeClass("active");
	$activeCat = $(this);
	$activeCat.addClass("active");
	loadMedia();
});

$('#feature-carousel').elastislide();