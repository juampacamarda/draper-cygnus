<section id="contenido">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
          <h3 class="responsables"><?php the_field( 'nombre_responsables' ); ?></h3>
      </div>
      <div class="col-md-8">
          <h4 class="bajada"><?php the_field( 'texto-bajada' ); ?></h4>
          <p class="cuerpo">
              <?php the_field( 'texto_about' ); ?>
          </p>
          <?php if ( get_field( 'enlace' ) ) : ?>
              <a class="enlace" href="<?php the_field( 'enlace' ); ?>" target="blank">Visit site</a>
          <?php endif ?>
      </div>
  </div>
  </div>
</section>