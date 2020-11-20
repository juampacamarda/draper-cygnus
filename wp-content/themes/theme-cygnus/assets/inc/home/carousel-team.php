<?php 
$args = array('post_type' => 'miembros','posts_per_page' => 5,'orderby' => 'menu_order','order'=>'ASC');
$query = new WP_query ( $args );
if ( $query->have_posts() ) { ?>
  <div id="partners-carousel" class="owl-carousel">
  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
  
    <article class="partner">
      <a href="<?php the_permalink(); ?>">
        <?php if ( get_field( 'foto_integrante_home' ) ) : ?>
          <div class="foto" style="background-image:url(<?php the_field( 'foto_integrante_home' ); ?>)">
          </div>
        <?php elseif( get_field( 'foto_integrante' ) ) : ?>
          <div class="foto" style="background-image:url(<?php the_field( 'foto_integrante' ); ?>)">
          </div>
        <?php else: ?>
          <div class="foto" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/default-cygnus.png' )">
          </div>
        <?php endif ?>
      </a>
      <div class="datos">
        <h3 class="nombre d-none d-lg-block"><?php the_field( 'nombre' ); ?></h3>
        <h3 class="rol d-none d-lg-block"><?php the_field( 'rol' ); ?></h3>
        <h4 class="nombre d-block d-lg-none"><?php the_field( 'nombre' ); ?></h3>
        <h4 class="rol d-block d-lg-none"><?php the_field( 'rol' ); ?></h3>
      </div>
      <div class="redes">
        <?php if( have_rows('redes') ): ?>	
          <ul class="nav">
            <?php while( have_rows('redes') ): the_row(); ?>
            <li class="red">
              <a href="<?php the_sub_field('link_a_red_social'); ?>" target="_blank">
                <?php the_sub_field('icono_de_red_social'); ?>
              </a>
            </li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
      </div>
      <a href="<?php the_permalink(); ?>" class="enlace">View Profile</a>
    </article>
 
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
  </div>
<?php } ?>