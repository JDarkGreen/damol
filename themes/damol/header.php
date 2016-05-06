<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<!--meta name="description" content="<?php #bloginfo('description'); ?>"-->
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	<link rel="icon" type="image/png" href="<?= THEMEROOT ?>/favicon.ico"  />
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<?php 
		$options = get_option('damol_custom_settings'); 
		global $post;
	?>

	<!-- Header -->
	<header class="mainHeader">
		
		<!-- Escoger el banner para el header -->
		<?php  
			//the query 
			$args = array(
				'post_type' => 'banner',
				'tax_query' => array(
					array(
						'taxonomy' => 'banner_category',
						'field'    => 'slug',
						'terms'    =>  'header',
					)
				),
				'posts_per_page' => 1,
			);

			$query = new WP_Query($args);

			if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
			
			if( has_post_thumbnail() ) :
		?>
		
		<figure class="mainHeader__banner sb-slide">
			<?php the_post_thumbnail( 'full' , array('class' => 'img-responsive center-block') ); ?>
		</figure> <!-- /.mainHeader__banner -->

		<!-- Seccion Contenedora -->
		<!-- Ocultar en mobile -->
		<div class="container hidden-xs">
			<h1 class="logo">
				<a href="<?= site_url() ?>">
					<?php if( !empty($options['logo']) ) : ?>
						<img src="<?= $options['logo'] ?>" alt="logo-damol" class="img-responsive center-block" />
					<?php else: ?>
						<img src="<?= IMAGES ?>/logo.png" alt="logo-damol" class="img-responsive center-block" />
					<?php endif; ?>
				</a>
			</h1><!-- /logo -->
		</div><!-- /.container -->

		<!-- Seccion contenedor mostrar en mobile -->
		<section class="mainHeader__content-small visible-xs-block sb-slide">
			<!-- Inono Left -->
			<span class="sb-toggle-left icon-header pull-left glyphicon glyphicon-align-justify"></span>

			<!-- Inono Right -- En observación -->
			<!--span id="sb-toggle-right" class="icon-header pull-right glyphicon glyphicon-th">
			</span-->

			<!-- Logo -->	
			<a class="content-logo center-block" href="<?= site_url() ?>">
				<?php if( !empty($options['logo']) ) : ?>
					<img src="<?= $options['logo'] ?>" alt="logo-damol" class="img-responsive center-block" />
				<?php else: ?>
					<img src="<?= IMAGES ?>/logo.png" alt="logo-damol" class="img-responsive center-block" />
				<?php endif; ?>
			</a>

			<!-- Clearfix --> <div class="clearfix"></div>
		</section><!-- /. visible-xs-block -->


		<?php endif; endwhile; endif; wp_reset_postdata(); ?>

		<!-- NAVEGACION PRINCIPAL SOLO EN DESKTOP DESAPARECE EN MOBILE-->
		<nav class="mainNav hidden-xs">
			<?php wp_nav_menu(
				array(
					'menu_class'     => 'list-inline text-center',
					'theme_location' => 'main-menu'
				));
			?>
		</nav> <!-- /.mainNav hidden-xs -->

	</header> <!-- /mainHeader -->

	<!-- Linea separadora  -->
	<div class="mainHeader-padding-separator visible-xs-block"></div>
	<!-- /.mainHeader-padding-separator -->	


	<!-- Navegacion responsive solo en mobiles  Menu principal -->
	<aside class="sidebarMobile sb-slidebar sb-left sb-style-push">
	  <!-- LOGO -->	
		<a class="content-logo content-logo--white center-block" href="<?= site_url() ?>">
			<?php if( !empty($options['logo']) ) : ?>
				<img src="<?= $options['logo'] ?>" alt="logo-damol" class="img-responsive center-block" />
			<?php else: ?>
				<img src="<?= IMAGES ?>/logo.png" alt="logo-damol" class="img-responsive center-block" />
			<?php endif; ?>
		</a>

		<!-- Separacion  --> <br/>

		<!-- MENU DE NAVEGACIÓN -->
		<nav class="mainNav">
			<?php wp_nav_menu(
				array(
					'menu_class'     => 'text-left js-main-menu-mobile',
					'theme_location' => 'main-menu'
				));
			?>
		</nav> <!-- /.mainNav hidden-xs -->

	</aside>	<!-- /. -->

	<!-- Navegacion responsive solo en mobiles Menu de aside right-->
	<aside class="sidebarMobile sidebarMobile--right sb-slidebar sb-right sb-style-push">

		<!-- SECCION DE CATEGORIAS DE PROYECTOS EN VERSION MOBILE SE ACTIVA 
		SI TIENE POST ACTUAL -->
		<?php 
			/* proyecto (post) actual */
			$args1 = array(
				'category_name' => $cat[0]->name,
				'order'         => 'ASC',
				'orderby'       => 'title',
				'post_type'     => 'proyecto',
				'post_status'   => 'publish',
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
        	'post_status'   => 'publish',
        	'tax_query' => array(
        		array(
							'taxonomy' => 'damol_empresa',
							'field'    => 'slug',
							'terms'    =>  $empresas[0]->name,
        		)
        	)
        );

			$all_project = get_posts( $args );  #var_dump( $all_project);

			//comprobar si esta el el single de cada proyecto 
			if ( is_single() ){
				$first_project = get_post( $post->ID );
			} else{
				$first_project = $all_project[0]; #var_dump($first_project);
			}

			$cat = get_the_category($post->ID);  /* array de categorias */
			if( count($cat) > 0 ) :
		?>
		<section id="sectionProjectos__categories" class="sectionProjectos__categories js-sidebarRightInside hide">

			<!-- Categoria a la que pertenece -->
			<h2 class="title-category">
				<?= $cat[0]->name; ?>
			</h2><!-- /title_category -->

			<!-- Contenedor Accordeon -->
			<div class="list_project_by_category panel-group" id="accordion3" role="tablist" aria-multiselectable="true">

				<?php 
				$args1 = array(
					'category_name'  => $cat[0]->slug,
					'order'          => 'ASC',
					'orderby'        => 'title',
					'post_type'      => 'proyecto',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
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
						<div class="panel-heading" role="tab" id="heading<?= $empresa->term_id; ?>3">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion3" href="#collapse<?= $empresa->term_id; ?>3" aria-expanded="true" aria-controls="collapse<?= $empresa->term_id; ?>3"><?= $empresa->name; ?></a>
							</h4> <!-- /.panel-title -->
						</div> <!-- /.panel-heading -->
						<div id="collapse<?= $empresa->term_id; ?>3" class="panel-collapse collapse <?= $i == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?= $empresa->term_id; ?>3">
							<div class="panel-body">
								<?php  
								$args = array(
									'category_name' => $cat[0]->name,
									'order'         => 'ASC',
									'orderby'       => 'title',
									'post_type'     => 'proyecto',
									'post_status'   => 'publish',
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

		</section><!-- /.sectionProjectos__categories -->

		<?php endif; ?>

	</aside> <!-- /. -->