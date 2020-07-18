<?php 
/*Extra Options*/

        $wp_customize->add_section( 'prefer_extra_options', array(
            'priority'       => 20,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'Breadcrumb Settings', 'prefer' ),
            'panel'          => 'prefer_panel',
        ) );



        /*Breadcrumb Enable*/
        $wp_customize->add_setting( 'prefer_options[prefer-extra-breadcrumb]', array(
            'capability'        => 'edit_theme_options',
            'transport' => 'refresh',
            'default'           => $default['prefer-extra-breadcrumb'],
            'sanitize_callback' => 'prefer_sanitize_checkbox'
        ) );

        $wp_customize->add_control( 'prefer_options[prefer-extra-breadcrumb]', array(
            'label'     => __( 'Enable Breadcrumb', 'prefer' ),
            'description' => __( 'Breadcrumb will appear on all pages except home page. More settings will be on the premium version.', 'prefer' ),
            'section'   => 'prefer_extra_options',
            'settings'  => 'prefer_options[prefer-extra-breadcrumb]',
            'type'      => 'checkbox',
            'priority'  => 15,
        ) );