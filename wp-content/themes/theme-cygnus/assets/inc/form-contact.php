<div class="row d-flex justify-content-center">
  <div class="col-12 col-md-6">
    <div class="top">
      <h2>Contact Us</h2>
      <?php if( have_rows('redes', 'option') ): ?>	
        <ul class="nav redes d-none d-lg-flex">
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
    <div class="form-contact">
      <?php the_field('codigo_para_formulario', 'option'); ?>
    </div>
  </div>
</div>