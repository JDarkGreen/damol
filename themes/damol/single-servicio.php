<?php /**
 * Template Name: Servicio Page
 **/
?>


<!-- Header -->
<?php get_header(); ?>

<!-- Contenedor SB SITE responsive libreria SLIDEBARS -->
<section id="sb-site" class="">

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper center-block">
	
	<!-- Banner de Página -->
	<?php 
		$banner_service = get_post_meta($post->ID, 'input_img_banner_serv_'.$post->ID , true);
		if( !empty($banner_service) ) :
	?>
		<div class="section-wrapper-relative">
			<figure class="bn_ImagePage">
				<img src="<?= $banner_service ?>" alt="banner-service-<?= $post->ID ?>" class="img-responsive" />
			</figure> <!-- /.bn_ImagePage -->

			<!-- Contenedor posicion absoluto -->
			<section class="sectionService__content-banner">
				<!-- Mostrar el título -->
				<h2 class="text-uppercase"> <strong>
					<?php 
						$title = get_the_title(); 
						$title = str_replace("Servicio de", "", $title );
						echo $title;
					?>
				</strong></h2> <!-- /text-uppercase -->
				<!-- Servicios -->
				<p class="text-uppercase"><?php _e('servicios','damol-framework'); ?> /
					<span><?php _e( $title ,'damol-framework'); ?></span>
				</p>
			</section><!-- /.sectionService__content-banner -->
		</div> <!-- /.section-wrapper-relative -->
	<?php endif; ?>


	<!-- Contenido Principal -->
	<section class="sectionService__content">
		<!-- Titulos -->
		<h2 class="title-subcontent-pages"><?php _e( get_the_title() , 'damol-framework' ); ?></h2>

		<!-- Contenido -->
		<?php the_content(); ?>


		<!-- Imagenes de Galería -->
		<section class="sectionService__galery">
			<?php 
				$input_ids_img = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
				$array_images  = explode(',', $input_ids_img );
	
				$args  = array(
					'post_type' => 'attachment',
					'post__in'  => $array_images,
				);
				$attachment = get_posts($args); 

				foreach ( $attachment as $atta ) :
			?>
				<div class="col-xs-12 col-lg-6">
					<figure class="zoom">
						<img src="<?= $atta->guid ?>" alt="<?= $atta->post_title ?>" class="img-responsive center-block" />
					</figure> 
				</div> <!-- /.col-xs-12 col-lg-6 -->

			<?php endforeach; ?>

			<!-- Cleafix -->
			<div class="clearfix"></div>
		</section><!-- /.sectionService__galery -->

	</section> <!-- /.sectionService__content -->

	<!-- Linea Separadora  -->
	<span class="line-gray-separator"></span>

	<!-- Incluir Sección de Clientes mediante partial  -->
	<?php include( locate_template('partials/clientes.php') ); ?>
	<!-- Fin seccion clientes -->
	
</main> <!-- /.mainWrapper center-block -->

<!-- Footer -->
<?php get_footer(); ?>

</section> <!-- /.id="sb-site" -->
