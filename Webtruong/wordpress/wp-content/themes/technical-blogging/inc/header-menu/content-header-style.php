<?php
/**
 * Template part for displaying header menu
 *
 * @package Technical Blogging
 */

?>
<?php
    $technical_blogging_page_val= is_front_page() ? 'home':'page' ;

?>

<header id="<?php echo esc_attr($technical_blogging_page_val);?>-inner" class="elementer-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('technical_blogging_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('skip to content','technical-blogging'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('skip to content','technical-blogging');?></a> <?php
    }
    ?>
    <div id="header-main" class="header-wrapper">
        <div id="topbar">
            <div class="container">
                <div class="row py-3">
                    <div class="col-lg-8 col-md-9 col-12 align-self-center">
                       <div class="topbar-text text-lg-start text-md-start text-center">
                           <?php if(get_theme_mod('technical_blogging_topbar_text') != '' ||get_theme_mod('technical_blogging_topbar_marquee_text') != ''){ ?>
                                <p class="tobr-txt mb-0"><?php echo esc_html(get_theme_mod('technical_blogging_topbar_text','')); ?><span class="article-txt ms-2 ps-2"><marquee class="d-table-cell"><?php echo esc_html(get_theme_mod('technical_blogging_topbar_marquee_text','')); ?></marquee></span></p>
                            <?php }?>
                       </div> 
                    </div>
                    <div class="col-lg-4 col-md-3 col-12 align-self-center text-lg-end text-md-end text-center">
                        <div class="topbar-date">
                            <p class="tbr-date mb-0"><i class="bi bi-calendar3 me-2"></i><?php echo date('F j, Y');?></p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div id="topbar2">
            <div class="container">
                <div class="row py-3">
                    <div class="col-lg-5 col-md-3 col-12 align-self-center text-center text-lg-start text-md-start ri8-logo">
                        <div class="logo <?php echo (has_custom_logo() ? 'has-logo' : 'no-logo'); ?>" itemscope itemtype="https://schema.org/Organization">
                            <?php 
                                if (has_custom_logo()) :
                                    technical_blogging_custom_logo();
                                endif;                                          
                            ?>
                            <?php 
                                if ( get_theme_mod( 'technical_blogging_enable_logo_stickyheader', false )) :
                                    $technical_blogging_alt_logo=esc_url(get_theme_mod( 'technical_blogging_logo_stickyheader' ));
                                    if(!empty($technical_blogging_alt_logo)) :
                                        ?>
                                            <a id="logo-alt" class="logo-alt" href="<?php echo esc_url(home_url( '/' )); ?>"><img src="<?php echo esc_url( get_theme_mod( 'technical_blogging_logo_stickyheader' ) ); ?>" alt="<?php esc_attr_e( 'logo', 'technical-blogging' ); ?>"></a>
                                        <?php
                                    endif;
                                endif; ?>
                            <?php
                                $technical_blogging_show_title   = ( true === get_theme_mod( 'technical_blogging_display_site_title_tagline', true ) );
                                $technical_blogging_header_class = $technical_blogging_show_title ? 'site-title' : 'screen-reader-text';
                                if(!empty(get_bloginfo( 'name' ))) {
                                    if ( is_front_page() ) { ?>
                                        <h1 class="<?php echo esc_attr( $technical_blogging_header_class ); ?>">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
                                        </h1>
                                <?php
                                    if(true === get_theme_mod( 'technical_blogging_display_site_title_tagline', true )) {
                                            $technical_blogging_description = esc_html(get_bloginfo( 'description', 'display' ));
                                            if ( $technical_blogging_description || is_customize_preview() ) { 
                                                ?>
                                                    <p class="site-description"><?php echo $technical_blogging_description; ?></p>
                                                <?php 
                                            }
                                        }
                                    }
                                    else { ?>
                                        <p class="<?php echo esc_attr( $technical_blogging_header_class ); ?>">
                                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
                                        </p>
                                        <?php
                                        if(true === get_theme_mod( 'technical_blogging_display_site_title_tagline', true )) {
                                            $technical_blogging_description = esc_html(get_bloginfo( 'description', 'display' ));
                                            if ( $technical_blogging_description || is_customize_preview() ) { 
                                                ?>
                                                    <p class="site-description"><?php echo $technical_blogging_description; ?></p>
                                                <?php 
                                            }
                                        }
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-9 col-12 align-self-center">
                        <div class="topbr-ads-box">
                            <?php 
                            $technical_blogging_mod = get_theme_mod('technical_blogging_ads_post_setting');

                                // Initialize the variable to store selected posts
                                $technical_blogging_ads_post = array();

                                // Add the selected post if it's not the placeholder
                                if ('page-none-selected' != $technical_blogging_mod) {
                                    $technical_blogging_ads_post[] = $technical_blogging_mod;
                                }

                                // Arguments for the query
                                $technical_blogging_args = array(
                                    'post_type'           => 'post',
                                    'post__in'            => $technical_blogging_ads_post, // Posts to include
                                    'ignore_sticky_posts' => true,
                                );

                                // Check if no specific posts are selected
                                if (empty($technical_blogging_ads_post)) {
                                    unset($technical_blogging_args['post__in']); // Remove the post__in key
                                    $technical_blogging_args['posts_per_page'] = 1; // Default to showing one post
                                }

                                // Create the query
                                $technical_blogging_topbar_query = new WP_Query($technical_blogging_args);

                                // Check if posts exist and display them
                                if ($technical_blogging_topbar_query->have_posts()) :
                                    while ($technical_blogging_topbar_query->have_posts()) : $technical_blogging_topbar_query->the_post(); 
                                ?>
                                    <div class="tbr2-inn px-4">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12 align-self-center">
                                                <div class="ads-txt">
                                                    <h6 class="ads-head py-2 m-0 px-lg-3 px-0"><?php the_title(); ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 align-self-center">
                                                <div class="blog-btn text-center my-2">
                                                    <a class="ads-shop-btn" href="<?php the_permalink(); ?>">
                                                        <?php echo esc_html('Shop Now', 'technical-blogging'); ?>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 text-lg-end text-center align-self-center">   
                                                <?php if (has_post_thumbnail()) { ?>
                                                    <img src="<?php the_post_thumbnail_url('full'); ?>" class="ads-image">
                                                <?php } ?>
                                            </div>
                                        </div>                          
                                    </div>
                                <?php 
                                    endwhile; 
                                    wp_reset_postdata(); ?>                               
                                <?php 
                                endif;
                                ?>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div id="custom-header">
            <div id="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-3 col-4 align-self-center">
                            <div class="top-menu-wrapper">
                                <div class="navigation_header">
                                    <div class="toggle-nav mobile-menu">
                                        <button onclick="technical_blogging_openNav()"><i class="bi bi-list"></i></button>
                                    </div>
                                    <div id="mySidenav" class="nav sidenav">
                                        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'technical-blogging' ); ?>">
                                            <?php {
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'primary',
                                                        'container_class' => 'navi clearfix navbar-nav' ,
                                                        'menu_class'     => 'menu clearfix', 
                                                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                        'fallback_cb' => 'wp_page_menu',
                                                    )
                                                );
                                            } ?>
                                        </nav>
                                        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="technical_blogging_closeNav()"><i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-8 align-self-center">
                            <div class="subscribe-btn my-lg-0 my-md-0 my-2">
                                <?php
                                    $technical_blogging_header_subscribe_btn_link = get_theme_mod( 'technical_blogging_header_subscribe_btn_link', '' );
                                    if ( ! empty( $technical_blogging_header_subscribe_btn_link ) ) { ?>
                                    <div class="subsc-button text-center">
                                        <a href="<?php echo esc_url( $technical_blogging_header_subscribe_btn_link ); ?>"><?php echo esc_html('Subscribe','technical-blogging'); ?></a>
                                    </div> 
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-5 col-12 align-self-center text-lg-end text-md-end text-center">
                            <div class="icon-place">
                            <span class="follow-us my-2 my-lg-0 my-md-3">
                                <?php
                                    $technical_blogging_social_media1_heading = get_theme_mod( 'technical_blogging_social_media1_heading', '' );
                                    if ( ! empty( $technical_blogging_social_media1_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $technical_blogging_social_media1_heading ); ?>"><i class="bi bi-facebook me-3"></i></a>
                                <?php } ?>
                                <?php
                                    $technical_blogging_social_media2_heading = get_theme_mod( 'technical_blogging_social_media2_heading', '' );
                                    if ( ! empty( $technical_blogging_social_media2_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $technical_blogging_social_media2_heading ); ?>"><i class="bi bi-instagram me-3"></i></a>
                                <?php } ?>
                                <?php
                                    $technical_blogging_social_media3_heading = get_theme_mod( 'technical_blogging_social_media3_heading', '' );
                                    if ( ! empty( $technical_blogging_social_media3_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $technical_blogging_social_media3_heading ); ?>"><i class="bi bi-twitter-x me-3"></i></a>
                                <?php } ?>
                                <?php
                                    $technical_blogging_social_media4_heading = get_theme_mod( 'technical_blogging_social_media4_heading', '' );
                                    if ( ! empty( $technical_blogging_social_media4_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $technical_blogging_social_media4_heading ); ?>"><i class="bi bi-youtube me-3"></i></a>
                                <?php } ?>
                                <?php
                                    $technical_blogging_social_media5_heading = get_theme_mod( 'technical_blogging_social_media5_heading', '' );
                                    if ( ! empty( $technical_blogging_social_media5_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $technical_blogging_social_media5_heading ); ?>"><i class="bi bi-pinterest me-3"></i></a>
                                <?php } ?>
                                <?php
                                    $technical_blogging_social_media6_heading = get_theme_mod( 'technical_blogging_social_media6_heading', '' );
                                    if ( ! empty( $technical_blogging_social_media6_heading ) ) { ?>
                                    <a href="<?php echo esc_url( $technical_blogging_social_media6_heading ); ?>"><i class="bi bi-linkedin me-3"></i></a>
                                <?php } ?>
                            </span>
                            <?php if(get_theme_mod('technical_blogging_search_hide',false)=="1"){ ?>
                                <span class="search-container">
                                    <button id="search-icon" class="search-icon">
                                        <i class="bi bi-search"></i>
                                    </button>
                                    <div id="search-form" class="search-form">
                                            <?php get_search_form(); ?>
                                    </div>
                                </span>
                            <?php } ?>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </div>    
</header>

<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>

<div class="content-wrap">