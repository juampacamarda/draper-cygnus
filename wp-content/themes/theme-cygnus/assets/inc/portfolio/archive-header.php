<div class="archive-header" <?php if( get_field('background', 'option') ): ?> style="background-image:url('<?php the_field('background', 'option'); ?>')"<?php endif; ?>>
  <?php if( get_field('background', 'option') ): ?> 
    <h2 class="frase-archivo d-none d-lg-block">
      <?php the_field('frase', 'option'); ?>
    </h2>
    <h3 class="frase-archivo d-block d-lg-none">
      <?php the_field('frase', 'option'); ?>
    </h3>
  <?php endif ?>
</div>