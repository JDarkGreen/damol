<?php

/***********************************************************************************************/
/* 	Define Constants */
/***********************************************************************************************/
define('THEMEROOT', get_stylesheet_directory_uri());
define('IMAGES', THEMEROOT.'/images');

/***********************************************************************************************/
/* Load JS Files */
/***********************************************************************************************/
function load_custom_scripts() {
	//bootstrap
	wp_enqueue_script('bootstrap', THEMEROOT . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true);
	//bootstrap
	wp_enqueue_script('bxslider', THEMEROOT . '/js/jquery.bxslider.min.js', array('jquery'), '4.1.2', true);
  	//script
	wp_enqueue_script('custom_script', THEMEROOT . '/js/script.js', array('jquery'), false, true);
}

add_action('wp_enqueue_scripts', 'load_custom_scripts');

/***********************************************************************************************/
/* Cargar  JS Files en el administrador */
/***********************************************************************************************/

/* Add the media uploader script */
function load_admin_custom_enqueue() {
    wp_enqueue_media();
	wp_enqueue_script('upload-gallery', THEMEROOT . '/js/media-lib-uploader.js', array('jquery'), '', true);
}

add_action('admin_enqueue_scripts', 'load_admin_custom_enqueue');

/***********************************************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/***********************************************************************************************/
	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));
	add_theme_support('post-thumbnails', array('post','page','banner','service','proyecto','cliente'));
	set_post_thumbnail_size(210, 210, true);
	add_image_size('custom-blog-image', 784, 350);
	add_theme_support('automatic-feed-links');



/***********************************************************************************************/
/* Registrar Menus */
/***********************************************************************************************/
function register_my_menus(){
	register_nav_menus(
		array(
			'main-menu' => __('Main Menu', 'damol-framework'),
		)
	);
}
add_action('init', 'register_my_menus');

/***********************************************************************************************/
/* Agregando nuevos SIDEBARS y secciones para widgets */
/***********************************************************************************************/	

if (function_exists('register_sidebar')) {
	register_sidebar(
		array(
			'name'          => __('PreHeaderBanner Sidebar', 'damol-framework'),
			'id'            => 'pre-header-banner',
			'description'   => __('Sidebar para preheader colocar widgets de banner', 'damol-framework'),
			'before_widget' => '<div class="sidebar-widget-preheader">',
			'after_widget'  => '</div> <!-- end sidebar-widget-preheader -->',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
		)
	);	
}

/***********************************************************************************************/
/* Agregando nuevos tipos de post  */
/***********************************************************************************************/	


