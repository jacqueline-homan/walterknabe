jQuery(document).ready(function($){

	$('.colorSelector').each(function(){
		var Othis = this; //cache a copy of the this variable for use inside nested function
			
		$(this).ColorPicker({
				color: 'ffcc00',
				onShow: function (colpkr) {
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$(Othis).children('div').css('backgroundColor', '#' + hex);
					$(Othis).next('input').attr('value','#' + hex);
					
				}
		});
			  
	}); //end color picker
	
}); //end doc ready