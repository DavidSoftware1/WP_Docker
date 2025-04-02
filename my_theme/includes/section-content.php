<?php
/**
 * The main content template part
 */
?>
<div class="content-wrapper">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
            
            // Pagination for multi-page posts
            wp_link_pages([
                'before'      => '<nav class="page-links"><span class="page-links-title">' . esc_html__('Seiten:', 'my_theme') . '</span>',
                'after'       => '</nav>',
                'link_before' => '<span class="page-number">',
                'link_after'  => '</span>',
            ]);
            
        endwhile;
    else :
        get_template_part('includes/section', 'empty');
    endif;
    ?>
</div>