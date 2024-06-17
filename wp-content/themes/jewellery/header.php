<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Marcellus&display=swap" rel="stylesheet">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'jewellery'); ?></a>

<div class="main_wrapper" id="primary">
    <div class="navbar_overlay"></div>

    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="navbar_toggler">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
                        <rect y="0.503906" width="30" height="3" rx="3.62071" fill="#fff"/>
                        <rect y="11.8828" width="30" height="3" rx="3.62071" fill="#fff"/>
                        <rect y="23.2617" width="30" height="3" rx="3.62071" fill="#fff"/>
                    </svg>
                </div>

                <a href="/" class="header__logo">
                    <img src="<?php echo get_custom_logo_url(); ?>" alt="logo">
                </a>

                <div class="header__nav">
                    <div class="header__nav_close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                            <rect width="20" height="2" rx="1.5" transform="matrix(0.70711 -0.707104 0.70711 0.707104 0 14.459)" fill="#fff"/>
                            <rect width="20" height="2" rx="1.5" transform="matrix(0.70711 0.707104 -0.70711 0.707104 2.12109 0.316406)" fill="#fff"/>
                        </svg>
                    </div>
                    <?php echo get_template_part('template-parts/header/navbar') ?>

                    <div class="header__registration">
                        <a href="#"><?php _e('Login', 'jewellery') ?></a> /
                        <a href="#"><?php _e('Register', 'jewellery') ?></a>
                    </div>


                    <form role="search" class="header__search-form" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
                        <input class="header__search-form_input" type="text" placeholder="<?php _e('Search', 'jewellery'); ?>" value="<?php echo get_search_query() ?>" name="s" id="s" />
                        <button class="header__search-form_button" type="submit" id="searchsubmit" value=""></button>
                        <div class="js-open_search"></div>
                    </form>

                </div>

                <?php echo get_template_part('template-parts/header/header_cart'); ?>

            </div>
        </div>
    </header>

