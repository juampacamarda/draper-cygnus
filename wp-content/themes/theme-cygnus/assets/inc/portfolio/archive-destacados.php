<?php 
$args = array('post_type' => 'portfolio','posts_per_page' => -1,'category_name' =>'featured' ,'orderby' => 'menu_order','order'=>'ASC');
$query = new WP_query ( $args );
if ( $query->have_posts() ) { ?>
  <section id="startups-destacadas">
    <div class="container">
      <div class="row">
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-12 col-lg-4">
            <article <?php post_class('startup'); ?>>
              <a href="<?php the_permalink(); ?>">
              <?php if ( get_field( 'imagen-portada' ) ) : ?>
              <div class="imagen-startup" <?php post_class('startup'); ?> style="background-image:url('<?php the_field( 'imagen-portada' ); ?>');position:relative">
                <?php if ( get_field( 'exit-logo' ) == 1 ) : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/exit-link.svg" alt="" class="mr-2 exit-feat img-fluid">
                <?php endif; ?>
              </div>
              <?php else: ?>
              <div class="imagen-startup" style="background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/default-cygnus.png' )">
              </div>
              
              <?php endif; ?>
              
              </a>
              <div class="startup-title">
                <a href="<?php the_permalink(); ?>">
                  <?php if ( get_field( 'logo' ) ) : ?>
                    <img src="<?php the_field( 'logo' ); ?>" class="img-fluid d-block"/>
                  <?php else: ?>
                    <h3><?php the_title(); ?></h3>
                  <?php endif ?>
                  <button class="vermas">
                    <i class="fa fa-angle-right"></i>
                  </button>
                </a>
              </div>
            </article>
        </div> 
        <?php endwhile; ?>
      </div>
    </div>
  </section>
    <!-- /section -->
<?php } ?> 