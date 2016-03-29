<?php /*Template Name: Service Single*/  ?>

<!-- Header -->
<?php get_header(); ?>

<!-- CONTENIDO PRINCIPAL -->
<main class="mainWrapper center-block">
	
	<!-- Banner de Página -->
	<?php 
		$banner_service = get_post_meta($post->ID, 'input_img_banner_serv_'.$post->ID , true);
		if( !empty($banner_service) ) :
	?>
		<figure class="bn_ImagePage">
			<img src="<?= $banner_service ?>" alt="banner-service-<?= $post->ID ?>" class="img-responsive" />
		</figure> <!-- /.bn_ImagePage -->
	<?php endif; ?>

</main> <!-- /.mainWrapper center-block -->

<!-- Footer -->
<?php get_footer(); ?>
