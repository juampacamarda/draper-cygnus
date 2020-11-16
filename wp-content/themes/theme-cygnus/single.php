<?php get_header(); ?>

<main class="site-content">
    <!---->

    <div class="container">
      <?php if ( have_posts() ) : the_post(); ?>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6">
              <div class="headerpost">
                <div class="autor d-none">
                  <?php the_author(); ?>
                </div>
                <div class="title">
                  <h2 class="d-none d-lg-block"><?php the_title(); ?></h2>
                  <h3 class="d-block d-lg-none"><?php the_title(); ?></h3>
                </div>
                <div class="bajada">
                  <?php the_excerpt(); ?>
                </div>
                <!--contenido-->
                <div class="contenido elementos-post">
                  <?php the_content(); ?>
                  	<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
                      <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                      </div>  
                      
                    <?php endif; ?>
                </div>
                <div class="foooterpost">
                  <time datatime="<?php the_time('F j, Y'); ?>">
                    <?php the_date('F j, Y'); ?>
                  </time>
                  <div class="autor-share">
                    <div class="autor">
                      <h3><?php the_author_posts_link() ?></h3>
                    </div>
                    <div class="social">
                      <?php echo do_shortcode('[social]'); ?>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
      </div>
    <!-- navegacion -->
      <?php else : ?>
      <?php endif; ?>
      <div class="back-to-blog">
        <a href="" class="btn btn-theme btn-post"> < Back to Blog</a>
      </div>
      <?php get_template_part('assets/inc/news');?>

</main>
<?php get_footer(); ?>