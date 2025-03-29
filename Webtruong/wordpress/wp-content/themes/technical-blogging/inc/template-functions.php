<?php
/**
 * @package Technical Blogging
 */

/**
 * Footer
 */
if (! function_exists( 'technical_blogging_footer_copyrights' ) ):
    function technical_blogging_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'technical_blogging_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'technical_blogging_footer_copyright_text'));
                                if(get_theme_mod('technical_blogging_en_footer_credits',true)) :
                                    ?> 
                                    <span class="copyrg-link"><a href="<?php echo esc_url(TECHNICAL_BLOGGING_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Blogging WordPress Theme','technical-blogging') ?></a><?php esc_html_e(' by Legacy Themes','technical-blogging') ?></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'technical-blogging' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(TECHNICAL_BLOGGING_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Blogging WordPress Theme','technical-blogging') ?></a><?php esc_html_e(' by Legacy Themes','technical-blogging') ?></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'technical_blogging_action_footer', 'technical_blogging_footer_copyrights' );


/**
 * Page Title Settings
 */
if (!function_exists('technical_blogging_show_page_title')):
    function technical_blogging_show_page_title( $technical_blogging_blogtitle=false,$technical_blogging_archivetitle=false,$technical_blogging_searchtitle=false,$technical_blogging_pagenotfoundtitle=false ) {
        if(!is_front_page()){
            if ('color' === esc_html(get_theme_mod( 'technical_blogging_page_bg_radio','color' ))) {
                ?>
                    <div class="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'technical_blogging_page_bg_color','#e32988' )); ?>;">
                <?php
            }
            else if('image' === esc_html(get_theme_mod( 'technical_blogging_page_bg_radio','color' ))){
                $image= esc_url(get_template_directory_uri().'/img/start-bg.jpg');
                ?>
                <?php
                    if ( has_post_thumbnail()) {
                        $technical_blogging_featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        ?>
                            <div class="page-title" style="background:url('<?php echo esc_url($technical_blogging_featured_img_url) ?>') no-repeat scroll center center / cover;"> 
                        <?php }
                    else{
                        ?>
                            <div class="page-title"  style="background:url('<?php echo esc_url($image ); ?>') no-repeat scroll center center / cover;">    
                        <?php } ?>                    
                <?php }
            else{ ?>
                <div class="page-title" style="background:#e32988;"> 
                <?php } ?>
                <div class="content-section img-overlay">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="section-title page-title"> 
                                    <?php
                                        if($technical_blogging_blogtitle){
                                            ?><h1 class="main-title"><?php single_post_title(); ?></h1><?php
                                        }
                                        if($technical_blogging_archivetitle){
                                            ?><h1 class="main-title"><?php the_archive_title(); ?></h1><?php
                                        }
                                        if($technical_blogging_searchtitle){
                                            ?><h1 class="main-title"><?php esc_html_e('SEARCH RESULTS','technical-blogging') ?></h1><?php
                                        }
                                        if($technical_blogging_pagenotfoundtitle){
                                            ?><h1 class="main-title"><?php esc_html_e('PAGE NOT FOUND','technical-blogging') ?></h1><?php
                                        }                                       
                                        
                                        if($technical_blogging_blogtitle==false && $technical_blogging_archivetitle==false && $technical_blogging_searchtitle==false && $technical_blogging_pagenotfoundtitle==false){
                                            ?><h1 class="main-title"><?php the_title(); ?></h1><?php
                                        }
                                    ?>                                                       
                                </div>                      
                            </div>
                        </div>
                    </div>  
                </div>
                </div>  <!-- End page-title --> 
            <?php
        }
    }
endif;
add_action('technical_blogging_get_page_title', 'technical_blogging_show_page_title');


/**
 * Home Banner Section
 */
