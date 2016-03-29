var j = jQuery.noConflict();

(function($){

    j('#add_image_btn').on('click',function(e) {

        e.preventDefault();

        var post_data = j(this).attr('data-id-post');
        
        frame = wp.media({
            title   : 'Agrega tu título aquí',
            frame   : 'post',
            multiple: true, // set to false if you want only one image
            library : { type : 'image'},
            button  : { text : 'Agregar Imagen' },
        });

        frame.on('close',function(data) {

            var input_data = j("#imageurls_"+post_data);
            
            var imageArray = input_data.val().split(",");

            images = frame.state().get('selection');
            
            images.each(function(image) {
                //imageArray.push(image.attributes.url); // want other attributes? Check the available ones with console.log(image.attributes);
                imageArray.push(image.attributes.id); // want other attributes? Check the available ones with console.log(image.attributes);
            });
 
            j("#imageurls_"+post_data).val(imageArray.join(",")); // Adds all image URL's comma seperated to a text input
        });
        
        frame.open();
    });

    //Eliminar una imagen
    j(".js-delete-image").on('click',function(e){
        e.preventDefault();

        //id de post
        var data_id_post = j(this).attr('data-id-post');

        //id de imagen 
        var data_id_img  = j(this).attr('data-id-img');
        console.log(data_id_img);

        //ocultar imagen display none
        j(this).parent('figure').css('display','none');

        var input_data = j("#imageurls_"+data_id_post);
        var imageArray = input_data.val().split(",");

        //buscar y eliminar elemento id de imagen  del arreglo
        var i = imageArray.indexOf(data_id_img);
        if(i != -1 ) { 
            imageArray.splice( i , 1); 

            if( imageArray.length == 0 ){
               input_data.val('-1');
            }else{
                input_data.val(imageArray.join(","));
            }
        }

        console.log(imageArray);

    });

})(jQuery)







