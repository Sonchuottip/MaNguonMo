<?php
/**
 * Technical Blogging functions and definitions.
 *
 * @package Technical Blogging
 */

/**
 *  Defining Constants
 */

// Core Constants
define('TECHNICAL_BLOGGING_REQUIRED_PHP_VERSION', '5.6' );
define('TECHNICAL_BLOGGING_DIR_PATH', get_template_directory());
define('TECHNICAL_BLOGGING_DIR_URI', get_template_directory_uri());
define('TECHNICAL_BLOGGING_AUT','https://www.legacytheme.net/products/free-blog-wordpress-theme/');

if ( ! function_exists( 'technical_blogging_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function technical_blogging_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    // support alig-wide
    add_theme_support( 'align-wide' );

    add_theme_support( "wp-block-styles" );

    load_theme_textdomain( 'technical-blogging', get_template_directory() . '/languages' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'technical-blogging' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(      
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    // Gallery post format
    add_theme_support( 'post-formats', array( 'gallery' ));

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'technical_blogging_setup' );

// custom header
add_theme_support('custom-header', array(
        'width'                  => 1920, 
        'height'                 => 400,  
        'flex-height'            => true,
        'flex-width'             => true,
        'header-text'            => true, // Enable or disable header text
        'default-text-color'     => '000000', // Default header text color
        'wp-head-callback'       => 'technical_blogging_header_style',
    ) );

// custom-background
add_theme_support( 'custom-background', array(
      'default-color' => 'ffffff',
    ));

// Style the header
function technical_blogging_header_style() {
    $technical_blogging_header_image = get_header_image();    
    $technical_blogging_header_text_color = get_header_textcolor();
   
     if (get_theme_support('custom-header', 'default-text-color') !== $technical_blogging_header_text_color || !empty($technical_blogging_header_image)) {
            ?>
        <style type="text/css" id="entr-header-css">
            <?php
            // Has a Custom Header been added?
            if (!empty($technical_blogging_header_image)) :
                ?>
                 #custom-header {
                    background-image: url(<?php header_image(); ?>);
                    background-repeat: no-repeat;
                    background-position: 50% 50%;
                    -webkit-background-size: cover;
                    -moz-background-size:    cover;
                    -o-background-size:      cover;
                    background-size:         cover;
                }
            <?php endif; ?> 
            <?php
                if ('blank' === $technical_blogging_header_text_color) :
                ?>
                    .site-title a, .site-description {
                        color: #<?php echo esc_attr( $technical_blogging_header_text_color ); ?>;
                    }
                <?php elseif ('' !== $technical_blogging_header_text_color) : ?>
                    .site-title a,.site-description {
                        color: #<?php echo esc_attr($technical_blogging_header_text_color); ?>;
                    }            
                <?php endif; ?>
        </style>
    <?php
        }
    }

// site-title-checkbox
// Remove "Display Site Title and Tagline" checkbox from Customizer
function technical_blogging_remove_header_text_display_checkbox( $wp_customize ) {
    $wp_customize->remove_control( 'display_header_text' ); // Removes the checkbox
}
add_action( 'customize_register', 'technical_blogging_remove_header_text_display_checkbox', 11 );

/**
* Custom logo
*/
function technical_blogging_logo_setup(){
    add_theme_support('custom-logo', array(
        'height' => 65,
        'width' => 350,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'technical_blogging_logo_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function technical_blogging_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'technical_blogging_content_width', 640 );
}
add_action( 'after_setup_theme', 'technical_blogging_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function technical_blogging_widgets_init() {
	//Footer widget columns
    $technical_blogging_widget_num = absint(get_theme_mod( 'technical_blogging_footer_widgets', '4' ));
    for ( $i=1; $i <= $technical_blogging_widget_num; $i++ ) :
        register_sidebar( array(
            'name'          => esc_html__( 'Footer Column', 'technical-blogging' ) . $i,
            'id'            => 'footer-' . $i,
            'description'   => '',
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title" itemprop="name">',
            'after_title'   => '</h4>',
        ) );
    endfor;

    register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'technical-blogging' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'technical-blogging' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 2', 'technical-blogging' ),
        'id'            => 'sidebar-2',
        'description'   => esc_html__( 'Add widgets here.', 'technical-blogging' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar 3', 'technical-blogging' ),
        'id'            => 'sidebar-3',
        'description'   => esc_html__( 'Add widgets here.', 'technical-blogging' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'technical_blogging_widgets_init' );

/** 
* Excerpt More
*/
function technical_blogging_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
    return '&hellip;';
}
add_filter('excerpt_more', 'technical_blogging_excerpt_more');


/** 
* Custom excerpt length.
*/
function technical_blogging_excerpt_length() {
	$length= intval(get_theme_mod('technical_blogging_posts_excerpt_length',30));
    return $length;
}
add_filter('excerpt_length', 'technical_blogging_excerpt_length');

/*
script goes here
*/
function technical_blogging_scripts() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.3.3');
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/css/bootstrap-icons.css', array(), '5.3.3');
    wp_enqueue_style( 'technical-blogging-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get('Version'));
    wp_style_add_data('technical-blogging-style', 'rtl', 'replace');
	wp_enqueue_style( 'm-customscrollbar', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css', array(), '3.1.5');    
    wp_enqueue_style( 'poppins-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), '1.0');

    // Block stylesheet.
    wp_enqueue_style( 'technical-blogging-block-style', get_theme_file_uri( '/css/blocks-styles.css' ), array( 'technical-blogging-style' ), '1.0' );

    wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/css/owl.carousel' . '.css', array(), '2.3.4' );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true );
	
	wp_enqueue_script( 'resize-sensor', get_template_directory_uri() . '/js/ResizeSensor.js',array(),'1.0.0', true );
	wp_enqueue_script( 'm-customscrollbar-js', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.js',array(),'3.1.5', true );	
    
	wp_enqueue_script( 'html5shiv',get_template_directory_uri().'/js/html5shiv.js',array(), '3.7.3');
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'respond', get_template_directory_uri().'/js/respond.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', array(), '5.3.3', true );

    wp_enqueue_script( 'technical-blogging-main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'customize-preview'), '1.0', true );
    wp_enqueue_script( 'owl-carouselscript', get_template_directory_uri() . '/js/owl.carousel' . '.js', array( 'jquery' ), '2.3.4', true );

add_action( 'customize_preview_init', 'my_customizer_live_preview' );

    
}
add_action( 'wp_enqueue_scripts', 'technical_blogging_scripts' );


/**
* Custom search form
*/
function technical_blogging_search_form( $form ) {
    $form = '<form method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
    <div class="search">
      <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="'. esc_attr__( 'Search here','technical-blogging' ) .'">
      <label for="searchsubmit" class="search-icon"><i class="bi bi-search"></i></label>
      <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search','technical-blogging' ) .'" />
    </div>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'technical_blogging_search_form', 100 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function technical_blogging_pingback_header() {
    if ( is_singular() && pings_open() ) {
       printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'technical_blogging_pingback_header' );

// Add WooCommerce support to the theme
function technical_blogging_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'technical_blogging_add_woocommerce_support' );

// Change the number of product columns in WooCommerce shop page
function technical_blogging_change_woocommerce_shop_columns( $columns ) {
    $columns = 3; // Change this number to your desired column count (e.g., 2, 3, 4, etc.)
    return $columns;
}
add_filter( 'loop_shop_columns', 'technical_blogging_change_woocommerce_shop_columns', 999 );

function technical_blogging_custom_woocommerce_cart_icon() {
    
    if ( class_exists( 'WooCommerce' ) && WC()->cart ) {
        
        $technical_blogging_cart_count = WC()->cart->get_cart_contents_count();
        $technical_blogging_cart_url = wc_get_cart_url();
        ?>
        
        <span class="cart-icon-wrapper">
            <a class="cart-contents" href="<?php echo esc_url($technical_blogging_cart_url); ?>">
                <i class="bi bi-bag"></i>
                <?php if ($technical_blogging_cart_count > 0) { ?>
                    <span class="cart-count"><?php echo esc_html($technical_blogging_cart_count); ?></span>
                <?php } ?>
            </a>
        </span>
        
        <?php
    }
}

add_filter( 'woocommerce_add_to_cart_fragments', 'technical_blogging_custom_woocommerce_cart_icon_fragments' );

function technical_blogging_custom_woocommerce_cart_icon_fragments( $fragments ) {
    
    if ( class_exists( 'WooCommerce' ) ) {
        ob_start();
        technical_blogging_custom_woocommerce_cart_icon();
        $fragments['div.cart-icon-wrapper'] = ob_get_clean();
    }
    return $fragments;
}

/**
 * Customizer additions.
 */
require get_parent_theme_file_path() . '/inc/customizer/customizer.php';

/**
 * Template functions
 */
require get_parent_theme_file_path() . '/inc/template-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-tags.php';

/**
 * Custom template hooks for this theme.
 */
require get_parent_theme_file_path() . '/inc/template-hooks.php';

/**
 * Extra classes for this theme.
 */
require get_parent_theme_file_path() . '/inc/extras.php';

 /**getstart*/
require get_template_directory() . '/inc/technical-blogging-get-theme-info.php';

if ( ! function_exists( 'technical_blogging_admin_scripts' ) ) :
    function technical_blogging_admin_scripts($hook) {
        wp_enqueue_style( 'technical-blogging-get-theme-info-css', get_template_directory_uri() . '/css/technical-blogging-get-theme-info.css', false ); 
    }
endif;
add_action( 'admin_enqueue_scripts', 'technical_blogging_admin_scripts' );
/**
 * Upgrade to Pro
 */
require_once( trailingslashit( get_template_directory() ) . 'technical-blogging-pro/class-customize.php' );