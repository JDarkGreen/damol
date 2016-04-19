
<?php  
	// The Query
	$args = array(
		'post_type' => 'banner',
		'tax_query' => array(
			array(
				'taxonomy'         => 'banner_category',
				'field'            => 'slug',
				'terms'            =>  $terms,
				)
			),
		'orderby'          => 'menu_order',
		'order'            => 'ASC'
		);
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) :

?>
<!-- Seccion de Banners -->
<section id="carousel-banner-home" class="sectionBanner carousel slide" data-ride="carousel">
	<!-- Wrapper for slides -->
  	<div class="carousel-inner" role="listbox">
		<?php 
			//variable 
			$i = 0;

			while ( $the_query->have_posts() ) : $the_query->the_post();	
		?>	
		<?php if( has_post_thumbnail() ) : ?>
	    	<div class="item <?= $i == 0 ? 'active' : '' ?>">
	      		<?= the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
	      		<!--img src="http://lorempixel.com/1920/1080" alt="" class="img-responsive"-->
	      		<section class="container">	

	      				<div class="">
			      			<!-- Contenedor izquieda o derecha depende del admin -->
			      			<?php  
			      				//conparar metabox de contenido de banner derecha o izquierda
			      				$position  = get_post_meta( get_the_id() , 'mb_check_position_banner' , true );
			      				$class_pos = $position === 'on' ? 'carousel-caption__content--right' : 'carousel-caption__content--left';
			      			?>
			      			<div class="carousel-caption__content <?= $class_pos; ?>">
				      			<h2 class="text-uppercase"><?php the_title() ?></h2>
				      			<?php 
				      				$content =  get_the_content();
				      				if ( !empty($content) ): 
				      			?>
				      				<p class="pull-right hidden-xs"><?= $content; ?></p>
				      			<?php endif; ?>
			      			</div> <!-- /.carousel-caption__content -->
	      				</div> <!-- /.-->



	      		</section> <!-- /.container -->
	    	</div> <!-- /.item -->
    	<?php endif; ?>
		<?php $i++; endwhile; ?>
    </div> <!-- /.carousel-inner -->
	

    <!-- Indicators -->
    <ol class="carousel-indicators">
    	<?php 
			//variable 
			$i = 0;
			while ( $the_query->have_posts() ) : $the_query->the_post();	
		?>
    		<li data-target="#carousel-banner-home" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
    	<?php $i++; endwhile; wp_reset_postdata(); ?>
    </ol> <!-- /.carousel-indicators -->
	
	<!-- Flechas de direccion -->
    <section class="container">
    	<div class="row">
    		<div class="content-arrowBanner">
    			<!-- Controls -->
    			<a class="btn-arrowBanner btn-arrowBanner--left" href="#carousel-banner-home" role="button" data-slide="prev">
    				<span class="sr-only">Previo</span>
    			</a>
    			<a class="btn-arrowBanner btn-arrowBanner--right" href="#carousel-banner-home" role="button" data-slide="next">
    				<span class="sr-only">Siguiente</span>
    			</a>
    		</div> <!-- /content-arrowBanner -->
    	</div> <!-- /.row -->
    </section> <!-- /.container -->

    
</section> <!-- /sectionBanner#carousel-banner-home -->

<?php endif; ?>