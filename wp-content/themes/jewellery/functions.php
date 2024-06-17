<?php

require 'inc/acf.php';
require 'inc/helper.php';

require 'vendor/autoload.php';

if (class_exists('WooCommerce')) {
    require  'inc/woocommerce.php';
}

function theme_setup(){

    load_theme_textdomain('jewellery', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    function nav_menu_submenu_css_class($classes)
    {
        $classes[] = 'submenu_list';
        return $classes;
    }

    add_filter('nav_menu_submenu_css_class', 'nav_menu_submenu_css_class');

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );


    add_theme_support(
        'custom-logo',
        array(
            'height' => 40,
            'width' => 109,
            'flex-width' => true,
            'flex-height' => true,
        )
    );

    add_image_size( 'user_logo', 20, 20, true );
    add_image_size( 'blogpost_thumbnail', 75, 65, true );
    add_image_size( 'blogpost_middle', 345, 260, true );
    add_image_size( 'product_middle', 250, 270, true );
    add_image_size( 'product_thumbnail', 65, 65, true );

}

add_action('after_setup_theme', 'theme_setup');


require get_template_directory() . '/inc/customize.php';


function add_nav_menus() {

    register_nav_menus(
        array(
            'menu_header' => 'Menu Header',
            'menu_footer_1' => 'Menu Footer',
            'menu_footer_2' => 'Menu Footer Secondary'
        )
    );
}

add_action('init', 'add_nav_menus');

function theme_content_width(){

    $GLOBALS['content_width'] = apply_filters('theme_content_width', 1170);
}

add_action('after_setup_theme', 'theme_content_width', 0);

function theme_widgets_init(){

    register_sidebar(
        array(
            'name' => esc_html__('Footer Sidebar 1', 'jewellery'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'jewellery'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Footer Sidebar 2', 'jewellery'),
            'id' => 'sidebar-2',
            'description' => esc_html__('Add widgets here.', 'jewellery'),
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '',
            'after_title' => ''
        )
    );
}

add_action('widgets_init', 'theme_widgets_init');

function theme_scripts_and_styles()
{

    $uri = get_template_directory_uri();

    wp_enqueue_script('jquery');

    wp_enqueue_style('common-style', get_stylesheet_uri(), array(), '');

    wp_enqueue_style('common-style-libs', $uri . '/dist/css/libs-styles.css', "", time());
    wp_enqueue_style('common-style-main', $uri . '/dist/css/main.css', array('common-style-libs'), time());

    wp_enqueue_script('common-js-libs', $uri . '/dist/js/libs-scripts.min.js', '','');
    wp_enqueue_script('common-js', $uri . '/dist/js/scripts.js', array('common-js-libs', 'wp-api-request'), time());

    wp_localize_script('common-js', 'front_ajax_object',
        array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'post_ID' => get_the_ID()
        )
    );
}

add_action('wp_enqueue_scripts', 'theme_scripts_and_styles');


require get_template_directory() . '/inc/custom-header.php';

require get_template_directory() . '/inc/template-functions.php';

require get_template_directory() . '/ajax/add-to-cart.php';

function theme_excerpt() {

    if(get_post_type() == 'post') {

        $excerpt = get_the_excerpt();
        $limit = 145;

        if (strlen($excerpt) > $limit) {
            echo substr($excerpt, 0, $limit), '...';
        } else {
            echo $excerpt;
        }

    }
}

add_filter( 'excerpt_length', 'theme_excerpt_length' );
