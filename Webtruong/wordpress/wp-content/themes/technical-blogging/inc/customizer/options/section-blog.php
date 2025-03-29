<?php
/**
 * Theme Customizer Controls
 *
 * @package Technical Blogging
 */


if ( ! function_exists( 'technical_blogging_customizer_blog_register' ) ) :
function technical_blogging_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'technical_blogging_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'technical-blogging' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'technical_blogging_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'technical-blogging' ),
            'panel'          => 'technical_blogging_blog_settings_panel',
        )
    ); 


	// Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'technical-blogging' ),
		    'section'     => 'technical_blogging_posts_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'technical_blogging_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'technical-blogging' ),
		    'section'     => 'technical_blogging_posts_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'technical_blogging_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'technical-blogging' ),
		    'section'     => 'technical_blogging_posts_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'technical_blogging_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'technical-blogging' ),
		    'section'     => 'technical_blogging_posts_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_posts_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'technical-blogging' ),
		    'section'     => 'technical_blogging_posts_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'technical_blogging_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'technical_blogging_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Technical_Blogging_Radio_Image_Control( $wp_customize,'technical_blogging_blog_sidebar_layout',
            array(
                'settings'		=> 'technical_blogging_blog_sidebar_layout',
                'section'		=> 'technical_blogging_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'technical-blogging' ),
                'choices'		=> array(
                    'right'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'three_colm'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/c3.png',
                    'four_colm'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/c4.png',
                    'grid_layout'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/c5.png',
                    'grid_left_sidebar'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/c6.png',
                    'grid_right_sidebar'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/c7.png',
                    'no' 	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'technical-blogging' ),
		    'section'     => 'technical_blogging_posts_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'technical_blogging_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 30,
            'sanitize_callback' => 'technical_blogging_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_posts_excerpt_length',
        array(
            'settings'      => 'technical_blogging_posts_excerpt_length',
            'section'       => 'technical_blogging_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'technical-blogging' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'technical_blogging_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'technical-blogging' ),
            'sanitize_callback' => 'technical_blogging_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_posts_readmore_text',
        array(
            'settings'      => 'technical_blogging_posts_readmore_text',
            'section'       => 'technical_blogging_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'technical-blogging' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'technical_blogging_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'technical-blogging' ),
            'panel'          => 'technical_blogging_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'technical_blogging_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'technical_blogging_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'technical-blogging' ),
            'sanitize_callback' => 'technical_blogging_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_single_post_category_text',
        array(
            'settings'      => 'technical_blogging_single_post_category_text',
            'section'       => 'technical_blogging_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'technical-blogging' ),
        )
    );

	// Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'technical_blogging_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'technical_blogging_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'technical_blogging_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'technical_blogging_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'technical_blogging_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Toggle_Control( $wp_customize, 'technical_blogging_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-toggle',
		    'settings'    => 'technical_blogging_enable_single_post_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_single_pos_nav_show', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_single_pos_nav_show', 
		array(
		    'label'       => esc_html__( 'Post Navigation', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_single_pos_nav_show',
		) 
	));

    // add next article textbox
    $wp_customize->add_setting(
        'technical_blogging_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'technical-blogging' ),
            'sanitize_callback' => 'technical_blogging_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_single_post_next_article_text',
        array(
            'settings'      => 'technical_blogging_single_post_next_article_text',
            'section'       => 'technical_blogging_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'technical-blogging' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'technical-blogging' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'technical_blogging_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'technical-blogging' ),
            'sanitize_callback' => 'technical_blogging_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'technical_blogging_single_post_previous_article_text',
        array(
            'settings'      => 'technical_blogging_single_post_previous_article_text',
            'section'       => 'technical_blogging_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'technical-blogging' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'technical-blogging' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'technical_blogging_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'technical_blogging_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Technical_Blogging_Title_Info_Control( $wp_customize, 'technical_blogging_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'technical-blogging' ),
		    'section'     => 'technical_blogging_single_post_settings',
		    'type'        => 'technical-blogging-title',
		    'settings'    => 'technical_blogging_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'technical_blogging_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'technical_blogging_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Technical_Blogging_Radio_Image_Control( $wp_customize,'technical_blogging_blog_single_sidebar_layout',
            array(
                'settings'		=> 'technical_blogging_blog_single_sidebar_layout',
                'section'		=> 'technical_blogging_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'technical-blogging' ),
                'choices'		=> array(
                    'right'	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => TECHNICAL_BLOGGING_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );
}
endif;

add_action( 'customize_register', 'technical_blogging_customizer_blog_register' );