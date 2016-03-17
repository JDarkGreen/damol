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
<main class="mainWrapper center-block">
	
	<!-- contenedor flexible -->
	<section class="wrapper-flex">

		<!-- SECCION SERVICIOS -->
		<section class="sectionHomeService">
			<h2 class="text-uppercase"><?php _e( 'nuestros servicios' , 'damol-framework' ); ?></h2>
		</section><!-- /.sectionHomeService -->
		
	</section> <!-- /.wrapper-flex-->

</main> <!-- /mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>