function damol_create_post_type(){

	/*|>>>>>>>>>>>>>>>>>>>> BANNERS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels = array(
		'name'               => __('Banners'),
		'singular_name'      => __('Banner'),
		'add_new'            => __('Nuevo Banner'),
		'add_new_item'       => __('Agregar nuevo Banner'),
		'edit_item'          => __('Editar Banner'),
		'view_item'          => __('Ver Banner'),
		'search_items'       => __('Buscar Banners'),
		'not_found'          => __('Banner no encontrado'),
		'not_found_in_trash' => __('Banner no encontrado en la papelera'),
	);

	$args = array(
		'labels'      => $labels,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','banner_category'),
		'menu_icon'   => 'dashicons-visibility',
	);

	/*|>>>>>>>>>>>>>>>>>>>> SERVICIOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels2 = array(
		'name'               => __('Servicio'),
		'singular_name'      => __('Servicio'),
		'add_new'            => __('Nuevo Servicio'),
		'add_new_item'       => __('Agregar nuevo Servicio'),
		'edit_item'          => __('Editar Servicio'),
		'view_item'          => __('Ver Servicio'),
		'search_items'       => __('Buscar Servicios'),
		'not_found'          => __('Servicio no encontrado'),
		'not_found_in_trash' => __('Servicio no encontrado en la papelera'),
	);

	$args2 = array(
		'labels'      => $labels2,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag', /*'servicio_category'*/'','category'),
		'menu_icon'   => 'dashicons-exerpt-view',
	);

	/*|>>>>>>>>>>>>>>>>>>>> PROYECTOS  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels3 = array(
		'name'               => __('Proyectos'),
		'singular_name'      => __('Proyecto'),
		'add_new'            => __('Nuevo Proyecto'),
		'add_new_item'       => __('Agregar nuevo Proyecto'),
		'edit_item'          => __('Editar Proyecto'),
		'view_item'          => __('Ver Proyecto'),
		'search_items'       => __('Buscar Proyectos'),
		'not_found'          => __('Proyecto no encontrado'),
		'not_found_in_trash' => __('Proyecto no encontrado en la papelera'),
	);

	$args3 = array(
		'labels'      => $labels3,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-hammer',
	);

	/*|>>>>>>>>>>>>>>>>>>>> CLIENTES  <<<<<<<<<<<<<<<<<<<<|*/
	
	$labels4 = array(
		'name'               => __('Clientes'),
		'singular_name'      => __('Cliente'),
		'add_new'            => __('Nuevo Cliente'),
		'add_new_item'       => __('Agregar nuevo Cliente'),
		'edit_item'          => __('Editar Cliente'),
		'view_item'          => __('Ver Cliente'),
		'search_items'       => __('Buscar Clientes'),
		'not_found'          => __('Cliente no encontrado'),
		'not_found_in_trash' => __('Cliente no encontrado en la papelera'),
	);

	$args4 = array(
		'labels'      => $labels4,
		'has_archive' => true,
		'public'      => true,
		'hierachical' => false,
		'supports'    => array('title','editor','excerpt','custom-fields','thumbnail','page-attributes'),
		'taxonomies'  => array('post-tag','category'),
		'menu_icon'   => 'dashicons-universal-access-alt',
	);
	

	/*|>>>>>>>>>>>>>>>>>>>> REGISTRAR  <<<<<<<<<<<<<<<<<<<<|*/
	register_post_type('banner',$args);
	register_post_type('service',$args2);
	register_post_type('proyecto',$args3);
	register_post_type('cliente',$args4);
}

add_action( 'init', 'damol_create_post_type' );


/***********************************************************************************************/
/* Registrar nueva taxomomia para  nuevos tipos de post  */
/***********************************************************************************************/	

//create a custom taxonomy
add_action( 'init', 'create_damol_category_taxonomy', 0 );

function create_damol_category_taxonomy() {

/* categorias banner */
  $labels = array(
    'name'             => __( 'Categoría Banner'),
    'singular_name'    => __( 'Categoría Banner'),
    'search_items'     => __( 'Buscar Categoría Banner'),
    'all_items'        => __( 'Todas Categorías del Banner' ),
    'parent_item'      => __( 'Categoría padre del banner' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de banner' ), 
    'update_item'      => __( 'Actualizar categoría de banner' ),
    'add_new_item'     => __( 'Agregar nueva categoría de banner' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de banner' ),
    'menu_name'        => __( 'Categoria Banner' ),
  ); 

 /* categorias servicios */
 /*$labels2 = array(
    'name'             => __( 'Categoría Servicio'),
    'singular_name'    => __( 'Categoría Servicio'),
    'search_items'     => __( 'Buscar Categoría Servicio'),
    'all_items'        => __( 'Todas Categorías del Servicio' ),
    'parent_item'      => __( 'Categoría padre del Servicio' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Servicio' ), 
    'update_item'      => __( 'Actualizar categoría de Servicio' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Servicio' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Servicio' ),
    'menu_name'        => __( 'Categoria Servicio' ),
  ); 	*/	

// Now register the taxonomy
  register_taxonomy('banner_category',array('banner'), array(
    'hierarchical'     => true,
    'labels'           => $labels,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'banner-category' ),
  ));

  /*register_taxonomy('servicio_category',array('servicio'), array(
    'hierarchical'     => true,
    'labels'           => $labels2,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'servicio-category' ),
  ));*/

}


/***********************************************************************************************/
/* Agregar except a las paginas */
/***********************************************************************************************/

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}


