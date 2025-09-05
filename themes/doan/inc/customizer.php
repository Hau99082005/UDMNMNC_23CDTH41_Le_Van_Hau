<?php
/**
 * Customizer additions
 *
 * @package dulichvietnhat
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dulichvietnhat_customize_register($wp_customize) {
    // Remove default sections
    $wp_customize->remove_section('colors');
    $wp_customize->remove_section('header_image');
    $wp_customize->remove_section('background_image');
    $wp_customize->remove_section('static_front_page');
    $wp_customize->remove_section('custom_css');

    // Add Theme Options Panel
    $wp_customize->add_panel(
        'theme_options',
        array(
            'title'       => __('Theme Options', 'dulichvietnhat'),
            'description' => __('Theme specific options', 'dulichvietnhat'),
            'priority'    => 30,
        )
    );

    // Header Section
    $wp_customize->add_section(
        'header_section',
        array(
            'title'    => __('Header Settings', 'dulichvietnhat'),
            'priority' => 10,
            'panel'    => 'theme_options',
        )
    );

    // Header Contact Info
    $wp_customize->add_setting(
        'header_phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'header_phone',
        array(
            'label'   => __('Phone Number', 'dulichvietnhat'),
            'section' => 'header_section',
            'type'    => 'text',
        )
    );

    $wp_customize->add_setting(
        'header_email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
        )
    );

    $wp_customize->add_control(
        'header_email',
        array(
            'label'   => __('Email Address', 'dulichvietnhat'),
            'section' => 'header_section',
            'type'    => 'email',
        )
    );
}
add_action('customize_register', 'dulichvietnhat_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dulichvietnhat_customize_preview_js() {
    wp_enqueue_script(
        'dulichvietnhat-customizer',
        get_template_directory_uri() . '/assets/js/customizer.js',
        array('customize-preview'),
        _S_VERSION,
        true
    );
}
add_action('customize_preview_init', 'dulichvietnhat_customize_preview_js');
