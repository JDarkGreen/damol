
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

	/*>>>>>>>>>>>> CAROUSEL PORTADA - seccion Proyectos */
	
	j('#carouserl-services-home').bxSlider({
		maxSlides   : 4,
		moveSlides  : 1,
		nextSelector: j('#proyecto-next'),
		pager       : false,
		prevSelector: j('#proyecto-prev'),
		slideMargin : 15,
		slideWidth  : 250,
	});








	});


})(jQuery)