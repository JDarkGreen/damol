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
		
		<figure class="mainHeader__banner">
			<?php the_post_thumbnail( 'full' , array('class' => 'img-responsive center-block') ); ?>
		</figure> <!-- /.mainHeader__banner -->

		<!-- Seccion Contenedora -->
		<div class="container">
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


		<?php endif; endwhile; endif; wp_reset_postdata(); ?>

		<!-- NAVEGACION PRINCIPAL -->
		<nav class="mainNav">
			<?php wp_nav_menu(
				array(
					'menu_class'     => 'list-inline text-center',
					'theme_location' => 'main-menu'
				));
			?>
		</nav> <!-- /.mainNav -->

	</header> <!-- /mainHeader -->