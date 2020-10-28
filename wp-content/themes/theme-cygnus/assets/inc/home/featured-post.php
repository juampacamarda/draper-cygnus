<div class="row">
  <div class=" col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
    <div class="texto">
      <h2><?php the_field( 'titulo_entrada_destacada' ); ?></h2>
      <p><?php the_field( 'texto_entrada_destacada' ); ?></p>
      <a href="<?php the_field( 'texto_entrada_destacada' ); ?>" class="enlace">Read our thesis</a>
    </div>
  </div>
  <div class="contenido-posts col-12 col-md-6"> 
    <div class="imagen-post"  <?php if( get_field('imagen_de_entrada_destacada') ): ?> style="background-image:url('<?php the_field('imagen_de_entrada_destacada'); ?>')"<?php endif; ?>></div>
  </div>
</div>