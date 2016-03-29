
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){

		//CLICK BOTON SUBIR BANNER DESERVICIOS
		j("#btn_add_banner_serv").on('click',function(e){
			e.preventDefault();

			var boton_add = j(this);

			var mediaUploader;
			var post_id = j(this).attr('data-id-post');

			if (mediaUploader) { mediaUploader.open(); return; }

			mediaUploader = wp.media.frames.file_frame = wp.media({
				title: 'Escoge Image',
				button: {
					text: 'Escoge Image'
				}, multiple: false 
			}); 

			mediaUploader.on('select', function() {
          		attachment = mediaUploader.state().get('selection').first().toJSON();

          		var campo_field = j("#input_img_banner_serv_"+post_id);
          		//setea el campo
          		campo_field.val(attachment.url);

          		//mostrar imagen temporal
          		boton_add.html("");
          		boton_add.append("<img src='"+attachment.url+"' alt='banner-service' style='width: 200px; height: 100px; margin: 0 auto;' />");
			});
        	
        	// Open the uploader dialog
        	mediaUploader.open();

		});

		//ELIMINAR 
		j("#delete_banner_srv").on('click',function(e){
			e.preventDefault();

			var post_id = j(this).attr('data-id-post');

          	var campo_field = j("#input_img_banner_serv_"+post_id);
          	//setea el campo
          	campo_field.val("-1");
          	//ocultar imagen
          	j('.js-link_banner').slideUp();
		});


	});

})(jQuery);