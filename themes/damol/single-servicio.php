<?php /**
 * Template Name: Servicio Page
 **/
?>


<!-- Header -->
<?php get_header(); ?>

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

	<!-- Contenedor de Clientes  -->
	<section class="sectionClients">
		<!-- Titulos -->
		<h2 class="mainWrapper__title text-uppercase"><?php _e( 'clientes' , 'damol-framework' ); ?></h2>
		<br>

		<?php  
			//the query para clientes
			$args = array(
				'post_type' => 'cliente'
			);

			$the_query = new Wp_Query($args);

			if( $the_query->have_posts() ) :
		?>

		<!-- Contenedor position relative -->
		<div class="section-wrapper-relative sectionClients__carousel">
			<!-- Contenedor de sliders -->
			<section id="carousel-cliente">
				<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
					<article class="sectionHomeProyects__article">
						<figure>
							<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
							<span class="bg-transparence"></span>
						</figure>
					</article> <!-- /.sectionHomeProyects__article -->
				<?php endwhile; ?>

			</section><!-- /.sectionHomeProyects__carousel -->	

			<!-- FLECHAS -->
			<div id="cliente-prev" class="sectionCarousel__arrow sectionCarousel__arrow--prev"></div>
			<div id="cliente-next" class="sectionCarousel__arrow sectionCarousel__arrow--next"></div>

		</div> <!-- /.section-wrapper-relative -->

		<?php endif; ?>

	</section><!-- /.sectionClients -->

</main> <!-- /.mainWrapper center-block -->

<!-- Footer -->
<?php get_footer(); ?>
