<?php  

/* Archivo permite crear columnas que ordenan los posts */

/*Now we register our custom column as 'sortable'. As mentioned above we use the manage_{$screen->id}_sortable_column filter. The $screen->id in this case is 'edit-cake'. */

//categorias
add_filter( 'manage_edit-cake_sortable_columns', 'my_sortable_cake_column' );



?>