if (! function_exists( 'technical_blogging_home_banner_section' ) ):
    function technical_blogging_home_banner_section() {
        ?>
        <section id="main-banner-wrap">
            <div class="slider1" slider-loop="<?php echo esc_html(get_theme_mod('technical_blogging_banner_loop')); ?>">
                <div class="owl-carousel" role="listbox">
                    <?php
                    $technical_blogging_post_cat1 = get_theme_mod('technical_blogging_top_post_category_1', '');                               
                    $technical_blogging_banner_number1 = get_theme_mod('technical_blogging_banner_number1', 3);  
                        if($technical_blogging_post_cat1){               
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => $technical_blogging_banner_number1,
                            'order'          => 'ASC',
                            'category_name' =>esc_html($technical_blogging_post_cat1,'technical-blogging'));                               
                        $technical_blogging_slider_loop1 = new WP_Query( $args );
                        while ( $technical_blogging_slider_loop1->have_posts() ) : $technical_blogging_slider_loop1->the_post();
                    ?>                    
                    <div class="banner-imagebox">
                        <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                          } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/slider1.jpg" alt="" />
                        <?php } ?>
                        <div class="banner-content">
                            <div class="bannr-catgry">
                                <?php the_category() ?>
                            </div>                              
                            <h4 class="py-2 mb-0"><?php the_title(); ?></h4>
                            <p class="slidr-date mb-0"><i class="bi bi-calendar3 me-1"></i> <?php the_time(get_option('date_format')) ?></p>                              
                            <div class="slide-btn my-3"><a href="<?php the_permalink(); ?>"><?php esc_html_e(get_theme_mod('technical_blogging_banner_button_text','READ MORE')); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile;
                      wp_reset_postdata();
                    } ?>
                </div>
            </div>
            <div class="slider2" slider-loop="<?php echo esc_html(get_theme_mod('technical_blogging_banner_loop')); ?>">
                <div class="owl-carousel" role="listbox">
                    <?php
                        $technical_blogging_post_cat2 = get_theme_mod('technical_blogging_top_post_category_2', '');                               
                        $technical_blogging_banner_number2 = get_theme_mod('technical_blogging_banner_number2', 2);  
                            if($technical_blogging_post_cat2){               
                            $args = array(
                                'post_type'      => 'post',
                                'posts_per_page' => $technical_blogging_banner_number2,
                                'order'          => 'ASC',
                                'category_name' =>esc_html($technical_blogging_post_cat2,'technical-blogging'));                               
                            $technical_blogging_slider_loop2 = new WP_Query( $args );
                            while ( $technical_blogging_slider_loop2->have_posts() ) : $technical_blogging_slider_loop2->the_post();
                    ?>
                    <div class="banner-imagebox">
                        <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                          } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/slider2.jpg" alt="" />
                        <?php } ?>
                        <div class="banner-content">
                            <div class="bannr-catgry">
                                <span><?php the_category() ?></span>
                            </div>                          
                            <h4 class="py-2 mb-0"><?php the_title(); ?></h4>                         
                            <p class="slidr-date mb-0"><i class="bi bi-calendar3 me-1"></i> <?php the_time(get_option('date_format')) ?></p>
                        </div>
                    </div>
                    <?php endwhile;
                      wp_reset_postdata();
                    } ?>
                </div>
            </div>
            <div class="slider3" slider-loop="<?php echo esc_html(get_theme_mod('technical_blogging_banner_loop')); ?>">
                <div class="owl-carousel" role="listbox">
                    <?php
                    $technical_blogging_post_cat3 = get_theme_mod('technical_blogging_top_post_category_3', '');                               
                    $technical_blogging_banner_number3 = get_theme_mod('technical_blogging_banner_number3', 2);  
                        if($technical_blogging_post_cat3){               
                        $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => $technical_blogging_banner_number3,
                            'order'          => 'ASC',
                            'category_name' =>esc_html($technical_blogging_post_cat3,'technical-blogging'));                             
                        $technical_blogging_slider_loop3 = new WP_Query( $args );
                        while ( $technical_blogging_slider_loop3->have_posts() ) : $technical_blogging_slider_loop3->the_post();
                    ?>
                    <div class="banner-imagebox">
                        <?php if(has_post_thumbnail()){
                          the_post_thumbnail();
                          } else{?>
                          <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/slider3.jpg" alt="" />
                        <?php } ?>
                        <div class="banner-content">
                            <div class="bannr-catgry">
                                <span><?php the_category() ?></span>
                            </div>                          
                            <h4 class="py-2 mb-0"><?php the_title(); ?></h4>                         
                            <p class="slidr-date mb-0"><i class="bi bi-calendar3 me-1"></i> <?php the_time(get_option('date_format')) ?></p>
                        </div>
                    </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    } ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'technical_blogging_action_home_banner', 'technical_blogging_home_banner_section' );


/**
 * Home featured topics Section
 */
