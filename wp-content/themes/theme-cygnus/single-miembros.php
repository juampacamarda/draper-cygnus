<?php get_header(); ?>
<main class="site-content">
  <section id="team">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4">
          <?php if ( get_field( 'foto_integrante' ) ) : ?>
            <div class="foto" style="background-image:url(<?php the_field( 'foto_integrante' ); ?>)">
            </div>
          <?php else: ?>
            <div class="foto" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/default-cygnus.png' )">
            </div>
          <?php endif ?>
          
          <div class="datos">
            <h3 class="nombre d-none d-lg-block"><?php the_field( 'nombre' ); ?></h3>
            <h3 class="rol d-none d-lg-block"><?php the_field( 'rol' ); ?></h3>
            <h4 class="nombre d-block d-lg-none"><?php the_field( 'nombre' ); ?></h3>
            <h4 class="rol d-block d-lg-none"><?php the_field( 'rol' ); ?></h3>
          </div>
          <div class="redes d-none d-lg-block">
            <?php if( have_rows('redes') ): ?>	
              <ul class="nav">
                <?php while( have_rows('redes') ): the_row(); ?>
                <li class="red">
                  <a href="<?php the_sub_field('link_a_red_social'); ?>">
                    <?php the_sub_field('icono_de_red_social'); ?>
                  </a>
                </li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
          </div>

        </div>
        <div class="col-12 col-lg-7">
          <h1 class="frases d-none d-lg-block"><?php the_field( 'frase' ); ?></h1>
          <h3 class="frases d-block d-lg-none"><?php the_field( 'frase' ); ?></h3>
          <p class="contenido">
            <?php the_field( 'bio' ); ?>
          </p>
        </div>
      </div>
    </div>
  </section>
  <section id="navigation">
    <!-- Previous and Next Post -->
    <?php if(is_single()) : ?>
    <!-- Para pantallas grandes -->
        <div class="navpost d-flex justify-content-between align-items-center" id="nextpreviouslinks">
          <?php if (get_previous_post_link()){ ?>
          <div class="prev-link">
              <?php previous_post_link( '%link', '<i class="fa fa-angle-left"></i> '); ?>
          </div>
          <?php } else {?>
            <div class="empty-link">
              
            </div>
          <?php }?>
            
          <div class=" d-none home-link">
              <a href="<?php bloginfo('url') ?>"><i class="fa fa-th" aria-hidden="true"></i></a>
          </div>
          <?php if (get_next_post_link()){ ?>
          <div class="next-link">
            <?php next_post_link( '%link', '<i class="fa fa-angle-right"></i>' ); ?>  
          </div>
          <?php } else {?>
            <div class="empty-link">
              
            </div>
          <?php }?>
          
        </div>
    <?php endif; ?>
    <!-- /Previous and Next Post -->
  </section>
</main>
<?php get_footer(); ?>