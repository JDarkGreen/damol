<?php /* Template Name: Página Proyecto Plantilla */ ?>

<!-- Header -->
<?php get_header();
	global $post;
?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper center-block">
	
	<!-- Banner de Página -->
	<?php 
		if( has_post_thumbnail($post->ID) ) :
	?>
		<div class="section-wrapper-relative">
			<figure class="bn_ImagePage">
				<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
			</figure> <!-- /.bn_ImagePage -->

			<!-- Contenedor posicion absoluto -->
			<section class="sectionService__content-banner">
				<!-- Mostrar el título -->
				<h2 class="text-uppercase"> <strong>proyectos</strong></h2> <!-- /text-uppercase -->
				<!-- Servicios -->
				<p class="text-uppercase"><?php _e('proyectos','damol-framework'); ?> /
					<span>
						<?php 
							$cat = get_the_category($post->ID); //var_dump($cat);
							echo $cat[0]->name;
						?>
					</span>
				</p>
			</section><!-- /.sectionService__content-banner -->
		</div> <!-- /.section-wrapper-relative -->
	<?php endif; ?>

	<!-- Contenido Principal -->
	<section class="sectionService__content">
		<!-- Titulos -->
		<h2 class="title-subcontent-pages"><?php _e( 'Nuestros Proyectos' , 'damol-framework' ); ?></h2>

		<!-- Contenedor de los proyectos por categorias -->
		<?php  
			//query
			$args = array(
				'post_type'      => 'proyecto',
				'posts_per_page' => -1,
				'category_name'  => $cat[0]->slug,
			);

			$projectos = get_posts( $args); //var_dump($projectos);

			foreach ($projectos as $project ) : ?>
			
			<!-- Contenedor -->
			<div class="sectionProject__item col-xs-6">
				<figure class="sectionProject__item-image">
					<?= get_the_post_thumbnail( $project->ID , 'full' , array('class'=>'img-responsive') ); ?>
					<figcaption class="text-center"><?= $project->post_title; ?></figcaption>
				</figure><!-- /.sectionProject__item-image -->

			<!-- Descripcion del Proyecto -->
			<?php  
				$text_project = $project->post_content;
				if( !empty($text_project) ) :
			?>
				<p><?= $text_project; ?></p>
			<?php endif; ?>

			<!-- Slider Miniatura de Galeria de Imagenes -->
			<section class="section-wrapper-relative sectionProject__gallery">
				
				<!-- Contenedor galeria bx slider -->
				<div class="js-sectionProject-gallery">
					<?php  
						//Obtener de la galería	
						$input_ids_img = get_post_meta($project->ID, 'imageurls_'.$project->ID , true);
						$array_images  = explode(',', $input_ids_img );
			
						$args  = array(
							'post_type' => 'attachment',
							'post__in'  => $array_images,
						);
						$attachment = get_posts($args); 

						foreach ( $attachment as $atta ) :					
					?>
						<figure class="">
							<img src="<?= $atta->guid ?>" alt="<?= $atta->post_title ?>" class="img-responsive center-block" />
						</figure> 					
					<?php endforeach; ?>
				</div><!-- /.js-sectionProject-gallery  -->

				<!-- FLECHAS -->
				<div id="" class="sectionProject__arrow sectionProject__arrow--prev"></div>
				<div id="" class="sectionProject__arrow sectionProject__arrow--next"></div>			
			</section> <!-- /.sectionProject__gallery -->

			</div><!-- /.col-xs-6 -->
		<?php endforeach; ?>
		
		<!-- Clearfix -->
		<div class="clearfix"></div>


	</section><!-- /.sectionService__content -->

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