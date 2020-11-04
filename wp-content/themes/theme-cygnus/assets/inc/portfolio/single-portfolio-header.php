<section id="portfolio-header">
    <div class="container">
        <div id="goback" class="d-flex justify-content-end">
          <a class="btn-goback" href="<?php bloginfo('url'); ?>/portfolio">
            <i class="far fa-times-circle"></i>
          </a>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-4 ">
                <div id="info" class="d-lg-flex flex-lg-column justify-content-lg-center">
                  <div class="logo">
                  <?php if ( get_field( 'logo' ) ) : ?>
                      <img src="<?php the_field( 'logo' ); ?>" class="d-block" />
                  <?php else: ?>
                      <h2><?php the_title(); ?></h2>
                  <?php endif ?>
                  </div>
                  <h3 class="frase"><?php the_field( 'frase_destacada' ); ?></h3>
                </div>
            </div>
            <div class="col-12 col-md-8">
            <?php if ( get_field( 'imagen-portada' ) ) : ?>
                <div class="imagen" style="background-image:url('<?php the_field( 'imagen-portada' ); ?>')">
                    <p><small><?php the_field( 'bajada_foto' ); ?></small></p>
                </div>
            <?php else: ?>
                <div class="imagen" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/default-cygnus.png' )">
                </div>
            <?php endif ?>
                
            </div>
        </div>
    </div>
</section>