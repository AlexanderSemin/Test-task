<footer class="footer">
    <div class="container">
        <div class="footer__inner">
                <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                    <div class="footer__col footer__caption">
                        <?php dynamic_sidebar( 'sidebar-1' ); ?>

                        <div class="footer__contacts">
                            <?php
                            if(get_theme_mod('contact_setting_address', '')  != ''){
                                $address = get_theme_mod('contact_setting_address', '')
                                ?>
                                <a href="#" class="location_icon"><?php echo $address; ?></a>
                                <?php
                            }

                            if(get_theme_mod('contact_setting_phone', '')  != ''){
                                $phone = get_theme_mod('contact_setting_phone', '');
                                $phone_tel_attr = preg_replace('/[^0-9.]+/', '', $phone);
                                ?>
                                <a href="<?php echo 'tel:+' . $phone_tel_attr ?>" class="phone_icon"><?php echo $phone; ?></a>
                                <?php
                            }

                            if(get_theme_mod('contact_setting_fax', '')  != ''){
                                $fax = get_theme_mod('contact_setting_fax', '');
                                $fax_tel_attr = preg_replace('/[^0-9.]+/', '', $fax);
                                ?>
                                <a href="<?php echo 'tel:+' . $fax_tel_attr ?>" class="fax_icon"><?php echo $fax; ?></a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                    <div class="footer__col footer__posts">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                    </div>
                <?php endif; ?>

                <div class="footer__col footer__nav">
                    <h3 class="footer__title">
                        <?php echo wp_get_nav_menu_name('menu_footer_1') ?>
                    </h3>
                    <?php echo theme_wp_nav_menu('menu_footer_1', 'footer-nav'); ?>
                </div>

                <div class="footer__col footer__nav">
                    <h3 class="footer__title">
                        <?php echo wp_get_nav_menu_name('menu_footer_2') ?>
                    </h3>
                    <?php echo theme_wp_nav_menu('menu_footer_2', 'footer-nav'); ?>
                </div>
        </div>
    </div>
</footer>

</div><!--.main_wrapper-->

<div class="main_overlay">
    <div class="theme_preloader">
        <span class="preloader_ico_1 animate_preloader_1"></span>
        <span class="preloader_ico_2 animate_preloader_2"></span>
        <span class="preloader_ico_3 animate_preloader_3"></span>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
