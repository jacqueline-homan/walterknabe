var $j = jQuery.noConflict();
$j(document).ready(function() {
	/*===== fancybox plugin ======= */
	$j('a.fancybox, a.group, a.zoom').fancybox({
		'transitionIn'	:	'fade',
		'transitionOut'	:	'fade',
		'speedIn'		:	300, 
		'speedOut'		:	300, 
		'overlayShow'	:	true,
		'titlePosition' :	'over',
		'padding'		:	0,
		'onComplete'	:	function () { $j('#fancybox-img').bind('contextmenu', function(e){return false;}); }
	});
});