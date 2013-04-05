//@codekit-prepend "jquery.fitvids.min.js";
//@codekit-prepend "modernizr.custom.17475.js";
//@codekit-prepend "jquerypp.custom.js";
//@codekit-prepend "jquery.elastislide.js";

//Match column heights of elements within .matched-row
//////////////////////////////////////////////////////////////////////////////////////////
var maxHeight;
function sameHeight($elems) {
	maxHeight = -1;
	$elems.each(function() {
		$(this).css({height: "auto"});
		maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
	});
	$elems.each(function() {
		$(this).height(maxHeight);
	});
}
var $window = $(window);
$window.resize(function() {
	if($window.width() > 767) {
		$(".matched-row").each(function() {
			sameHeight($(this).children(".match-me"));
		});
	}
	else {
		$(".matched-row").each(function() {
			$(".match-me").css({height: "auto"});
		});
	}
}).resize();

//Initiate the home carousel.
//////////////////////////////////////////////////////////////////////////////////////////
$('#home-carousel').carousel({
	interval: 6000
});

$(".carousel-wrap").each(function() {
	var $carouselWrap = $(this);
	var $carousel = $carouselWrap.children(".carousel");
	var $controls = $carouselWrap.children(".carousel-controls");
	var $active = $carousel.children().children(".active");
	$controls.height($active.children(".slide-lower").outerHeight());
});

//Gets and displays the active slide's caption.
var $excerptWrap = $("#slide-excerpt-wrap");
var $activeSlide, activeExcerpt, activeBtnText, activeHREF, activeOutput;
function carouselSlide() {
	$activeSlide = $("#home-carousel .active");
	activeHREF = $activeSlide.data("href");
	if($activeSlide.data("button")) {
		activeBtnText = $activeSlide.data("button");
	}
	else {
		activeBtnText = "Learn More";
	}
	if($activeSlide.data("excerpt")) {
		activeExcerpt = $activeSlide.data("excerpt");
		activeOutput = '<div id="slide-excerpt" class="span9 hidden-phone">' + activeExcerpt + '</div><a href="' + activeHREF + '" id="slide-btn" class="span3 btn btn-red">' + activeBtnText + '</a>';
	}
	else {
		activeOutput = '<a href="' + activeHREF + '" id="slide-btn" class="span12 btn btn-red">' + activeBtnText + '</a>';
	}
	$excerptWrap.html(activeOutput);
}
$("#home-carousel").bind('slid', function() {
	//$("#home-carousel").carousel("pause");
	carouselSlide();
});

var $iframe;
$("iframe").each(function() {
	$iframe = $(this);
	$iframe.parent().fitVids();
});