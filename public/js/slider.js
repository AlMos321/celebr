$(function(){
	$('#maximage').maximage({
		cycleOptions: {
			fx: 'fade',
			// Speed has to match the speed for CSS transitions
			speed: 700, 
			timeout: 5000,
			pause: 1,
			fillElement: 'body',
			pager: ".slider-pagination ul",
			pagerAnchorBuilder: function(slide) {
   				 return '<li><a href="#" rel="nofollow"></a></li>';
			}
		},
		onFirstImageLoaded: function(){
			jQuery('#cycle-loader').hide();
			jQuery('#maximage').fadeIn('fast');
		},
		// // cssBackgroundSize might be causing choppiness in retina display safari
		// cssBackgroundSize: true 
	});
 
});