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

					#$services = get_terms( 'servicio_category', $args );

					#var_dump($services);
					#echo $serv->term_id;

					foreach( $services as $serv ) : 
				?>
					<article class="sectionHomeService__article">
						<?php 
							#$service_data = get_option("category_".$serv->term_id);
							#$imagen       = $service_data['img'];
							#if( !empty($imagen) ) : 
						?>
							<figure><img src="<?= $imagen; ?>" alt="" class="img-responsive" /></figure>
						<?php endif; ?>
						<h3 class="text-uppercase text-center"><strong><?php _e( $serv->name , 'damol-framework' ); ?></strong></h3>
					</article> <!-- /.sectionHomeService__article -->
				<?php endforeach; ?>

			</div>
		</section><!-- /.sectionHomeService -->

		<!-- Seccion widget facebook -->
		<section class="sectionHomeFacebook center-block">
			<!-- Titulo -->
			<h2 class="mainWrapper__title text-uppercase"><?php _e( 'facebook oficial' , 'damol-framework' ); ?></h2>
			<br>

			<!-- Contenedor -->
			<?php $link_facebook = $options['contact_fb']; ?>
			
			<!-- Contebn -->
			<div id="fb-root"></div>

			<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));
			</script> <!-- /end script -->

		<!-- Mostrar contenedor y actividad de red social -->
		<div class="sectionHomeFacebook__content fb-page" data-href="<?= !empty($link_facebook) ? $link_facebook : '' ?>" data-tabs="timeline" data-width="100%" data-height="100%" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"></div>

		</section><!-- /. sectionHomeFacebook -->

	</section> <!-- /.wrapper-flex-->

	<!-- Contenedor Proyectos Realizados -->
	<section class="sectionHomeProyects">
		<!-- Titulos -->
		<h2 class="mainWrapper__title text-uppercase"><?php _e( 'proyectos realizados' , 'damol-framework' ); ?></h2>

		<?php  
			//the query 
			$args = array(
				'post_type' => 'proyectos'
			);

			$the_query = new Wp_Query($args);

			if( $the_query->have_posts() ) :
		?>

		<!-- Contenedor position relative -->
		<div class="section-wrapper-relative">
			<!-- Contenedor de sliders -->
			<section id="carouserl-services-home" class="sectionHomeProyects__carousel">
				<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
					<article class="">
						<div class="inside">
							<figure>
								<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
							</figure>
							<h2><?php the_title(); ?></h2>
						</div>
					</article>
				<?php endwhile; ?>

			</section><!-- /.sectionHomeProyects__carousel -->	

			<!-- FLECHAS -->
			<div id="service-prev" class="sectionHomeProyects__carousel__arrow sectionHomeProyects__carousel__arrow--prev"></div>
			<div id="service-next" class="sectionHomeProyects__carousel__arrow sectionHomeProyects__carousel__arrow--next"></div>

		</div> <!-- /.section-wrapper-relative -->

		<?php endif; ?>

	</section> <!-- /.sectionHomeProyects -->

</main> <!-- /mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>