if (! function_exists( 'technical_blogging_featured_topics_section' ) ):
    function technical_blogging_featured_topics_section() {
        ?>
        <section id="featured-wrap" class="my-2">
            <?php $technical_blogging_featured_section_bg_image = get_theme_mod( 'technical_blogging_featured_section_bg_image'); ?>
                    <div class="bg-sect py-2">
                        <div class="featr-bg-image" style="background-image: url('<?php echo esc_url( $technical_blogging_featured_section_bg_image ); ?>');" ></div>
                    
            <div class="container">
                <div class="inner-wrap">
                    <div class="featrd-head text-center pt-3 pb-4">
                        <?php
                            $technical_blogging_featured_topics_main_heading = get_theme_mod( 'technical_blogging_featured_topics_main_heading', '' );
                            if ( ! empty( $technical_blogging_featured_topics_main_heading ) ) { ?>
                            <h3 class="featrd-main-hd m-0 d-inline-block py-1 px-5"><?php echo esc_html( $technical_blogging_featured_topics_main_heading ); ?></h3>
                        <?php } ?>
                    </div>                    
                    <div class="featurd-detail row">
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="row">
                                <?php
                                $technical_blogging_featured_post_category = get_theme_mod('technical_blogging_feature_category', '');                               
                                $technical_blogging_featured_topics_number = get_theme_mod('technical_blogging_featured_topics_number', 2);  
                                    if($technical_blogging_featured_post_category){               
                                    $args = array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => $technical_blogging_featured_topics_number,
                                        'order'          => 'ASC',
                                        'category_name' => sanitize_text_field($technical_blogging_featured_post_category),    
                                    );                                
                                    $technical_blogging_loop = new WP_Query( $args );
                                    while ( $technical_blogging_loop->have_posts() ) : $technical_blogging_loop->the_post();
                                ?>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="feturd-inn mb-lg-0 mb-md-2 mb-2">
                                        <div class="bg-opacty-img"></div>
                                        <?php if(has_post_thumbnail()){ ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" class="fetred-image">
                                        <?php } ?>
                                        <div class="featured-content text-center text-lg-start text-md-start">
                                            <div class="fetured-cat">
                                                <?php the_category() ?>
                                            </div>
                                            <h6 class="featured-inner-head pt-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                            <div class="row pt-1">
                                                <div class="col-lg-6 col-md-6 col-6">
                                                    <div class="feturd-authr">
                                                        <p class="ftrd-authr mb-0"><i class="bi bi-person me-1"></i><a class="admn-url-ftrd" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php the_author() ?></a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-6">
                                                    <div class="fetrd-date">
                                                        <p class="featured-date mb-0 "><i class="bi bi-calendar3 featured-icon me-1"></i> <?php the_time(get_option('date_format')) ?></p>
                                                    </div>
                                                </div>
                                            </div>                                    
                                        </div>                                  
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata(); }?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="feturd-second-cat">
                                <?php
                                $technical_blogging_post_category2 = get_theme_mod('technical_blogging_selected_category2', '');                               
                                $technical_blogging_featured_topics_number2 = get_theme_mod('technical_blogging_featured_topics_number2', 2);  
                                    if($technical_blogging_post_category2){               
                                    $args = array(
                                        'post_type'      => 'post',
                                        'posts_per_page' => $technical_blogging_featured_topics_number2,
                                        'order'          => 'ASC',
                                        'category_name' => sanitize_text_field($technical_blogging_post_category2),    
                                    );                                
                                    $technical_blogging_loop2 = new WP_Query( $args );
                                    while ( $technical_blogging_loop2->have_posts() ) : $technical_blogging_loop2->the_post();
                                ?>
                                <div class="row mb-3">
                                    <div class="col-lg-5 col-md-5 col-12 px-0">
                                        <?php if(has_post_thumbnail()){ ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" class="fetred-image2">
                                        <?php } ?>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-12 align-self-center">
                                        <div class="featured-content2 text-center text-lg-start text-md-start">
                                            <div class="fetured-cat">
                                                <?php the_category() ?>
                                            </div>
                                            <h6 class="featured-inner-head2 pt-0 mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                            <div class="fetrd-date2">
                                                <p class="featured-date2 mb-0"><i class="bi bi-calendar3 featured-icon2 me-1"></i> <?php the_time(get_option('date_format')) ?></p>
                                            </div>                    
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; wp_reset_postdata(); }?>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            </div>
        </section>
        <?php 
        }
endif;   
   
add_action( 'technical_blogging_action_featured_topics', 'technical_blogging_featured_topics_section' );

/**
 * Home page another adding Section
 */
if (! function_exists( 'technical_blogging_home_extra_section' ) ):
    function technical_blogging_home_extra_section() {
        ?>
        <div id="custom-home-extra-content" class="py-3">
            <div class="container">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>
            </div>
        </div>
        <?php    
    }
endif;
add_action( 'technical_blogging_action_home_extra', 'technical_blogging_home_extra_section' );