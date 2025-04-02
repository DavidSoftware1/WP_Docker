<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<main class="container mt-5">
    <article <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="display-4 mb-4"><?php the_title(); ?></h1>
        </header>
        
        <div class="entry-content">
            <?php
            if (has_post_thumbnail()) :
                echo '<div class="post-thumbnail mb-4">';
                the_post_thumbnail('full', ['class' => 'img-fluid rounded']);
                echo '</div>';
            endif;
            
            get_template_part('includes/section', 'content');
            ?>
        </div>
    </article>
</main>

<?php
get_footer();