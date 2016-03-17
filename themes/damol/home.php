<?php  

/* 
	Pagina de Inicio Home
*/
?>

<!-- Header -->
<?php get_header(); ?>

<!-- Incluir seccion de banner -->
<?php  
	$terms = ""; //el termino a pasar

	if( is_home() ){  
		$terms = 'portada';
	}

	//template
	include(locate_template('content-banner.php'));
?>



<!-- Footer -->
<?php get_footer(); ?>