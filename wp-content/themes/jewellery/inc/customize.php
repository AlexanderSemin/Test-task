<?php

function customize_register_action( $wp_customize ) {

    $wp_customize->add_panel( 'contact_panel', array(
        'title' => 'Contacts',
        'capability' => 'edit_theme_options',
        'description' => 'test desc',
        'priority' => 30
    ) );

    // Section Phone
    $wp_customize->add_section( 'contact_section_phone' , array(
        'title' => 'Phone',
        'priority' => 130,
        'panel' => 'contact_panel'
    ) );

    $wp_customize->add_setting('contact_setting_phone', array(
        'default' => 'Phone: (064) 332-1233',
    ));

    $wp_customize->add_control(
        'contact_section_control_phone',
        array(
            'label'   => 'Phone',
            'type'    => 'text',
            'section' => 'contact_section_phone',
            'settings' => 'contact_setting_phone'
        )
    );

    // Section FAX
    $wp_customize->add_section( 'contact_section_fax' , array(
        'title' => 'Fax',
        'priority' => 140,
        'panel' => 'contact_panel'
    ) );

    $wp_customize->add_setting('contact_setting_fax', array(
        'default' => 'Fax: (099) 453-1357'
    ));

    $wp_customize->add_control(
        'contact_section_control_fax',
        array(
            'label'   => 'Fax',
            'type'    => 'text',
            'section' => 'contact_section_fax',
            'settings' => 'contact_setting_fax'
        )
    );

    // Section Address
    $wp_customize->add_section( 'contact_section_address' , array(
        'title' => 'Address',
        'priority' => 120,
        'panel' => 'contact_panel'
    ) );

    $wp_customize->add_setting('contact_setting_address', array(
        'default' => '451 Wall Street, UK, London'
    ));

    $wp_customize->add_control(
        'contact_section_control_address',
        array(
            'label'   => 'Address',
            'type'    => 'text',
            'section' => 'contact_section_address',
            'settings' => 'contact_setting_address'
        )
    );
}
add_action( 'customize_register', 'customize_register_action' );
