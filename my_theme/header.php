<!DOCTYPE html>
<html lang="de" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="site-header">
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'container'      => false
            ));
            ?>
        </nav>
    </header>

    <main class="site-content">