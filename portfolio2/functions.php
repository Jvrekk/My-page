<?php 
/* dołączenie css i js */
function jS_script_enqueue() {
    //css
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.0.0-alpha.6', 'all');
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0.0', 'all');
    
    
    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script('customjs', get_template_directory_uri() . '/js/index.js', array(), '1.0.0', true);
	wp_enqueue_script('tetherjs', get_template_directory_uri() . '/js/tether.min.js', array(), '1.3.3', true);
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.0.0-beta', true);
    
        

}

add_action('wp_enqueue_scripts', 'jS_script_enqueue');

/* aktywacja menu */

function jS_theme_setup() {
    
    add_theme_support('menus');
    
    register_nav_menu('głowne', 'Głowne menu strony');
    register_nav_menu('podrzedne', 'Podrzędne menu strony');
}

add_filter( 'nav_menu_link_attributes', function($atts) {
        $atts['class'] = "nav-link";
        return $atts;
}, 100, 1 );

add_action('init', 'jS_theme_setup');

/* dodanie funkcji */

add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('post-formats' ,array('aside', 'image', 'video'));

/* Sidebar */


/* zalaczenie pliku walker */

require get_template_directory() . '/inc/walker.php';

// Funckcje header

function jS_remove_version(){
    return '';
}
add_filter('the_generator', 'jS_remove_version');
    