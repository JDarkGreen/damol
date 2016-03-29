var j = jQuery.noConflict();

(function($){

	var mediaUploader;

	j('#manage_gallery').on('click',function(e) {

		e.preventDefault();

		var data_id = j(this).attr('data-id-post');

        // If the uploader object has already been created, reopen the dialog
        if (mediaUploader) { mediaUploader.open(); return;  }
        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
        	title: 'Escoge Image',
          	button: {
            	text: 'Escoge Image'
        }, multiple: false });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on('select', function() {
        	attachment = mediaUploader.state().get('selection').first().toJSON();

        	console.log(attachment);

        	var campo_field = j('input[name="page_gallery_ids_'+ data_id +'"]');

        	var datos = campo_field.val();
        	datos.push( attachment.id );
        	campo_field.val( datos );

        	console.log(campo_field.val() );

        });

    });

})(jQuery)







