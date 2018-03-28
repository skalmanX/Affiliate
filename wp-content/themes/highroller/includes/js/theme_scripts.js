
// Mobile Menu script
jQuery(document).ready(function($) {
			$('#mobile-menu .menu-item-has-children').append('<span class="arrow up">&#9650;</span><span class="arrow down">&#9660;</span>');
			$("#mobile-menu-btn").click(function() {
				//$("#mobile-menu").toggle('slide', { direction: 'left' }, 500);
				$("#mobile-menu").slideToggle();
			});
			
			$('#mobile-menu .menu-item-has-children .arrow').click(function(e) {
				$(this).closest('li').toggleClass('menu-icon-up');
				//$(this).closest('li').find('ul').first().toggle('slide', { direction: 'up' }, 500);
				$(this).closest('li').find('ul').first().slideToggle();
			});
});


// Flexslider
jQuery(document).ready(function() {
  jQuery('.flexslider').flexslider({
    animation: "slide",	
	directionNav: false,   
	controlNav: true,
	animationSpeed:1000,
	auto:true 
  });
});