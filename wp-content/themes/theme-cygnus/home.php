<?php get_header(light); ?>

<main class="site-content">
    <!-- section portada-->
    <?php get_template_part('assets/inc/portfolio/archive-header');?>
    <!--menu dinamico-->
    <?php if ( is_nav_menu( 'menu-blog' ) ) { ?>
    <section id="blogmenu">
      <?php wp_nav_menu(array(
      'theme_location' => 'menu-blog',
      'depth'=> 1, // 1 = no dropdowns, 2 = with dropdowns.
      'container' =>'div',
      'container_class' => 'd-none d-lg-flex justify-content-center',
      'container_id' => 'MenuBlog',
      'menu_class' => 'navbar-nav mt-2 mt-lg-0',
      'fallback_cb'  => 'WP_Bootstrap_Navwalker::fallback',
      'walker' =>  new WP_Bootstrap_Navwalker(),
      ) ); ?>
      <div id="menumovile" class="dropdown d-block d-lg-none">
        <div class="container" style="position:relative;">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            All Categories
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php wp_nav_menu(array(
            'theme_location' => 'menu-blog',
            'depth'=> 1, // 1 = no dropdowns, 2 = with dropdowns.
            'container' =>'div',
            'container_class' => 'justify-content-center',
            'container_id' => 'MenuBlog',
            'menu_class' => 'navbar-nav',
            'fallback_cb'  => 'WP_Bootstrap_Navwalker::fallback',
            'walker' =>  new WP_Bootstrap_Navwalker(),
            ) ); ?>
          </div>
        </div>
        
      </div>
     
   
    </section>
    <?php }?>
    <!--menu dinamico-->

    <?php get_template_part('assets/inc/loop');?>
    <!-- News -->
    <?php get_template_part('assets/inc/news');?>
    
</main>
<?php get_footer(); ?>