/***********************************************************************************************/
/* Localization Support */
/***********************************************************************************************/
function custom_theme_localization() {
	$lang_dir = THEMEROOT . '/lang';
	
	load_theme_textdomain('damol-framework', $lang_dir);
}

add_action('after_theme_setup', 'custom_theme_localization');

/***********************************************************************************************/
/* Agregar nuevas columnas en el panel de administracion   */
/***********************************************************************************************/

function inox_add_thumbnail_columns( $columns ) {
    $columns = array(
		'cb'             => '<input type="checkbox" />',
		'featured_thumb' => 'Thumbnail',
		'title'          => 'Title',
		'author'         => 'Author',
		'categories'     => 'Categories',
		'tags'           => 'Tags',
		'comments'       => '<span class="vers"><div title="Comments" class="comment-grey-bubble"></div></span>',
		'date'           => 'Date'
    );
    return $columns;
}

function inox_add_thumbnail_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_thumb':
        echo '<a href="' . get_edit_post_link() . '">';
        echo the_post_thumbnail( 'thumbnail' );
        echo '</a>';
        break;
    }
}

if ( function_exists( 'add_theme_support' ) ) {
    add_filter( 'manage_posts_columns' , 'inox_add_thumbnail_columns' );
    add_action( 'manage_posts_custom_column' , 'inox_add_thumbnail_columns_data', 10, 2 );
    add_filter( 'manage_pages_columns' , 'inox_add_thumbnail_columns' );
    add_action( 'manage_pages_custom_column' , 'inox_add_thumbnail_columns_data', 10, 2 );
}

/***********************************************************************************************/
/* Agregar campo subir imagenes  a la taxonomia categoria servicios  */
/***********************************************************************************************/

/*add_action ( 'servicio_category_edit_form_fields', 'damol_campos_extras', 10, 2);

function damol_campos_extras( $tag ) {    
	$t_id     = $tag->term_id;
	$cat_meta = get_option( "category_$t_id");
?>

	<tr class="form-field">
		<th scope="row" valign="top"><label for="cat_Image_url"><?php _e('Url de la Imagen'); ?></label></th>
		<td>
			<input type="text" name="Cat_meta[img]" id="Cat_meta[img]" size="3" style="width:60%;" value="<?php echo $cat_meta['img'] ? $cat_meta['img'] : ''; ?>"><br />
            <span class="description"><?php _e('Imagen para la categoría, usar http://'); ?></span>
			
			<?php if( !empty( $cat_meta['img'] ) ) : ?>
            	<p></p>
				<img src="<?=  $cat_meta['img'] ?>" alt="" style="width: 200px; height: 150px;" />
			<?php endif; ?>
            
            <p></p>

            <button id="btn_to_gallery" class="button button-primary">
            	<?php if( !empty( $cat_meta['img'] ) ) : ?>
            		Actualizar Imagen
            	<?php else: ?>
            		Cargar Imagen
            	<?php endif; ?>
            </button>
        </td>
	</tr>
 
<?php
}

//>>>>>>> GUARDAR LA DATA
add_action( 'edited_servicio_category', 'damol_guardar_campos_extras', 10, 2);

function damol_guardar_campos_extras( $term_id ) {
    if ( isset( $_POST['Cat_meta'] ) ) {
		$t_id     = $term_id;
		$cat_meta = get_option( "category_$t_id");
		$cat_keys = array_keys($_POST['Cat_meta']);
        
        foreach ($cat_keys as $key){
            if ( isset($_POST['Cat_meta'][$key]) ){
                $cat_meta[$key] = $_POST['Cat_meta'][$key];
            }
        }
        //Guardamos las opciones
        update_option( "category_$t_id", $cat_meta );
    }
}

*/






/***********************************************************************************************/
/* Cargas opciones de la página y customizar widgets  */
/***********************************************************************************************/
require_once('functions/damol-theme-customizer.php');
