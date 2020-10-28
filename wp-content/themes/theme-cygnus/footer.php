			<!-- footer -->
			<footer class="footer" role="contentinfo" <?php if( get_field('bg-footer', 'option') ): ?> style="background-image:url('<?php the_field('bg-footer', 'option'); ?>')"<?php endif; ?> >
				<div class="container-fluid">
					<div class="row d-flex">
						<div class="col-12 col-md-2">
							<?php if( get_field('footer_logo', 'option') ): ?>
								<img src="<?php the_field('footer_logo', 'option'); ?>" />
							<?php endif; ?>
						</div>
						<div class="col-12 col-md-4">
						<?php if( have_rows('redes', 'option') ): ?>	
							<ul class="nav redes">
								<li class="tittle-redes">
									<h4>Follow us</h4>
								</li>
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
