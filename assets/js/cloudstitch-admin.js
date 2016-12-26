jQuery.noConflict();
(function($) {
    
	//show tab content on click
	$('.cloudstitch-nav-tab a').click(function(e) {
		$('.cloudstitch-nav-tab a').removeClass('nav-tab-active');
		$(this).addClass('nav-tab-active').blur();
		var current = $(this).attr('href');
		$('.settings_panel').hide();
		$(current).fadeIn(200);
		e.preventDefault();
	
	});
	
})(jQuery);
	   
