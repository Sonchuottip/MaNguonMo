<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */


if ( ! function_exists( 'technical_blogging_customizer_home_banner_register' ) ) :
function technical_blogging_customizer_home_banner_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'technical_blogging_home_banner_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Banner Settings', 'technical-blogging' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_banner_settings_title', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_banner_settings_title', 
		array(
		    'label'       => esc_html__( 'Banner Settings', 'technical-blogging' ),
		    'section'     => 'technical_blogging_home_banner_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_banner_settings_title',
		) 
	));

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
        'technical_blogging_top_post_category_1',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_top_post_category_1',
        array(
            'label'    => esc_html__( 'Select Post Category', 'technical-blogging' ),
            'section'  => 'technical_blogging_home_banner_settings',
            'settings' => 'technical_blogging_top_post_category_1',
            'type'     => 'select',
            'choices'  => $cat_post,
        )
    );

    $wp_customize->add_setting( 'technical_blogging_banner_number1', array(
        'default'           => 3, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'technical_blogging_banner_number1', array(
        'label'       => __( 'Number of Post to Display', 'technical-blogging' ),
        'section'     => 'technical_blogging_home_banner_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 8,
        ),
    ));

    // second category

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
        'technical_blogging_top_post_category_2',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_top_post_category_2',
        array(
            'label'    => esc_html__( 'Select Post Category', 'technical-blogging' ),
            'section'  => 'technical_blogging_home_banner_settings',
            'settings' => 'technical_blogging_top_post_category_2',
            'type'     => 'select',
            'choices'  => $cat_post,
        )
    );

     $wp_customize->add_setting( 'technical_blogging_banner_number2', array(
        'default'           => 3, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'technical_blogging_banner_number2', array(
        'label'       => __( 'Number of Post to Display', 'technical-blogging' ),
        'section'     => 'technical_blogging_home_banner_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 8,
        ),
    ));

    // third category


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
        'technical_blogging_top_post_category_3',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_top_post_category_3',
        array(
            'label'    => esc_html__( 'Select Post Category', 'technical-blogging' ),
            'section'  => 'technical_blogging_home_banner_settings',
            'settings' => 'technical_blogging_top_post_category_3',
            'type'     => 'select',
            'choices'  => $cat_post,
        )
    );

     $wp_customize->add_setting( 'technical_blogging_banner_number3', array(
        'default'           => 3, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'technical_blogging_banner_number3', array(
        'label'       => __( 'Number of Post to Display', 'technical-blogging' ),
        'section'     => 'technical_blogging_home_banner_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 8,
        ),
    ));

    $wp_customize->add_setting(
        'technical_blogging_banner_button_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_banner_button_text',
        array(
            'label'           => sprintf( esc_html__( 'Button Text', 'technical-blogging' ), ),
            'section'         => 'technical_blogging_home_banner_settings',
            'settings'        => 'technical_blogging_banner_button_text' ,
            'type'            => 'text',
        )
    );

}
endif;

add_action( 'customize_register', 'technical_blogging_customizer_home_banner_register' );