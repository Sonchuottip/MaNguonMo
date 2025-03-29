<?php
/**
 * Technical Blogging Theme Customizer
 *
 * @package Technical Blogging
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'technical_blogging_customize_register' ) ) :
function technical_blogging_customize_register( $wp_customize ) {

    // Add custom controls.
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-title-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/text-radio/class-text-radio-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/slider/class-slider-control.php' );

    // Register the custom control type.
    $wp_customize->register_control_type( 'Technical_Blogging_Toggle_Control' );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'technical-blogging' );


    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'technical_blogging_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'technical_blogging_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    }

    // Display Site Title and Tagline
    $wp_customize->add_setting( 
        'technical_blogging_display_site_title_tagline', 
        array(
            'default'           => true,
            'type'              => 'theme_mod',
            'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_display_site_title_tagline', 
        array(
            'label'       => esc_html__( 'Display Site Title and Tagline', 'technical-blogging' ),
            'section'     => 'title_tagline',
            'type'        => 'technical-blogging-toggle',
            'settings'    => 'technical_blogging_display_site_title_tagline',
        ) 
    ));
    
}
endif;
add_action( 'customize_register', 'technical_blogging_customize_register' );

//general settings
get_template_part( 'inc/customizer/options/section-general' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//banner settings
get_template_part( 'inc/customizer/options/section-banner' );

//product settings
get_template_part( 'inc/customizer/options/section-featured-topic' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//page settings
get_template_part( 'inc/customizer/options/section-page' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//customizer helper
get_template_part( 'inc/customizer/customizer-helpers' );

//data sanitization
get_template_part( 'inc/customizer/data-sanitization' );

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'technical_blogging_enqueue_customizer_stylesheets' ) ) :
function technical_blogging_enqueue_customizer_stylesheets() {
    wp_register_style( 'technical-blogging-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css', array(), '1.0.9', 'all' );
    wp_enqueue_style( 'technical-blogging-customizer-css' );
}
endif;
add_action( 'customize_controls_print_styles', 'technical_blogging_enqueue_customizer_stylesheets' );