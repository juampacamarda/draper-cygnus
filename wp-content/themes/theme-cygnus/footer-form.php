			<!-- footer -->
			<footer class="footer footer-form" role="contentinfo" <?php if( get_field('bg-footer', 'option') ): ?> style="background-image:url('<?php the_field('bg-footer', 'option'); ?>')"<?php endif; ?> >
				<div class="container-fluid">
					<?php get_template_part('assets/inc/form-contact');?>
					<div class="bottom-movil">
						<?php if( have_rows('redes', 'option') ): ?>	
							<ul class="nav redes d-lg-none">
								<?php while( have_rows('redes', 'option') ): the_row(); ?>
								<li class="red">
									<a href="<?php the_sub_field('link'); ?>" target="_blank">
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
