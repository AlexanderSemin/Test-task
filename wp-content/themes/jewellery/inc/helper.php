<?php

function theme_wp_nav_menu($name = '', $container_class = ''){

    $args = [
        'theme_location'  => $name,
        'container'       => '',
        'container_class' => '',
        'container_id'    => '',
        'menu_class'      => $container_class,
        'menu_id'         => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
    ];

    wp_nav_menu($args);
}

function img($img = ''){
    return get_template_directory_uri() . "/dist/images/" . $img;
}

function home(){
    return get_option("home");
}