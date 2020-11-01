<?php if ( have_posts('posts') ) : ?>
  <div class="contenido mt-4">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php if ($wp_query->current_post % 2 == 0): ?>
          <article <?php post_class('impar'); ?>>
            <div class="row">
              <div class="col-12 col-lg-5 img-post">
                <?php if ( has_post_thumbnail() ) { ?>
                  <div class="ficha-thumbnail" style = "background-position: center; background-image: url(<?php echo get_the_post_thumbnail_url($post_id); ?>); background-size: cover;">
                    <div class="hover">
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-blanco.png" class="img-fluid d-block">
                        <h5>See more</h5>
                      </a>
                    </div>
                  </div>

                <?php } ?>
              </div><!--fin imgdestacada-->
              <div class="data-post col-12 col-md-7">
                <?php the_category(); ?>
                <time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-theme">See more</a>
              </div>
            </div><!--finrowarticle-->
          </article>
        <?php else: ?>
          <article <?php post_class('par'); ?>>
            <div class="row">
              <div class="data-post col-12 col-md-7">
                <?php the_category(); ?>
                <time datatime="<?php the_time('Y-m-j'); ?>"><?php the_time('j F, Y'); ?></time>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
                <a href="<?php the_permalink(); ?>" class="btn btn-theme">See more</a>
              </div>
              <div class="col-12 col-lg-5 img-post">
                <?php if ( has_post_thumbnail() ) { ?>
                  <div class="ficha-thumbnail" style = "background-position: center; background-image: url(<?php echo get_the_post_thumbnail_url($post_id); ?>); background-size: cover;">
                    <div class="hover">
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-blanco.png" class="img-fluid d-block">
                        <h5>See more</h5>
                      </a>
                    </div>
                  </div>
                <?php } ?>
              </div><!--fin imgdestacada-->
            </div><!--finrowarticle-->
          </article>
        <?php endif ?>
        <?php endwhile; ?>
      <?php else : ?>
      <p><?php _e('Ups!,The posts are gone...'); ?></p>
<?php endif; ?>
      <div id="navigation" class="posts">
        <span class="prev-link"><?php next_posts_link('<i class="fa fa-angle-left"></i> Previous Posts'); ?></span>
        <span class="next-link"><?php previous_posts_link('Next Posts <i class="fa fa-angle-right"></i>'); ?></span>
      </div>
    </div>
  </div>