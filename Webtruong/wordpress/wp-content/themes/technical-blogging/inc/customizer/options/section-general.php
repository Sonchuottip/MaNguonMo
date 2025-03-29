<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */


if ( ! function_exists( 'technical_blogging_customizer_general_setting_register' ) ) :
function technical_blogging_customizer_general_setting_register( $wp_customize ) {

    $wp_customize->add_section(
        'technical_blogging_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'technical-blogging' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'technical_blogging_label_general_settings_title', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );
    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_general_settings_title', 
        array(
            'label'       => esc_html__( 'Preloader Setting', 'technical-blogging' ),
            'section'     => 'technical_blogging_general_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_general_settings_title',
        ) 
    ));


    // Add an option to enable the preloader
    $wp_customize->add_setting( 
        'technical_blogging_enable_preloader', 
        array(
            'default'           => false,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_preloader', 
        array(
            'label'       => esc_html__( 'Show Preloader', 'technical-blogging' ),
            'section'     => 'technical_blogging_general_settings',
            'type'        => 'technical-blogging-toggle',
            'settings'    => 'technical_blogging_enable_preloader',
        ) 
    ));

    // Title label
    $wp_customize->add_setting( 
        'technical_blogging_scroll_top_settings', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_scroll_top_settings', 
        array(
            'label'       => esc_html__( 'Scroll Top Settings', 'technical-blogging' ),
            'section'     => 'technical_blogging_general_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_scroll_top_settings',
        ) 
    ));

    // Add an option to enable the scrolltop
    $wp_customize->add_setting( 
        'technical_blogging_enable_scrolltop', 
        array(
            'default'           => false,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_scrolltop', 
        array(
            'label'       => esc_html__( 'Show Scroll Top', 'technical-blogging' ),
            'section'     => 'technical_blogging_general_settings',
            'type'        => 'technical-blogging-toggle',
            'settings'    => 'technical_blogging_enable_scrolltop',
        ) 
    ));

    }
endif;

add_action( 'customize_register', 'technical_blogging_customizer_general_setting_register' );