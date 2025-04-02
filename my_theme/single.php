<?php get_header(); ?>

<article class="single-post">
    <header class="post-header">
        <h1><?php the_title(); ?></h1>
        <div class="post-meta">
            <?php the_date(); ?> | <?php the_author(); ?>
        </div>
    </header>
    
    <?php get_template_part('includes/section', 'content'); ?>
    
    <footer class="post-footer">
        <?php the_tags('<div class="post-tags">', ' ', '</div>'); ?>
    </footer>
</article>

<?php get_footer(); ?>