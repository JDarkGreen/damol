<?php /* Template Name: Página QHSE Plantilla */ ?>

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
				<h2 class="text-uppercase"> <strong>QHSE</strong></h2> <!-- /text-uppercase -->
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
				<div class="col-xs-12">
					<figure class="">
						<img src="<?= $atta->guid ?>" alt="<?= $atta->post_title ?>" class="img-responsive center-block" />
					</figure> 
				</div> <!-- /.col-xs-12 col-lg-6 -->

			<?php endforeach; ?>

			<!-- Cleafix -->
			<div class="clearfix"></div>
		</section><!-- /.sectionService__galery -->

	</section><!-- /.sectionService__content -->

	<!-- Linea Separadora  -->
	<span class="line-gray-separator"></span>

	<!-- Incluir Sección de Clientes mediante partial  -->
	<?php include( locate_template('partials/clientes.php') ); ?>
	<!-- Fin seccion clientes -->

</main> <!-- /.mainWrapper center-block -->


<!-- Footer -->
<?php get_footer(); ?>