<?php /* Template Name: Página Proyectos Plantilla */ ?>

<!-- Header -->
<?php get_header(); 
	global $post; #echo $post->ID; 
	#var_dump($post);
?>

<!-- Contenedor SB SITE responsive libreria SLIDEBARS -->
<section id="sb-site" class="">

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
		<div class="row">

			<!-- SECCION INFORMACION -->
			<div class="col-xs-12 col-sm-8">
				<!-- Informacion de Projectos -->
				<section class="sectionProjectos__single-project">
					<?php  
				        $args1 = array(
							'category_name' => $cat[0]->name,
							'order'         => 'ASC',
							'orderby'       => 'title',
							'post_type'     => 'proyecto',
					        );

				        $all_project1 = get_posts( $args1 ); #var_dump($all_project3);

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
						$empresas = get_terms( 'damol_empresa', $args  );

				        $args = array(
							'category_name' => $cat[0]->name,
							'order'         => 'ASC',
							'orderby'       => 'title',
							'post_type'     => 'proyecto',
							'tax_query' => array(
								array(
									'taxonomy'         => 'damol_empresa',
									'field'            => 'slug',
									'terms'            =>  $empresas[0]->name,
								)
							)
					    );

						$all_project = get_posts( $args );  #var_dump( $all_project);
						$first_project = $all_project[0]; #var_dump($first_project);

					?>
					<!-- Title -->
					<h2 class="title-subcontent-pages"><?= $first_project->post_title; ?></h2>
					<!-- Description -->
					<p><?= $first_project->post_content; ?></p>

					<!-- Mostrar botón ver más projectos solo en versión mobile -->
					<a href="#" class="visible-xs-inline-block btn btn-danger btn__more-to-aside text-uppercase" data-section="sectionProjectos__categories" >Ver más proyectos</a>

					<!-- Galería -->
					<section class="sectionProjectos__single-project__gallery">
						<div class="row">
							<?php  
								//Obtener de la galería	
								$input_ids_img = get_post_meta($first_project->ID, 'imageurls_'.$first_project->ID , true);
								$array_images  = explode(',', $input_ids_img );
					
								$args  = array(
									'post_type'      => 'attachment',
									'post__in'       => $array_images,
									'posts_per_page' => -1,
								);
								$attachment = get_posts($args); 

								foreach ( $attachment as $atta ) :					
							?>
								<div class="col-xs-12 col-sm-4">
									<a class="section-wrapper__multimedia__article grouped_elements" rel="group1" href="<?= $atta->guid ?>">
										<figure class="">
											<img src="<?= $atta->guid ?>" alt="<?= $atta->post_title ?>" class="center-block" />
										</figure> 	
									</a> <!-- /.section-wrapper__multimedia__article --> 			
								</div> <!-- /col-xs-12 col-sm-4 -->	
							<?php endforeach; ?>				
						</div> <!-- /row -->		
					</section><!-- /.sectionProjectos__single-project__gallery -->

				</section><!-- /.sectionProjectos__single-project -->
			</div><!-- col-xs-12 col-sm-8 -->

			<!-- ASIDE COLLAPSE MUESTRA CATEGORIAS DE PROYECTOS -->
			<div class="col-xs-4 hidden-xs">
			<!-- Categorias de la seccion -->
				<aside class="sectionProjectos__categories">

					<!-- Categoria a la que pertenece -->
					<h2 class="title-category">
						<?= $cat[0]->name; ?>
					</h2><!-- /title_category -->

					<!-- Contenedor Accordeon -->
					<div class="list_project_by_category panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						<?php 

							#echo $cat[0]->slug;
	 
					        $args1 = array(
								'category_name'  => $cat[0]->slug,
								'order'          => 'ASC',
								'orderby'        => 'title',
								'post_type'      => 'proyecto',
								'posts_per_page' => -1,
 					        );

					        $all_project1 = get_posts( $args1 ); 

					        /*foreach($all_project1 as $p ){
					        	echo "<p>" .$p->post_title . "</p>";  
					        } */

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
											<a class="<?= $project->post_title === $first_project->post_title ? 'active' : '' ?>" href="<?= $project->guid ?>"><?php 
													$excerpt = $project->post_excerpt; 
													if( !empty($excerpt) ){
														echo $excerpt;
													}else{
														echo $project->post_title;
													}
												?>
											</a>
										<?php endforeach; ?>							    	
								    </div><!-- /.panel-body -->
								</div> <!-- /.panel-collapse -->
							</div> <!-- /.panel panel-default -->
						<?php $i++; endforeach; endif; ?>
					</div><!-- /.list_project_by_category -->
				</aside><!-- /.sectionProjectos__categories -->
			</div><!-- col-xs-4 hidden-xs -->

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

</section> <!-- /.id="sb-site"  -->