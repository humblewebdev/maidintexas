<?php
/*
  Template Name: Full Width
 */
?>
    <?php get_header();?>
<div class="main-content-wrapper">
    <!-- Content Area start -->
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h2 class="page-content-title"><?php the_title(); ?></h2> 
                        <?php the_content(__('(more...)')); ?> 

                    <?php endwhile;
                else:
                    ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
 
    
    <!-- Content Area End -->
    </div>
</div>
<!-- end of wrapper -->
    
<?php  get_footer();?>


