
<!-- Extraer opciones  -->
<?php $options = get_option('damol_custom_settings'); ?>
	
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

					<!-- Contenedor -->
					<div class="section-wrapper-relative">
						<!-- Logo  -->
						<figure class="logo__black"><img src="<?= IMAGES ?>/footer/damol_logo_black.jpg" alt="damol_logo_black" class="img-responsive" /></figure>
						<!-- Parrafo -->
						<?php $info_nosotros = $options['widget_nosotros']; if( !empty($info_nosotros) ) : ?>
							<p class="info__about text-justify"><?= $info_nosotros ?></p>
						<?php endif; ?>
						<!-- Imagen -->
						<?php $img_nosotros = $options['image_nosotros']; if( !empty($img_nosotros) ) : ?>
							<figure class="info__about-img"><img src="<?= $img_nosotros ?>" alt="nosotros-damol" class="img-responsive" /></figure>
						<?php endif; ?>
					</div> <!-- /.item-flexbox -->
				</article>
				<!-- Item de sociales -->
				<article class="item-prefooter item-prefooter--sociales text-center">
					<!-- Titulo -->
					<h2 class="text-uppercase"><?php _e( 'redes <br /> sociales', 'damol-framework' ); ?></h2>

					<!-- Lista -->
					<ul class="item-prefooter__social-links">
						<!-- youtube -->
						<?php $youtube = $options['red_social_ytube']; if( !empty($youtube) ) : ?>
							<li><a href="<?= $youtube ?>"><img src="<?= IMAGES ?>/footer/redes-sociales/youtube.png" alt="facebook" class="img-responsive"></a></li>
						<?php endif; ?>
						<!-- twitter -->
						<?php $twitter = $options['red_social_twitter']; if( !empty($twitter) ) : ?>
							<li><a href="<?= $twitter ?>"><img src="<?= IMAGES ?>/footer/redes-sociales/twitter.png" alt="" class="img-responsive"></a></li>
						<?php endif; ?>
						<!-- fb -->
						<?php $facebook = $options['red_social_fb']; if( !empty($facebook) ) : ?>
							<li><a href="<?= $facebook ?>"><img src="<?= IMAGES ?>/footer/redes-sociales/facebook.png" alt="" class="img-responsive"></a></li>
						<?php endif; ?>
						
					</ul>
				</article> <!-- /. -->
				<!-- Item de contacto -->
				<article class="item-prefooter item-prefooter--contacto">
					<!-- Titulo -->
					<h2 class="text-uppercase"><?php _e( 'contacto', 'damol-framework' ); ?></h2>

					<!-- Direccion  -->
					<?php $address = $options['contact_address']; if( !empty($address) ) : ?>
						<p><?= $address ?></p>
					<?php endif; ?>

					<!-- Telefonos -->
					<?php $tel = $options['contact_tel']; if( !empty($tel) ) : ?>
						<p>Tel: <?= $tel ?></p>
					<?php endif; ?>

					<!-- Consultas Correo  -->
					<?php $emails = $options['contact_email']; if( !empty($emails) ) : ?>
						<p><?php _e( 'Consultas:', 'damol-framework' ); 
							$emails = explode(',', $emails);
							foreach ($emails as $mail ) {
								echo "<span class='text-orange'>" . $mail . "</span><br />";
							}	
						?></p>
					<?php endif; ?>
				</article> <!-- /. -->
			</div> <!-- /.mainFooter__content -->			
		</section> <!-- /.mainFooter__prefooter -->
		
		<!-- Barra de información -->
		<section class="mainFooter__info">
			<!-- Contenedor limitador  -->
			<div class="mainFooter__content mainFooter__content--center">
				<p class="text-copyright"><?php _e('Copyright ©'.date('Y').' Damol SAC. Todos los derechos reservados.', 'damol-framework' ); ?></p>
				<p class="text-web"><strong>www.<span>damol</span>.com.pe</strong></p>
			</div> <!-- /.mainFooter__content -->
		</section><!-- /.mainFooter__info -->
		
	</footer> <!-- /.mainFooter -->

	<?php wp_footer(); ?>

</body>
</html>