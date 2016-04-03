<?php /*Template Name: Página Nosotros Plantilla */ ?>

<!-- Header -->
<?php get_header(); ?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper center-block">
	
	<!-- Banner de Página -->
	<?php if( has_post_thumbnail() ) : ?>
		<figure class="bn_ImagePage">
			<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
		</figure> <!-- /.bn_ImagePage -->
	<?php else: ?>
		<p>asdasd</p>
	<?php endif; ?>

	<!-- Contenedor con padding -->
	<section class="sectionWrapper__content">
		
		<!-- Seccion perfil de la empresa -->
		<section class="sectionNosotros sectionNosotros__perfil col-xs-12 col-lg-6">
			<h2><?php _e( 'Perfil de la Empresa' , 'damol-framework' ); ?></h2>

			<!-- Contenido -->
			<?php
				$page  = get_page_by_title( 'Nosotros' ); //var_dump($page);
				$perfil= get_post_meta( $page->ID, 'custom_damol_'.$page->ID.'_perfil' , true);
				if ( !empty($perfil) ) : ?>
					<p class="text-justify"> <?= html_entity_decode( $perfil ) ?> </p>
			<?php endif;?>

		</section> <!-- /.sectionNosotros__perfil -->

		<!-- Seccion Slider Banner rotativo -->
		<section class="sectionNosotros sectionNosotros__banner col-xs-12 col-lg-6">
			<?php  
				//Extraer galeria de pagina nosotros
				$input_ids_img = get_post_meta( $page->ID , 'imageurls_'.$page->ID , true);
				$array_images  = explode(',', $input_ids_img );

				$args  = array(
					'post_type' => 'attachment',
					'post__in'  => $array_images,
				);
				$attachment = get_posts($args);
			?>
			<div id="slider_nosotros">
				<?php foreach( $attachment as $atta ) : ?>
					<img src="<?= $atta->guid; ?>" alt="<?= $atta->post_title; ?>" class="img-responsive" />
				<?php endforeach; ?>
			</div><!-- /.#slider_nosotros -->
		</section> <!-- /.sectionNosotros sectionNosotros__banner col-xs-12 col-lg-6 -->
		
		<div class="clearfix"></div>

		<section class="wrapper-flex item-flexbox-wrap item-flexbox-justify">

			<!-- Seccion Misión -->
			<div class="sectionNosotros sectionNosotros--bg-orange">
				<section class="sectionNosotros__mision">
					<h2 class="title--white"><?php _e( 'Misión' , 'damol-framework' ); ?></h2>
					<!-- Contenido -->
					<?php
						$mision= get_post_meta( $page->ID, 'custom_damol_'.$page->ID.'_mision' , true);
						if ( !empty($mision) ) : ?>
							<p class="text-justify"> <?= html_entity_decode( $mision ) ?> </p>
					<?php endif;?>
				</section> <!-- /.sectionNosotros sectionNosotros__mision -->
			</div> <!-- /. -->

			<!-- Seccion Visión -->
			<div class="sectionNosotros sectionNosotros--bg-orange">
				<section class="sectionNosotros__vision">
					<h2 class="title--white"><?php _e( 'Visión' , 'damol-framework' ); ?></h2>
					<!-- Contenido -->
					<?php
						$vision= get_post_meta( $page->ID, 'custom_damol_'.$page->ID.'_vision' , true);
						if ( !empty($vision) ) : ?>
							<p class="text-justify"> <?= html_entity_decode( $vision ) ?> </p>
					<?php endif;?>
				</section> <!-- /.sectionNosotros sectionNosotros__mision  -->
			</div> <!-- /.-->

		</section> <!-- /section wrapper-flex -->

		<div class="clearfix"></div>

		<!-- Seccion Valores -->
		<section class="sectionNosotros sectionNosotros__valores col-xs-12">
			<h2><?php _e( 'Valores' , 'damol-framework' ); ?></h2>

			<!-- Contenido -->
			<?php
				$valores= get_post_meta( $page->ID, 'custom_damol_'.$page->ID.'_valores' , true);
				if ( !empty($valores) ) : ?>
					<p class="text-justify"> <?= html_entity_decode( $valores ) ?> </p>
			<?php endif;?>
		</section> <!-- /.sectionNosotros sectionNosotros__valores col-xs-12 col-lg-6 -->
		
		<!-- Clearfix -->
		<div class="clearfix"></div>

	</section><!-- /.sectionWrapper__content" -->

	<!-- Linea Separadora  -->
	<span class="line-gray-separator"></span>

	<!-- Incluir Sección de Clientes mediante partial  -->
	<?php include( locate_template('partials/clientes.php') ); ?>
	<!-- Fin seccion clientes -->

</main> <!-- /.mainWrapper mainWrapper--padding center-block -->

<!-- Footer -->
<?php get_footer(); ?>