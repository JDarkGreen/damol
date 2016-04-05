
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		/*>>>>>>>>>>>> LIBRERIA RESPONSIVE NAVIGATION MENU SLIDEBARS -----------  */
		j.slidebars({
			siteClose         : true, // true or false
			disableOver       : 480, // integer or false
			hideControlClasses: true, // true or false
			scrollLock        : false // true or false
      	});
    

		/*>>>>>>>>>>>> BOTON UP DIRIGE ARRIBA DE LA PÁGINA -----------  */

		var btn_to_up = j(".btn__top-page");
		btn_to_up.on('click',function(e){
			e.preventDefault();
			//dirigir arriba de la página
			j('html, body').animate({scrollTop : 0}, 800);
			return false;
		});

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


		/*>>>>>>>>>>>> CAROUSEL PORTADA  */
		j('#carousel-banner-home').carousel({ interval: 4000 });

		j('#carousel-banner-home').on('slide.bs.carousel', function () {

			var carousel = j(this);

			//Animar el título
			carousel
				.find('.carousel-caption__content h2')
				.css( 'opacity' , '0' )

			setTimeout(function(){  
				carousel
				.find('.carousel-caption__content h2')
			  	.animate({ opacity : 1 , }, 900 );

		  	}, 1000 );

		  	//animar el parrafo
		  	setTimeout(function(){  

			  	carousel
			  	.find('.carousel-caption__content p')
				.css('right','100%')
			  	.animate({ right: 0 , }, 1200 );

		  	}, 300);
		
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

		/****************** GALERIA  ************************/
		//Imagenes en la seccion servicios
		j("a.grouped_elements").fancybox({
			'transitionIn'	:	'elastic',
			'transitionOut'	:	'elastic',
			'speedIn'		:	600, 
			'speedOut'		:	200, 
			'overlayShow'	:	false
		});


	});


})(jQuery)