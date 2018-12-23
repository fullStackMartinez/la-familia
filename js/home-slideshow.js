$(document).ready(function() {

	/* HOMEPAGE SLIDESHOW */
	var transitionDuration = 8800;
	var transitionInterval = 55000;

	var thisIndex = 0;
	var prevIndex = null;
	var myInterval = null;


	$(".nav-boxes a").eq(thisIndex).css("background-color", "#DED9D3");
	$(".nav-boxes a").click(function() {
		animateSlidesTo( $(this).index() );
		thisIndex = $(this).index();
	});

	resetInterval();

	function resetInterval() {
		clearInterval(myInterval);
		myInterval = setInterval(function(){
			thisIndex++;
			if (thisIndex == $(".home-slideshow ul li").length) {
				thisIndex = 0;
				animateSlidesTo(thisIndex);
			} else {
				animateSlidesTo(thisIndex);
			}
		}, transitionInterval);
	}

	function animateSlidesTo(thisIndex) {
		$(".home-slideshow ul li").eq(thisIndex)
			.css({opacity: 0})
			.show()
			.animate( {opacity: 1}, transitionDuration, function(){ });

		$(".home-slideshow ul li").eq(prevIndex)
			.animate( {opacity: 0}, transitionDuration, function(){ $(this).hide(); } );

		$(".nav-boxes a").eq(thisIndex).css("background-color", "#DED9D3");
		$(".nav-boxes a").eq(prevIndex).css("background-color", "transparent");

		prevIndex = thisIndex;
		resetInterval();
	}

	$(".slideshow-prev").click(function() {
		thisIndex--;
		if (thisIndex == -1) {
			thisIndex = $(".home-slideshow ul li").length - 1;
			animateSlidesTo(thisIndex);
		} else {
			animateSlidesTo(thisIndex);
		}
	});

	$(".slideshow-next").click(function() {
		thisIndex++;
		if (thisIndex == $(".home-slideshow ul li").length) {
			thisIndex = 0;
			animateSlidesTo(thisIndex);
		} else {
			animateSlidesTo(thisIndex);
		}
	});

});


$(window).load(function(){

	$(".home-slideshow").show();
	$(".home-slideshow ul li").css("opacity", 0).hide();
	$(".home-slideshow ul li:first-child").show().css("opacity", 1);
});