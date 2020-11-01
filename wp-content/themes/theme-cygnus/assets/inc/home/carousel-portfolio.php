<?php 
$args = array('post_type' => 'portfolio','posts_per_page' => 9,'orderby' => 'menu_order',);
$query = new WP_query ( $args );
if ( $query->have_posts() ) { ?>
  <div id="portfolio" class="owl-carousel">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <article <?php post_class('startup'); ?>>
      <a href="<?php the_permalink(); ?>">
        <?php if ( get_field( 'imagen-portada' ) ) : ?>
        <div class="imagen-post" <?php post_class('startup'); ?> style="background-image:url('<?php the_field( 'imagen-portada' ); ?>')">
        </div>
        <?php else: ?>
        <div class="imagen-post" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/default-cygnus.png' )">
        </div>
        <?php endif; ?>
        <div class="startup-title">
            <?php if ( get_field( 'logo_home' ) ) : ?>
              <img src="<?php the_field( 'logo_home' ); ?>" class="img-fluid d-block"/>
            <?php else: ?>
              <h3><?php the_title(); ?></h3>
            <?php endif ?>
            <p><small><?php the_field( 'bajada_foto' ); ?></small></p>
        </div>
      </a>
    </article>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div> 
<?php } ?>