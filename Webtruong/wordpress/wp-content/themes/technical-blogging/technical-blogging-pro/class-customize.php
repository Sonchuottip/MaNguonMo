<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Technical_Blogging_Pro_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
			get_template_part( 'technical-blogging-pro/section-pro' );

		// Register custom section types.
		$manager->register_section_type( 'Technical_Blogging_Pro_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Technical_Blogging_Pro_Customize_Section_Pro(
				$manager,
				'technical_blogging_buy',
				array(
					'priority'      => 10,
					'title'    => esc_html__( 'Technical Blogging Pro', 'technical-blogging' ),
					'pro_text' => esc_html__( 'Upgrade to Pro', 'technical-blogging' ),
					'pro_url'  => 'https://www.legacytheme.net/products/blogging-wordpress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'technical-blogging-customize-controls', trailingslashit( get_template_directory_uri() ) . 'technical-blogging-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'technical-blogging-customize-controls', trailingslashit( get_template_directory_uri() ) . 'technical-blogging-pro/customize-controls.css' );
	}

}

// Doing this customizer thang!
Technical_Blogging_Pro_Customize::get_instance();
