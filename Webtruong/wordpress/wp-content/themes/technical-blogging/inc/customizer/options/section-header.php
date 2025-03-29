<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */


if ( ! function_exists( 'technical_blogging_customizer_header_register' ) ) :
function technical_blogging_customizer_header_register( $wp_customize ) {

    $wp_customize->add_section(
        'technical_blogging_home_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'technical-blogging' )
        )
    );

    // topbar text


    // Title label
    $wp_customize->add_setting( 
        'technical_blogging_label_header_settings_title', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );
    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_header_settings_title', 
        array(
            'label'       => esc_html__( 'Tobar Detail', 'technical-blogging' ),
            'section'     => 'technical_blogging_home_header_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_header_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'technical_blogging_topbar_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_topbar_text',
        array(
            'label'           => sprintf( esc_html__( 'Topbar Trend Text', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_topbar_text' ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'technical_blogging_topbar_marquee_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_topbar_marquee_text',
        array(
            'label'           => sprintf( esc_html__( 'Topbar Trend Article Text', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_topbar_marquee_text' ,
            'type'            => 'text',
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'technical_blogging_label_social_meida_settings_title', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_social_meida_settings_title', 
        array(
            'label'       => esc_html__( 'Social Media Links', 'technical-blogging' ),
            'section'     => 'technical_blogging_home_header_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_social_meida_settings_title',
        ) 
    ));

    // Facebook Link
    $wp_customize->add_setting(
        'technical_blogging_social_media1_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_social_media1_heading',
        array(
            'label'           => sprintf( esc_html__( 'Facebook Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_social_media1_heading' ,
            'type'            => 'url',
        )
    );

    // Instagram Link
    $wp_customize->add_setting(
        'technical_blogging_social_media2_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_social_media2_heading',
        array(
            'label'           => sprintf( esc_html__( 'Instagram Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_social_media2_heading' ,
            'type'            => 'url',
        )
    );

    // Twitter Link
    $wp_customize->add_setting(
        'technical_blogging_social_media3_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_social_media3_heading',
        array(
            'label'           => sprintf( esc_html__( 'Twitter Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_social_media3_heading' ,
            'type'            => 'url',
        )
    );

    // Youtube Link
    $wp_customize->add_setting(
        'technical_blogging_social_media4_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_social_media4_heading',
        array(
            'label'           => sprintf( esc_html__( 'Youtube Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_social_media4_heading' ,
            'type'            => 'url',
        )
    );

    // Pinterest Link
    $wp_customize->add_setting(
        'technical_blogging_social_media5_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_social_media5_heading',
        array(
            'label'           => sprintf( esc_html__( 'Pinterest Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_social_media5_heading' ,
            'type'            => 'url',
        )
    );

    // Linkedin Link
    $wp_customize->add_setting(
        'technical_blogging_social_media6_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_social_media6_heading',
        array(
            'label'           => sprintf( esc_html__( 'Linkedin Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_social_media6_heading' ,
            'type'            => 'url',
        )
    );


    // Title label
    $wp_customize->add_setting( 
        'technical_blogging_label_header_settings_title', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_header_settings_title', 
        array(
            'label'       => esc_html__( 'Topbar Ads Box', 'technical-blogging' ),
            'section'     => 'technical_blogging_home_header_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_header_settings_title',
        ) 
    ));
    $technical_blogging_args = array('numberposts' => -1);
        $list = get_posts($technical_blogging_args);
        $i = 0;
        $post_dtl[]= __('Select','technical-blogging');
        foreach ($list as $key => $ads_post) {
            $post_dtl[$ads_post->ID]=$ads_post->post_title;
        }

        $wp_customize->add_setting('technical_blogging_ads_post_setting',array(
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control('technical_blogging_ads_post_setting',array(
            'type'    => 'select',
            'choices' => $post_dtl,
            'label' => __('Select post','technical-blogging'),
            'section' => 'technical_blogging_home_header_settings',
        ));

        $wp_customize->add_setting(
        'technical_blogging_header_subscribe_btn_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_header_subscribe_btn_link',
        array(
            'label'           => sprintf( esc_html__( 'Subscribe Button Link', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_header_settings',
            'settings'        => 'technical_blogging_header_subscribe_btn_link' ,
            'type'            => 'url',
        )
    );

      // Title label
    $wp_customize->add_setting( 
        'technical_blogging_label_header_search_settings_title', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_header_search_settings_title', 
        array(
            'label'       => esc_html__( 'Search Bar', 'technical-blogging' ),
            'section'     => 'technical_blogging_home_header_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_header_search_settings_title',
        ) 
    ));

    // Hide Search bar
    $wp_customize->add_setting(
        'technical_blogging_search_hide',
        array(
            'type' => 'theme_mod',
            'default'           => false,
            'sanitize_callback' => 'technical_blogging_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_search_hide', 
        array(
            'settings'      => 'technical_blogging_search_hide',
            'section'       => 'technical_blogging_home_header_settings',
            'type'          => 'technical-blogging-toggle',
            'label'         => esc_html__( 'Show\Hide Search', 'technical-blogging' ),
            'description'   => '',           
        )
    ));
    
}
endif;

add_action( 'customize_register', 'technical_blogging_customizer_header_register' );