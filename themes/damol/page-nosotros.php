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
		
		<div class="clearfix"></div>

		<!-- Seccion Misión -->
		<div class="col-xs-12 col-lg-6">
			<section class="sectionNosotros sectionNosotros__mision ">
				<h2 class="title--white"><?php _e( 'Misión' , 'damol-framework' ); ?></h2>
				<!-- Contenido -->
				<?php
					$mision= get_post_meta( $page->ID, 'custom_damol_'.$page->ID.'_mision' , true);
					if ( !empty($mision) ) : ?>
						<p class="text-justify"> <?= html_entity_decode( $mision ) ?> </p>
				<?php endif;?>
			</section> <!-- /.sectionNosotros sectionNosotros__mision -->
		</div> <!-- /.col-xs-12 col-lg-6  -->

		<!-- Seccion Visión -->
		<div class="col-xs-12 col-lg-6">
			<section class="sectionNosotros sectionNosotros__vision">
				<h2 class="title--white"><?php _e( 'Visión' , 'damol-framework' ); ?></h2>
				<!-- Contenido -->
				<?php
					$vision= get_post_meta( $page->ID, 'custom_damol_'.$page->ID.'_vision' , true);
					if ( !empty($vision) ) : ?>
						<p class="text-justify"> <?= html_entity_decode( $vision ) ?> </p>
				<?php endif;?>
			</section> <!-- /.sectionNosotros sectionNosotros__mision  -->
		</div> <!-- /.col-xs-12 col-lg-6 -->

		<div class="clearfix"></div>

		<!-- Seccion Valores -->
		<section class="sectionNosotros sectionNosotros__valores col-xs-12 col-lg-6">
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

</main> <!-- /.mainWrapper mainWrapper--padding center-block -->

<!-- Footer -->
<?php get_footer(); ?>