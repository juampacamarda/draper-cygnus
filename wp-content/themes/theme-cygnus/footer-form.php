			<!-- footer -->
			<footer class="footer footer-form" role="contentinfo" <?php if( get_field('bg-footer', 'option') ): ?> style="background-image:url('<?php the_field('bg-footer', 'option'); ?>')"<?php endif; ?> >
				<div class="container-fluid">
					<div class="row d-flex justify-content-center">
						<div class="col-12 col-md-6">
							<div class="top">
								<h2>Contac Us</h2>
								<?php if( have_rows('redes', 'option') ): ?>	
									<ul class="nav redes d-none d-lg-flex">
										<?php while( have_rows('redes', 'option') ): the_row(); ?>
										<li class="red">
											<a href="<?php the_sub_field('link'); ?>">
												<?php the_sub_field('icon'); ?>
											</a>
										</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="form-contact">
								<?php the_field('codigo_para_formulario', 'option'); ?>
							</div>
						</div>
					</div>
					<div class="bottom-movil">
						<?php if( have_rows('redes', 'option') ): ?>	
							<ul class="nav redes d-lg-none">
								<?php while( have_rows('redes', 'option') ): the_row(); ?>
								<li class="red">
									<a href="<?php the_sub_field('link'); ?>">
										<?php the_sub_field('icon'); ?>
									</a>
								</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
				
				<!-- copyright -->
				<p class="copyright text-center">
					<?php the_field('texto-copy-right', 'option'); ?>
				</p>
				<!-- /copyright -->

			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
		

	</body>
</html>
