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

	if( is_front_page() ){  
		$terms = 'portada';
	}

	//template
	include(locate_template('content-banner.php'));
?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper">
	
</main> <!-- /mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>