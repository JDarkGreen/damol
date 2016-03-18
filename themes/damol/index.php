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

	# Incluir opciones de tema
	$options = get_option('damol_custom_settings'); 

	#var_dump($options);
	echo $options['contact_fb'];
?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper mainWrapper--padding center-block">
	
	<!-- contenedor flexible -->
	<section class="wrapper-flex">

		<!-- SECCION SERVICIOS -->
		<section class="sectionHomeService">

			<!-- Titulo -->
			<h2 class="mainWrapper__title text-uppercase"><?php _e( 'nuestros servicios' , 'damol-framework' ); ?></h2>
			
			<!-- Cotenedor flexible -->
			<div class="wrapper-flex sectionHomeService__content">
				
				<!-- contenedor section -->
				<?php  
					$args = array(
						'orderby'    => 'count',
						'hide_empty' => false,
					);

					$services = get_terms( 'servicio_category', $args );

					#var_dump($services);
					#echo $serv->term_id;

					foreach( $services as $serv ) : 
				?>
					<article class="sectionHomeService__article">
						<?php 
							$service_data = get_option("category_".$serv->term_id);
							$imagen       = $service_data['img'];

							if( !empty($imagen) ) : 
						?>
							<figure><img src="<?= $imagen; ?>" alt="" class="img-responsive" /></figure>
						<?php endif; ?>
						<h3 class="text-uppercase text-center"><strong><?php _e( $serv->name , 'damol-framework' ); ?></strong></h3>
					</article> <!-- /.sectionHomeService__article -->
				<?php endforeach; ?>

			</div>
		</section><!-- /.sectionHomeService -->

		<!-- Seccion widget facebook -->
		<section class="sectionHomeFacebook">
			<!-- Titulo -->
			<h2 class="mainWrapper__title text-uppercase"><?php _e( 'facebook oficial' , 'damol-framework' ); ?></h2>
		</section><!-- /. sectionHomeFacebook -->

	</section> <!-- /.wrapper-flex-->

</main> <!-- /mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>