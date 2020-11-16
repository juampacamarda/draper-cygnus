 <?php 
  $args = array('post_type' => 'portfolio','posts_per_page' => -1,'category_name' =>'links','orderby' => 'menu_order','order'=>'ASC');
  $query = new WP_query ( $args );
  if ( $query->have_posts() ) { ?>
  <section id="startups">
    <div class="container">
      <div class="row">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-12 col-lg-4">
          <article <?php post_class('startup'); ?>>
            <div class="startup-title">
              <a href="<?php the_field( 'enlace' ); ?>" target="_blank">
                <span class="mr-auto"><?php the_title(); ?></span>
                <?php if ( get_field( 'exit-logo' ) == 1 ) : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/exit-link.svg" alt="" class="mr-2 img-fluid">
                <?php endif; ?>
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