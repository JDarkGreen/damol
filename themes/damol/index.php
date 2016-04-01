<?php  

/* 
	Pagina de Inicio Home
*/
?>

<!-- Header -->
<?php get_header(); ?>

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

					$categories = get_categories($args);

					#var_dump($categories);["term_id]nametaxonomycat_ID
					$cats = [];

					foreach ($categories as $cat) { $cats[] = $cat->cat_ID;	}
					$cats = implode(",", $cats );

					//EL QUERY para mostrar los posts de esas categorias
					$array = array(
						'category'   => $cats ,
						'hide_empty' => false,
						'order'      => 'ASC',
						'orderby'    => 'menu_order',
						'post_type'  => 'service',
					);

					$services = get_posts( $array );

					#var_dump($services);

					foreach( $services as $serv ) : 
				?>
					<article class="sectionHomeService__article">
						<?php 
							if( has_post_thumbnail( $serv->ID ) ) : 
						?>
							<figure>
								<?= get_the_post_thumbnail( $serv->ID ,'full', array('class'=>'img-responsive') ) ?>
							</figure>
						<?php endif; ?>
						<h3 class="text-uppercase text-center">
							<strong>
								<?php 
									$categoria = get_the_category($serv->ID);
									_e( $categoria[0]->name , 'damol-framework' );
								?>
							</strong>
						</h3>
					</article> <!-- /.sectionHomeService__article -->
				<?php endforeach; ?>

			</div>
		</section><!-- /.sectionHomeService -->

		<!-- Seccion widget facebook -->
		<section class="sectionHomeFacebook center-block">
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

						<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false"  data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="<?= $link_facebook ?>">
									<a href="<?= $link_facebook ?>"><?php bloginfo('name'); ?></a>
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
							<h2 class="text-center"><?php the_title(); ?></h2>
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

</main> <!-- /mainWrapper -->

<!-- Footer -->
<?php get_footer(); ?>