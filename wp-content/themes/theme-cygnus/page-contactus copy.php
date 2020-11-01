<?php
/*
Template Name: contact-plantilla
*/
?>
<?php get_header(light); ?>
<div class="contactbg" <?php if( get_field('bg-footer', 'option') ): ?> style="background-image:url('<?php the_field('bg-footer', 'option'); ?>')"<?php endif; ?> >
<main class="site-content">
  <section id="contact-page">
    <div class="container">
      <?php get_template_part('assets/inc/form-contact');?>
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
  </section>
  
 
</main>
<?php get_footer(); ?>
</div>