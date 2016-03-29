
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		/*>>>>>>>>>>>> STYCKY HEADER -----------------------*/

		var main_menu     = j('nav.mainNav');
		var main_menu_pos = main_menu.offset().top;

		j(window).on('scroll', function(){
			if( j(this).scrollTop() > main_menu_pos ) {
				main_menu.addClass('mainNav--fixed');
			}else{
				main_menu.removeClass('mainNav--fixed').addClass('mainNav--anim');
			}
		});


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


		/*>>>>>>>>>>>> CAROUSEL PORTADA - seccion Clientes */

		j('#carousel-cliente').bxSlider({
			maxSlides   : 5,
			moveSlides  : 1,
			nextSelector: j('#cliente-next'),
			pager       : false,
			prevSelector: j('#cliente-prev'),
			slideMargin : 20,
			slideWidth  : 'auto',
		});

		/*>>>>>>>>>>>> CAROUSEL NOSOTTOS - seccion nosotros */
		var carousel_nosotros = j('#slider_nosotros');

		if ( carousel_nosotros.length ) {
			carousel_nosotros.cubeslider({
				navigation      : false,
				play            : false,
				orientation     : 'h',
				autoplay        : true, 				
				autoplayInterval: 2000,
			});
		}


	});


})(jQuery)