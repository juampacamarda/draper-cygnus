<section id="navigation">
  <!-- Previous and Next Post -->
  <?php if(is_single()) : ?>
  <!-- Para pantallas grandes -->
      <div class="navpost d-flex justify-content-between align-items-center" id="nextpreviouslinks">
        <?php if (get_previous_post_link()){ ?>
        <div class="prev-link">
            <i class="fa fa-angle-left"></i> <?php previous_post_link( '%link', '%title'); ?>
        </div>
        <?php } else {?>
          <div class="empty-link">
            
          </div>
        <?php }?>
          
        <div class=" d-none home-link">
            <a href="<?php bloginfo('url') ?>"><i class="fa fa-th" aria-hidden="true"></i></a>
        </div>
        <?php if (get_next_post_link()){ ?>
        <div class="next-link">
          <?php next_post_link( '%link', '%title' ); ?> <i class="fa fa-angle-right"></i> 
        </div>
        <?php } else {?>
          <div class="empty-link">
            
          </div>
        <?php }?>
        
      </div>
  <?php endif; ?>
  <!-- /Previous and Next Post -->
</section>