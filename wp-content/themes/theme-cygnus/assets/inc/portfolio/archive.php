 <?php 
  $args = array('post_type' => 'portfolio','posts_per_page' => 100, 'offset' => 8,'orderby' => 'menu_order','order'=>'ASC');
  $query = new WP_query ( $args );
  if ( $query->have_posts() ) { ?>
  <section id="startups">
    <div class="container">
      <div class="row">
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="col-12 col-lg-4">
          <article <?php post_class('startup'); ?>>
            <div class="startup-title">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
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