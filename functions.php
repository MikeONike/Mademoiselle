<?php

// INCLUS FILES

function mademoiselle_include_style() {
    wp_enqueue_style( 'Slick',  get_template_directory_uri().'/frontend/scss/slick.css', array());
    wp_enqueue_style( 'Slick Theme',  get_template_directory_uri().'/frontend/scss/slick-theme.css', array('Slick'));
    wp_enqueue_style( 'Theme',  get_template_directory_uri().'/frontend/scss/theme.css', array(), '1.0');
}

add_action( 'wp_enqueue_scripts', 'mademoiselle_include_style' );


function mademoiselle_include_scripts(){
    
    wp_enqueue_script('jQuery', get_template_directory_uri().'/frontend/JS/jQuery.js', array(), '3.4.1', true);
    wp_enqueue_script('Slick JS', get_template_directory_uri().'/frontend/JS/slick.js', array('jQuery'), '1.8.0', true);
    wp_enqueue_script('Scrollreveal', get_template_directory_uri().'/frontend/JS/scrollreveal.js', array('jQuery'), '4.0.6', true);
    wp_enqueue_script('Script', get_template_directory_uri().'/frontend/JS/script.js', array('jQuery'), '1.0', true);
    wp_enqueue_script('FontAwesome', 'https://kit.fontawesome.com/1271c8c1a6.js' , array(), true);
    wp_enqueue_script('Validate', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js' , array('jQuery'), true);
}

add_action('wp_enqueue_scripts', 'mademoiselle_include_scripts');


function mademoiselle_support(){
   // Title tag support
    add_theme_support( 'title-tag' );
    
    // Custom Logo support
    add_theme_support('custom-logo', array(
        'height'=> 25,
        'width'=> 196,
        'flex-width'=> false,
        'flex-height'=> false
    ));

    //featured image support
    add_theme_support( 'post-thumbnails' );

    // add custom image thumbnail size
    add_image_size('blog-list', 377, 251, true);
    add_image_size('team-list', 503, 469, true);
    add_image_size('single-team-list', 500, 500, true);
    add_image_size('service-list', 590, 467, true);
}
add_action('after_setup_theme', 'mademoiselle_support');


function mademoiselle_menus(){
    
    register_nav_menus(array(
        'main-menu'=>'Main Menu',
        'social'=>'Social Menu'
    ));
    
}
add_action('init', 'mademoiselle_menus');

////////////////////////////////////////
// Remove the p tag around image
////////////////////////////////////////
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

function mademoiselle_init_sidebar() {
    register_sidebar(array(
        'id' => 'sidebar_01',
        'name' => __( 'Primary Sidebar' ),
        'description'   => __( 'The Primary Sidebar on the website.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}

add_action('widgets_init', 'mademoiselle_init_sidebar');

require get_template_directory() . '/inc/options.php';
require get_template_directory() . '/inc/widgets.php';