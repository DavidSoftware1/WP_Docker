<?php wp_head();  ?>
<div class="container">
    <h1><?php the_title();?></h1>
    
    <?php get_template_part('includes/section','content'); ?>

    

</div>

<?php wp_footer();  ?>