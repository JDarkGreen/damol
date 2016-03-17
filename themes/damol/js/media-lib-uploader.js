
jQuery(document).ready(function($){

   var mediaUploader;

    $('#btn_to_gallery').click(function(e) {
        e.preventDefault();
        // If the uploader object has already been created, reopen the dialog
        if (mediaUploader) {
          mediaUploader.open();
          return;
      }
        // Extend the wp.media object
        mediaUploader = wp.media.frames.file_frame = wp.media({
          title: 'Escoge Image',
          button: {
            text: 'Escoge Image'
        }, multiple: false });

        // When a file is selected, grab the URL and set it as the text field's value
        mediaUploader.on('select', function() {
          attachment = mediaUploader.state().get('selection').first().toJSON();

          /*if( $('input[name="Cat_meta[img]"]').length ){
            alert('ok');
          }else{
            alert('nok');
          }*/

          var campo_field = $('input[name="Cat_meta[img]"]');

          //setea el campo
          campo_field.val(attachment.url);
      });
        // Open the uploader dialog
        mediaUploader.open();
    });

});