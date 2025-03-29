<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */

if ( ! function_exists( 'technical_blogging_customizer_featured_topics_register' ) ) :
function technical_blogging_customizer_featured_topics_register( $wp_customize ) {

    $wp_customize->add_section(
        'technical_blogging_featured_topics_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Featured Topics Settings', 'technical-blogging' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'technical_blogging_label_featured_topics_title', 
        array(
            'sanitize_callback' => 'technical_blogging_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_featured_topics_title', 
        array(
            'label'       => esc_html__( 'Featured Topics Settings', 'technical-blogging' ),
            'section'     => 'technical_blogging_featured_topics_settings',
            'type'        => 'technical-blogging-title',
            'settings'    => 'technical_blogging_label_featured_topics_title',
        ) 
    ));

    $wp_customize->add_setting(
        'technical_blogging_featured_topics_main_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_featured_topics_main_heading',
        array(
            'label'           => sprintf( esc_html__( 'Featured Main Head', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_featured_topics_settings',
            'settings'        => 'technical_blogging_featured_topics_main_heading' ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'technical_blogging_featured_section_bg_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'technical_blogging_sanitize_image',

        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'technical_blogging_featured_section_bg_image', 
            array(
                'label'           => sprintf( esc_html__( 'Section Background Image', 'technical-blogging' ), ),
                'settings'  => 'technical_blogging_featured_section_bg_image',
                'section'   => 'technical_blogging_featured_topics_settings'
            ) 
        )
    );

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting(
        'technical_blogging_feature_category',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_feature_category',
        array(
            'label'    => esc_html__( 'Select Post Category', 'technical-blogging' ),
            'section'  => 'technical_blogging_featured_topics_settings',
            'settings' => 'technical_blogging_feature_category',
            'type'     => 'select',
            'choices'  => $cat_post,
        )
    );

   $wp_customize->add_setting( 'technical_blogging_featured_topics_number', array(
        'default'           => 2, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'technical_blogging_featured_topics_number', array(
        'label'       => __( 'Number of Post to Display', 'technical-blogging' ),
        'section'     => 'technical_blogging_featured_topics_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 8,
        ),
    ));

    // right category

    $categories = get_categories();
    $cat_post2 = array();
    $cat_post2[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post2[$category->slug] = $category->name;
    }
    $wp_customize->add_setting(
        'technical_blogging_selected_category2',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_selected_category2',
        array(
            'label'    => esc_html__( 'Select Right Post Category', 'technical-blogging' ),
            'section'  => 'technical_blogging_featured_topics_settings',
            'settings' => 'technical_blogging_selected_category2',
            'type'     => 'select',
            'choices'  => $cat_post2,
        )
    );

   $wp_customize->add_setting( 'technical_blogging_featured_topics_number2', array(
        'default'           => 2, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'technical_blogging_featured_topics_number2', array(
        'label'       => __( 'Number of Post to Display In right', 'technical-blogging' ),
        'section'     => 'technical_blogging_featured_topics_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 8,
        ),
    ));

}
endif;

add_action( 'customize_register', 'technical_blogging_customizer_featured_topics_register' );