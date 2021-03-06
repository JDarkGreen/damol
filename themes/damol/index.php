<?php  

/* 
	Pagina de Inicio Home
*/
?>

<!-- Header -->
<?php get_header(); ?>

<!-- Contenedor SB SITE responsive libreria SLIDEBARS -->
<section id="sb-site" class="">

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
					#conseguir las categorias generales 
					$args = array(
						'exclude'    => '1',
						'hide_empty' => false,
						'orderby'    => 'menu_order',
						'order'      => 'ASC'
					);

					$categories = get_terms( 'category', $args );

					#var_dump($categories);

					foreach( $categories as $cat ) : 
				?>
					<article class="sectionHomeService__article">
						<?php 
							$t_id     = $cat->term_id;
							$cat_meta = get_option( "category_$t_id");
							$image    = $cat_meta['img']; 
						?>
							<figure>
								<?php if( !empty($image)) : ?>
									<img src="<?= $image ?>" alt="<?= $cat->name ?>" class="img-responsive">
								<?php else: ?>
									<img src="http://lorempixel.com/500/283/" alt="<?= $cat->name ?>" class="img-responsive">
								<?php endif; ?>
							</figure>
						<h3 class="text-uppercase text-center">
							<strong><?= $cat->name; ?></strong>
						</h3>
					</article> <!-- /.sectionHomeService__article -->
				<?php endforeach; ?>

			</div>
		</section><!-- /.sectionHomeService -->

		<!-- Seccion widget facebook - Ocultar en version mobile -->
		<section class="sectionHomeFacebook center-block hidden-xs">
			<!-- Titulo -->
			<h2 class="mainWrapper__title text-uppercase"><?php _e( 'facebook oficial' , 'damol-framework' ); ?></h2>
			<br>

			<!-- Contenedor -->
			<?php $link_facebook = $options['red_social_fb']; 
				if( !empty($link_facebook) ) :
			?>
			
				<!-- Contebn -->
				<div id="fb-root"></div>

						<!-- Script -->
						<script>(function(d, s, id) {
						  var js, fjs = d.getElementsByTagName(s)[0];
						  if (d.getElementById(id)) return;
						  js = d.createElement(s); js.id = id;
						  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
						  fjs.parentNode.insertBefore(js, fjs);
						}(document, 'script', 'facebook-jssdk'));</script>

						<div class="fb-page" data-href="https://www.facebook.com/Tecserpc-273564962981759/" data-tabs="timeline" data-small-header="false"  data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="https://www.facebook.com/Tecserpc-273564962981759/">
									<a href="https://www.facebook.com/Tecserpc-273564962981759/"></a>
								</blockquote>
							</div>
						</div>

			<?php endif; ?>

		</section><!-- /. sectionHomeFacebook -->

	</section> <!-- /.wrapper-flex-->

	<!-- Contenedor Proyectos Realizados -->
	<section class="sectionHomeProyects">
		<!-- Titulos -->
		<h2 class="mainWrapper__title text-uppercase"><?php _e( 'proyectos realizados' , 'damol-framework' ); ?></h2>
		<br>

		<?php  
			//the query 
			$args = array(
				'post_type' => 'proyecto'
			);

			$the_query = new Wp_Query($args);

			if( $the_query->have_posts() ) :
		?>

		<!-- Contenedor position relative -->
		<div class="section-wrapper-relative">
			<!-- Contenedor de sliders -->
			<section id="carouserl-services-home" class="sectionHomeProyects__carousel">
				<?php while( $the_query->have_posts() ): $the_query->the_post(); ?>
					<article class="sectionHomeProyects__article">
						<a href="<?php the_permalink(); ?>">
							<figure>
								<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
								<span class="bg-transparence"></span>
							</figure>
							<h2 class="text-center">
								<?php 
									$short_title   = wp_trim_words( get_the_title() , 2 , "");
									$short_excerpt = get_the_excerpt();
								?>
								<?= !empty( $short_excerpt ) ? $short_excerpt : $short_title; ?>
							</h2>
						</a>
					</article> <!-- /.sectionHomeProyects__article -->
				<?php endwhile; ?>

			</section><!-- /.sectionHomeProyects__carousel -->	

			<!-- FLECHAS -->
			<div id="proyecto-prev" class="sectionCarousel__arrow sectionCarousel__arrow--prev"></div>
			<div id="proyecto-next" class="sectionCarousel__arrow sectionCarousel__arrow--next"></div>

		</div> <!-- /.section-wrapper-relative -->

		<?php endif; ?>

	</section> <!-- /.sectionHomeProyects -->

	<!-- Seccion widget facebook mostrado solamente en versión mobile -->
	<section id="sectionHomeFacebook" class="sectionHomeFacebook center-block js-sidebarRightInside visible-xs-block">

		<!-- Titulo -->
		<h2 class="mainWrapper__title text-uppercase">
			<?php _e( 'facebook oficial' , 'damol-framework' ); ?></h2>
		<br>

		<!-- Contenedor -->
		<?php $link_facebook = $options['red_social_fb']; 
		if( !empty($link_facebook) ) :
			?>
		<!-- Content -->
		<div id="fb-root"></div>

		<!-- Script -->
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

		<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false"  data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
			<div class="fb-xfbml-parse-ignore">
				<blockquote cite="<?= $link_facebook ?>">
					<a href="<?= $link_facebook ?>"><?php bloginfo('name'); ?></a>
				</blockquote>
			</div>
		</div>

	<?php endif; ?>
	</section><!-- /. sectionHomeFacebook -->


	<!-- Incluir Sección de Clientes mediante partial  -->
	<?php include( locate_template('partials/clientes.php') ); ?>
	<!-- Fin seccion clientes -->

</main> <!-- /mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>


<!-- Contenedor SB SITE responsive libreria SLIDEBARS -->
</section>



