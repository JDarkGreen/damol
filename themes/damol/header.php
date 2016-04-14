<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
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
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
	<?php $options = get_option('damol_custom_settings'); ?>

	<!-- Header -->
	<header class="mainHeader sb-slide">
		
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
		
		<figure class="mainHeader__banner">
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
		<section class="mainHeader__content-small visible-xs-block">
			<!-- Inono Left -->
			<span class="sb-toggle-left icon-header pull-left glyphicon glyphicon-th"></span>
			<!-- Inono Right -->
			<span class="sb-toggle-right icon-header pull-right glyphicon glyphicon-th"></span>
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
					'menu_class'     => 'text-left',
					'theme_location' => 'main-menu'
				));
			?>
		</nav> <!-- /.mainNav hidden-xs -->

	</aside>	<!-- /. -->

	<!-- Navegacion responsive solo en mobiles Menu de aside -->
	<aside class="sidebarMobile sb-slidebar sb-right sb-style-push">

		<!-- Seccion widget facebook -->
		<section class="sectionHomeFacebook center-block">
			<!-- Titulo -->
			<h2 class="mainWrapper__title mainWrapper__title--white text-uppercase"><?php _e( 'facebook oficial' , 'damol-framework' ); ?></h2>
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

						<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false"  data-width="220" data-hide-cover="false" data-show-facepile="true">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="<?= $link_facebook ?>">
									<a href="<?= $link_facebook ?>"><?php bloginfo('name'); ?></a>
								</blockquote>
							</div>
						</div>

			<?php endif; ?>
		</section><!-- /. sectionHomeFacebook -->

	</aside> <!-- /. -->