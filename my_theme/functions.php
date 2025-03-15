<?php 

function load_css() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 
        array(), false, 'all');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js() {
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 
        array('jquery'), false, true); // Corrected to use wp_enqueue_script
}    
add_action('wp_enqueue_scripts', 'load_js');

?>