<?php /* Template Name: Página Single Proyecto Plantilla */ ?>

<!-- Header -->
<?php get_header();
	global $post; #var_dump($post);
	$page = get_page_by_title( 'proyecto ingenieria' ); #var_dump($page);

?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper center-block">
	
	<!-- Banner de Página -->
		<div class="section-wrapper-relative">
			<figure class="bn_ImagePage">
				<?= get_the_post_thumbnail($page->ID,'full',array('class'=>'img-responsive')); ?>
			</figure> <!-- /.bn_ImagePage -->

			<!-- Contenedor posicion absoluto -->
			<section class="sectionService__content-banner">
				<!-- Mostrar el título -->
				<h2 class="text-uppercase"> <strong>proyectos</strong></h2> <!-- /text-uppercase -->
				<!-- Servicios -->
				<p class="text-uppercase"><?php _e('proyectos','damol-framework'); ?> /
					<span>
						<?php 
							$cat = get_the_category($page->ID); //var_dump($cat);
							echo $cat[0]->name;
						?>
					</span>
				</p>
			</section><!-- /.sectionService__content-banner -->
		</div> <!-- /.section-wrapper-relative -->


	<!-- Contenido Principal -->
	<section class="sectionService__content">
		<div class="row">
			<div class="col-xs-8">
				<!-- Informacion de Projectos -->
				<section class="sectionProjectos__single-project">
					<!-- Title -->
					<h2 class="title-subcontent-pages"><?= $post->post_title; ?></h2>
					<!-- Description -->
					<p><?= $post->post_content; ?></p>

					<!-- Galería -->
					<section class="sectionProjectos__single-project__gallery">
						<div class="row">
							<?php  
								//Obtener de la galería	
								$input_ids_img = get_post_meta($post->ID, 'imageurls_'.$post->ID , true);
								$array_images  = explode(',', $input_ids_img );
					
								$args  = array(
									'post_type' => 'attachment',
									'post__in'  => $array_images,
								);
								$attachment = get_posts($args); 

								foreach ( $attachment as $atta ) :					
							?>
								<div class="col-xs-4">
									<a class="section-wrapper__multimedia__article grouped_elements" rel="group1" href="<?= $atta->guid ?>">
										<figure class="">
											<img src="<?= $atta->guid ?>" alt="<?= $atta->post_title ?>" class="center-block" />
										</figure> 
									</a><!-- /.section-wrapper__multimedia__article -->	 			
								</div> <!-- /col-xs-4 -->				
							<?php endforeach; ?>				
						</div> <!-- /row -->		
					</section><!-- /.sectionProjectos__single-project__gallery -->

				</section><!-- /.sectionProjectos__single-project -->
			</div><!--  -->
			<div class="col-xs-4">
			<!-- Categorias de la seccion -->
				<aside class="sectionProjectos__categories">

					<!-- Categoria a la que pertenece -->
					<h2 class="title-category">
						<?= $cat[0]->name; ?>
					</h2><!-- /title_category -->

					<ul class="list_project_by_category">
						<?php  
					        $args = array(
								'orderby'   => 'title',
								'order'     => 'ASC',
								'category'  => $cat[0]->name,
								'post_type' => 'proyecto',
 					        );

					        $all_project = get_posts( $args );  #var_dump( $all_project);

					        $i = 0;

					        foreach( $all_project as $project ) :
						?>
						<li><a class="<?= $project->post_title === $post->post_title ? 'active' : '' ?>" href="<?= $project->guid ?>"><?= $project->post_title ?></a></li>
						
						<?php $i++; endforeach; ?>
					</ul><!-- /.list_project_by_category -->
				</aside><!-- /.sectionProjectos__categories -->
			</div><!-- col-xs-4 -->
		</div><!-- /.row -->
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