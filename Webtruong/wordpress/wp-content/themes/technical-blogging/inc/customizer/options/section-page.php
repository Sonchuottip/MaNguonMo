<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */


if ( ! function_exists( 'technical_blogging_customizer_page_register' ) ) :
function technical_blogging_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'technical_blogging_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Page Settings', 'technical-blogging' )
        )
    );

    // Info label
     $wp_customize->add_setting( 
        'technical_blogging_label_page_title_hide_settings', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_page_title_hide_settings', 
        array(
            'label'       => esc_html__( 'Hide Page Title', 'technical-blogging' ),
            'section'     => 'technical_blogging_page_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_page_title_hide_settings',
        ) 
    ));  

    // Hide page title section
    $wp_customize->add_setting(
        'technical_blogging_enable_page_title',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'technical_blogging_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_page_title', 
        array(
            'settings'      => 'technical_blogging_enable_page_title',
            'section'       => 'technical_blogging_page_settings',
            'type'          => 'technical-blogging-toggle',
            'label'         => esc_html__( 'Show Page Title Section:', 'technical-blogging' ),
            'description'   => '',           
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'technical_blogging_label_page_title_bg_settings', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_page_title_bg_settings', 
        array(
            'label'       => esc_html__( 'Page Title Background', 'technical-blogging' ),
            'section'     => 'technical_blogging_page_settings',
            'type'        => 'title',
            'settings'    => 'technical_blogging_label_page_title_bg_settings',
            'active_callback' => 'technical_blogging_page_title_enable',
        ) 
    ));

    // Background selection
    $wp_customize->add_setting(
        'technical_blogging_page_bg_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'color',
            'sanitize_callback' => 'technical_blogging_sanitize_select'
        )
    );

    $wp_customize->add_control(
    	new Technical_Blogging_Text_Radio_Control( $wp_customize, 'technical_blogging_page_bg_radio',
        array(
            'settings'      => 'technical_blogging_page_bg_radio',
            'section'       => 'technical_blogging_page_settings',
            'type'          => 'radio',
            'label'         => esc_html__( 'Choose Page Title Background Color or Background Image:', 'technical-blogging' ),
            'description'   => esc_html__('This setting will change the background of the page title area.', 'technical-blogging'),
            'choices' => array(
                            'color' => esc_html__('Background Color','technical-blogging'),
                            'image' => esc_html__('Background Image','technical-blogging'),
                            ),
            'active_callback' => 'technical_blogging_page_title_enable',
        )
    ));

    // Background color
    $wp_customize->add_setting(
        'technical_blogging_page_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#e32988',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'technical_blogging_page_bg_color',
            array(
                'label'      => esc_html__( 'Select Background Color', 'technical-blogging' ),
                'description'   => esc_html__('This setting will add background color to the page title area if Background Color was selected above.', 'technical-blogging'),
                'section'    => 'technical_blogging_page_settings',
                'settings'   => 'technical_blogging_page_bg_color',
                'active_callback' => 'technical_blogging_page_title_color_enable',
            )
        )
    );
    
}
endif;

add_action( 'customize_register', 'technical_blogging_customizer_page_register' );