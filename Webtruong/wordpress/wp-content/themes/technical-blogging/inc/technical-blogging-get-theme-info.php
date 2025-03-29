<?php
/**
 * Theme information technical blogging
 *
 * @package technical blogging
 */

 define('TECHNICAL_BLOGGING_DEMO_URL','https://legacytheme.net/trial/technical-blogging/');
 define('TECHNICAL_BLOGGING_THEME_PRO_URL','https://www.legacytheme.net/products/blogging-wordpress-theme/');
 define('TECHNICAL_BLOGGING_THEME_DOC_URL','https://www.legacytheme.net/tutorial/technical-blogging-lite/');
 define('TECHNICAL_BLOGGING_THEME_SUPPORT_URL','https://wordpress.org/support/theme/technical-blogging/');
 define('TECHNICAL_BLOGGING_THEME_RATINGS_URL','https://wordpress.org/support/theme/technical-blogging/reviews/');
 define('TECHNICAL_BLOGGING_THEME_UPGRADE_URL','https://www.legacytheme.net/products/blogging-wordpress-theme/'); 

if ( ! class_exists( 'Technical_Blogging_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Technical_Blogging_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Technical_Blogging_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Technical_Blogging_About_Page
		 *
		 * @var Technical_Blogging_About_Page $instance The Technical_Blogging_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Technical_Blogging_About_Page instance.
		 *
		 * We make sure that only one instance of Technical_Blogging_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function technical_blogging_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Technical_Blogging_About_Page ) ) {
				self::$instance = new Technical_Blogging_About_Page;				
				self::$instance->config = $config;
				self::$instance->technical_blogging_setup_config();	
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function technical_blogging_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
				
		}	
	}
}


/**
 *  Adding a About page 
 */
add_action('admin_menu', 'technical_blogging_add_menu');
function technical_blogging_add_menu() {
     add_theme_page(esc_html__('Legacy-themes','technical-blogging'), esc_html__('Get Theme Info','technical-blogging'),'manage_options', esc_html__('technical-blogging-theme-info','technical-blogging'), esc_html__('technical_blogging_theme_info','technical-blogging'));
}

/**
 *  Callback
 */
function technical_blogging_theme_info() {
	$theme = wp_get_theme();
?>
	<div class="theme-info">
		<div class="container">
			<div class="top-section">
				<div class="title">
					<h1 class="info-theme-name"><?php esc_html_e( 'Technical Blogging WordPress Theme', 'technical-blogging' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
					<p><?php echo $theme->get( 'Description' ); ?></p>
				</div>
			</div>
			<div class="middle-section">
				<div class="screnshot-wrapper">
					<div class="scrnsht-box">
						<img class="scrnshot-img" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
					</div>
					<div class="info-pro-btn">
							<a class="button button-primary button-large" href="<?php echo esc_url(TECHNICAL_BLOGGING_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'technical-blogging' ); ?></a>
					</div>
				</div>

				<div class="custmzr-settng sidebar-right">
					<div class="quick-links">
						<h2 class="info-qick-hd"><?php esc_html_e( 'Quick Customizer Settings', 'technical-blogging' ); ?> </h2>
						<div class="cst-btn">			
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-welcome-view-site"></span>
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=custom_logo')) ?>" target="_blank"> <?php esc_html_e( 'Upload Logo', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-menu-alt2"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=nav_menus')) ?>" target="_blank"> <?php esc_html_e( 'Menu Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-admin-tools"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=technical_blogging_home_header_settings')) ?>" target="_blank"> <?php esc_html_e( 'Header Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-format-image"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=technical_blogging_home_banner_settings')) ?>" target="_blank"> <?php esc_html_e( 'Banner Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-image-filter"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=technical_blogging_featured_topics_settings')) ?>" target="_blank"> <?php esc_html_e( 'Featured Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-media-default"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=technical_blogging_enable_page_title')) ?>" target="_blank"> <?php esc_html_e( 'Page Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-edit-large"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=technical_blogging_blog_settings_panel')) ?>" target="_blank"> <?php esc_html_e( 'Blog Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-columns"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=technical_blogging_footer_settings')) ?>" target="_blank"> <?php esc_html_e( 'Footer Settings', 'technical-blogging' ); ?> </a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="buttons-box">
				<div class="info-btns-link">
					<div class="sidebar">
						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-format-aside"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(TECHNICAL_BLOGGING_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'technical-blogging' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-visibility"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(TECHNICAL_BLOGGING_DEMO_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'technical-blogging' ); ?></a></h3>
							</div>	
						</div>	

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-admin-generic"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(TECHNICAL_BLOGGING_THEME_UPGRADE_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'technical-blogging' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-star-filled"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(TECHNICAL_BLOGGING_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'technical-blogging' ); ?></a></h3>
							</div>						
						</div>						

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-sos"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(TECHNICAL_BLOGGING_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'technical-blogging' ); ?></a></h3>
							</div>						
						</div>							
					</div>
				</div>
			</div>				
			<div class="tick-box">
				<div class="comp-box">
					<h2 class="table-heading"><?php esc_html_e( 'What makes our PRO Version the better option?', 'technical-blogging' ); ?></h2>
					<div class="comp-table">
						<table>
							<thead> 
								<tr> 
								 	<th class="thead-column1"><strong><h4><?php esc_html_e( 'Feature', 'technical-blogging' ); ?></h4></strong></th>
									<th class="thead-column2"><strong><h4><?php esc_html_e( 'Technical Blogging Free', 'technical-blogging' ); ?></h4></strong></th>
									<th class="thead-column3"><strong><h4><?php esc_html_e( 'Technical Blogging Pro', 'technical-blogging' ); ?></h4></strong></th>
								</tr> 
							</thead>
							<tbody>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Customizer Theme Options', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Footer Widget', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Inner Pages Settings', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Blog Sidebar', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Responsive Design (Mobile, Tablets)', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Sidebar Options (Full, Left and Right)', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( '1 Click Demo Import', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Preloader', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Contact Form', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Typography', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'WooCommerce Settings', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Extra Customizer Settings', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Sticky Header', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'More Color Options', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Related Posts Section', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Footer Columns Settings', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Priority Support', 'technical-blogging' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr> 
								<tr class="last-row"> 
						 					<td class="tbody-column1"></td>
						 					<td class="tbody-column2"></td>
						 					<td class="tbody-column3"><a class="button button-primary button-large" href="<?php echo esc_url(TECHNICAL_BLOGGING_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'Upgrade to PRO', 'technical-blogging' ); ?></a></td>
										</tr> 
			   				</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>	
	</div>
<?php
}
