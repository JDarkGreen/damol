<?php /* Template Name: Página Contacto Plantilla */ ?>

<!-- Header -->
<?php get_header();
	global $post;
?>

<?php $options = get_option('damol_custom_settings'); ?>

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
				<h2 class="text-uppercase"> <strong>contacto</strong></h2> <!-- /text-uppercase -->
			</section><!-- /.sectionService__content-banner -->
		</div> <!-- /.section-wrapper-relative -->
	<?php endif; ?>

	<!-- Contenido Principal -->
	<section class="sectionService__content">
		<!-- Titulos -->
		<h2 class="title-subcontent-pages"><?php _e( get_the_title() , 'damol-framework' ); ?></h2>

		<!-- Seccion Informacion -->
		<section class="sectionContacto__info">

			<div class="col-xs-12 col-sm-6">
				<div class="sectionContacto__info__office center-block">
					<h2 class="text-uppercase"><?php _e( 'oficinas principales' , 'damol-framework' ); ?></h2>
					<p>					
						<?php $cel = $options['contact_cel']; if( !empty($cel) ) : ?>
							<i class="icon icon--tel"></i> Cel: <?= $cel ?>
							<br /><br />
						<?php endif; ?>
						<i class="icon icon--contact"></i> wcollachagua@damol.com.pe <br /><br />
						<i class="icon icon--contact"></i> administracion@damol.com.pe
					</p>
					<span class="line-orange"> <i class="line-orange__icon"></i>
						<i class="icon icon--address"></i>

							Calle Bolognesi 125 - Oficina 20
							Centro Ejecutivo Pardo <br /> Miraflores - Lima
					</span>
				</div><!-- /.sectionContacto__info__office -->
			</div> <!-- /."col-xs-12 col-sm-6 -->

			<div class="col-xs-12 col-sm-6">
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
					<figure class="">
						<img src="<?= $atta->guid ?>" alt="<?= $atta->post_title ?>" class="img-responsive center-block" />
					</figure> 
				<?php endforeach; ?>				
			</div> <!-- /."col-xs-12 col-sm-6 -->

			<div class="clearfix"></div>
		</section><!-- /.sectionContacto__info -->

		<!-- Seccion del mapa -->
		<section class="sectionContacto__mapa">
			<div id="canvas-map"></div>
		</section>

	</section><!-- /.sectionService__content -->

	<!-- Linea Separadora  -->
	<span class="line-gray-separator"></span>

	<!-- Incluir Sección de Clientes mediante partial  -->
	<?php include( locate_template('partials/clientes.php') ); ?>
	<!-- Fin seccion clientes -->

</main> <!-- /.mainWrapper center-block -->

<script type="text/javascript">

	<?php  
		$mapa = explode(',', $options['contact_mapa'] );
		$lat = $mapa[0];
		$lng = $mapa[1];
	?>

    var map;
    var lat = <?php echo $lat ?>;
    var lng = <?php echo $lng ?>;

    function initialize() {
      //crear mapa
      map = new google.maps.Map(document.getElementById('canvas-map'), {
        center: {lat: lat, lng: lng},
        zoom  : 16
      });

      //infowindow
      /*content: <?= "'" . $options['contact_address'] . "'" ?>*/
      var infowindow = new google.maps.InfoWindow({
        content: 'Poner en google "movitecnica" ',
      });

      //crear marcador
      marker = new google.maps.Marker({
        map      : map,
        draggable: false,
        animation: google.maps.Animation.DROP,
        position : {lat: lat, lng: lng},
        title    : "<?php _e(bloginfo('name'),'damol-framework') ?>"
      });
      //marker.addListener('click', toggleBounce);
      marker.addListener('click', function() {
        infowindow.open( map, marker);
      });
    }

    google.maps.event.addDomListener(window, "load", initialize);
  </script>

<!-- Footer -->
<?php get_footer(); ?>

</section> <!-- /. id="sb-site" class -->