
<!-- Extraer opciones  -->
<?php $options = get_option('damol_custom_settings'); var_dump($options); ?>
	
	<!-- Footer -->
	<footer class="mainFooter">
	
		<!-- Prefooter -->
		<section class="mainFooter__prefooter">
			<!-- Contenedor limitador  -->
			<div class="mainFooter__content">
				<!-- Item de Informacion -->
				<article class="item-prefooter item-prefooter--info">
					<!-- Ritulo -->
					<h2 class="text-uppercase"><?php _e( 'damol sac.', 'damol-framework' ); ?></h2>

					<!-- Contenedor flexible -->
					<div class="item-prefooter__flexbox">
						<!-- Logo  -->
						<figure><img src="" alt="" class="img-responsive" /></figure>
						<!-- Parrafo -->
						<?php $info_nosotros = $options['widget_nosotros']; if( !empty($info_nosotros) ) : ?>
							<p><?= $info_nosotros ?></p>
						<?php endif; ?>
						<!-- Imagen -->
						<?php $img_nosotros = $options['image_nosotros']; if( !empty($img_nosotros) ) : ?>
							<figure><img src="<?= $img_nosotros ?>" alt="nosotros-damol" class="img-responsive" /></figure>
						<?php endif; ?>
					</div>
				</article>
				<!-- Item de sociales -->
				<article class="item-prefooter item-prefooter--sociales">
					<!-- Titulo -->
					<h2 class="text-uppercase"><?php _e( 'redes sociales', 'damol-framework' ); ?></h2>

					<!-- Lista -->
					<ul class="item-prefooter__social-links">
						<!-- youtube -->
						<?php $youtube = $options['red_social_ytube']; if( !empty($youtube) ) : ?>
							<li><a href="<?= $youtube ?>"><img src="" alt="" class="img-responsive"></a></li>
						<?php endif; ?>
						<!-- twitter -->
						<?php $twitter = $options['red_social_twitter']; if( !empty($twitter) ) : ?>
							<li><a href="<?= $twitter ?>"><img src="" alt="" class="img-responsive"></a></li>
						<?php endif; ?>
						<!-- fb -->
						<?php $facebook = $options['red_social_fb']; if( !empty($facebook) ) : ?>
							<li><a href="<?= $facebook ?>"><img src="" alt="" class="img-responsive"></a></li>
						<?php endif; ?>
						
					</ul>
				</article> <!-- /. -->
				<!-- Item de contacto -->
				<article class="item-prefooter item-prefooter--contacto">
					<!-- Titulo -->
					<h2 class="text-uppercase"><?php _e( 'contacto', 'damol-framework' ); ?></h2>

					<!-- Direccion  -->
					<p>asdasdasdasd</p>

					<!-- Telefonos -->
					<p>Tel:</p>

					<!-- Consultas Correo  -->
					<p><?php _e( 'Consultas:', 'damol-framework' ); ?></p>
				</article> <!-- /. -->
			</div> <!-- /.mainFooter__content -->			
		</section> <!-- /.mainFooter__prefooter -->
		
		<!-- Barra de información -->
		<section class="mainFooter__info">
			<!-- Contenedor limitador  -->
			<div class="mainFooter__content">
			</div> <!-- /.mainFooter__content -->
		</section><!-- /.mainFooter__info -->
		
	</footer> <!-- /.mainFooter -->

	<?php wp_footer(); ?>

</body>
</html>