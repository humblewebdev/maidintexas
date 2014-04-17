<?php
/*
  Template Name: Home
 */                                                                                                                                                                                                     


    <?php get_header();?>
<div class="main-content-wrapper">
    <!-- Content Area start -->
         <div class="custom-widget-area">
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2 class="page-content-title"><?php the_title(); ?></h2> 
                        <?php the_content(__('(more...)')); ?> 

                    <?php endwhile;
            else:?> 
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
        </div>
    
     <?php 
        
     get_sidebar(); ?>
    
    <!-- Content Area End -->
    </div>
</div>
<!-- end of wrapper -->
    
<?php  get_footer();?>

