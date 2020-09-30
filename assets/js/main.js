(function($){
	// Back to top button
	$(window).scroll(function() {
	if ($(this).scrollTop() > 100) {
	  $('.back-to-top').fadeIn('slow');
	} else {
	  $('.back-to-top').fadeOut('slow');
	}
	});
	$('.back-to-top').click(function(){
	    //$('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
	    $('html, body').animate({scrollTop : 0},100);
	    return false;
	  });
	// Navbar scroll
    $(window).scroll(function(){
	if ($(this).scrollTop() > 80){
		$('#header').addClass("is-sticky");
	}
	else {
		$('#header').removeClass("is-sticky");
	}


});
})(jQuery);