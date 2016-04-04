<?php /* Template Name: Página Single Proyecto Plantilla */ ?>

<!-- Header -->
<?php get_header();
	global $post; #var_dump($post);

	//
	$category_post = get_the_category($post->ID);  #var_dump($category_post);

	$page = get_page_by_title( "proyecto" . " " . $category_post[0]->slug  ); #var_dump($page);

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

					<!-- Contenedor Accordeon -->
					<div class="list_project_by_category panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						<?php 
					        $args1 = array(
								'category_name' => $cat[0]->name,
								'order'         => 'ASC',
								'orderby'       => 'title',
								'post_type'     => 'proyecto',
 					        );

					        $all_project1 = get_posts( $args1 ); #var_dump($all_project1);

					        if( count($all_project1) > 0 ) :

					        $arra = array();
					        foreach ( $all_project1 as $pro ) {
					        	$terminos = wp_get_post_terms($pro->ID, 'damol_empresa' );

					        	foreach ($terminos as $termi ) {
					        		array_push( $arra , $termi->term_id );
					        	}
					        }

					        $arra = array_unique($arra);
					        $arra = implode(",", $arra ); #var_dump($arra);
					        
					        $args = array(
								'order'      => 'ASC',
								'orderby'    => 'title',
								'include'    =>  $arra,
							);
							$empresas = get_terms( 'damol_empresa', $args  ); #var_dump($empresas);

							$i = 0;

							foreach( $empresas as $empresa ) :
						?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading<?= $empresa->term_id; ?>">
								    <h4 class="panel-title">
								    	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $empresa->term_id; ?>" aria-expanded="true" aria-controls="collapse<?= $empresa->term_id; ?>"><?= $empresa->name; ?></a>
								    </h4> <!-- /.panel-title -->
								</div> <!-- /.panel-heading -->
								<div id="collapse<?= $empresa->term_id; ?>" class="panel-collapse collapse <?= $i == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?= $empresa->term_id; ?>">
								    <div class="panel-body">
										<?php  
									        $args = array(
												'category_name' => $cat[0]->name,
												'order'         => 'ASC',
												'orderby'       => 'title',
												'post_type'     => 'proyecto',
												'tax_query' => array(
													array(
														'taxonomy'         => 'damol_empresa',
														'field'            => 'slug',
														'terms'            =>  $empresa->name,
													)
												)
				 					        );

									        $all_project = get_posts( $args );  #var_dump( $all_project);

									        foreach( $all_project as $project ) :
										?>	
											<a class="<?= $project->post_title === $post->post_title ? 'active' : '' ?>" href="<?= $project->guid ?>"><?= $project->post_title ?></a>
										<?php endforeach; ?>							    	
								    </div><!-- /.panel-body -->
								</div> <!-- /.panel-collapse -->
							</div> <!-- /.panel panel-default -->
						<?php $i++; endforeach; endif; //cerrar endif si esta vacio ?>
					</div><!-- /.list_project_by_category -->
				</aside><!-- /.sectionProjectos__categories -->
			</div><!-- col-xs-4 -->
		</div><!-- /.row -->
	</section><!-- /.sectionService__content -->

	<!-- Linea Separadora  -->
	<span class="line-gray-separator"></span>

	<!-- Incluir Sección de Clientes mediante partial  -->
	<?php include( locate_template('partials/clientes.php') ); ?>
	<!-- Fin seccion clientes -->

</main> <!-- /.mainWrapper center-block -->

<!-- Footer -->
<?php get_footer(); ?>