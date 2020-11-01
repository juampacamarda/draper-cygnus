<?php get_header(light); ?>

<main class="site-content">
    <!-- section portada-->
    <?php get_template_part('assets/inc/portfolio/archive-header');?>
    
    <?php get_template_part('assets/inc/loop');?>
    <!-- News -->
    <?php get_template_part('assets/inc/news');?>
    
</main>
<?php get_footer(); ?>