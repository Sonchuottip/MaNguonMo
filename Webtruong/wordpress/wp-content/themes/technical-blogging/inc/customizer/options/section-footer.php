<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */


if ( ! function_exists( 'technical_blogging_customizer_footer_register' ) ) :
function technical_blogging_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'technical_blogging_footer_settings',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'technical-blogging' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'technical-blogging' ),
		    'section'     => 'technical_blogging_footer_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'technical_blogging_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'technical_blogging_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'technical_blogging_footer_copyright_text',
        array(
            'settings'      => 'technical_blogging_footer_copyright_text',
            'section'       => 'technical_blogging_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'technical-blogging' )
        )
    );
}
endif;

add_action( 'customize_register', 'technical_blogging_customizer_footer_register' );