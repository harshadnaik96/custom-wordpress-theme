<?php

function theme_support(){
    //adds dynamic tag support  
    add_theme_support('title-tag');
    //adds logo dynamically
    add_theme_support('custom-logo');
    //adds post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_support');

//loads menu dynamically
function menus(){
    $locations = array(
        // menus are key value pairs key= location name & value being menu name
        'primary' => 'Desktop Primary Left Sidebar',
        'footer' => 'Footer Menu Items',
    );
    register_nav_menus($locations);
}
add_action('init', 'menus');

//injects styles dynamically
function register_styles(){
    wp_enqueue_style( 'style', get_stylesheet_uri(), array("bootstrap"));
    wp_enqueue_style( 'bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css");
    wp_enqueue_style( 'fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css");

}
add_action('wp_enqueue_scripts', 'register_styles');

//injects javascript dynamically
function register_scripts(){
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script("popper", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script("bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script("main", get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);

}
add_action('wp_enqueue_scripts', 'register_scripts');


function widget_areas(){
    register_sidebar(
        array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>'',
            'after_widget'=>'',
            'name'=>'Sidebar Area',
            'id'=>'sidebar-1',
            'description'=>'Sidebar Widget Area'
        )
    );
    register_sidebar(
        array(
            'before_title'=>'',
            'after_title'=>'',
            'before_widget'=>'',
            'after_widget'=>'',
            'name'=>'Footer Area',
            'id'=>'footer-1',
            'description'=>'Footer Widget Area'
        )
    );
}
add_action('widgets_init', 'widget_areas');

?> 
