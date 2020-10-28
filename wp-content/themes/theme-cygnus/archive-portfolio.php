<?php get_header(light); ?>

<main class="site-content">
    <!-- section portada-->
    
    <?php get_template_part('assets/inc/portfolio/archive-header');?>
    <!-- section destacados-->
    <?php get_template_part('assets/inc/portfolio/archive-destacados');?>
    <!-- section resto de entradas-->
    <?php get_template_part('assets/inc/portfolio/archive');?>
    <!-- News -->
    <?php get_template_part('assets/inc/news');?>
    
</main>
<?php get_footer(form); ?>