<?php
/**
 * Info Customizer Control
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if Technical_Blogging_Info_Control exists and WP_Customize_Control does not exsist.
if ( class_exists('Technical_Blogging_Info_Control') && ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

/**
 * This class is used for showing the extra information about any control in the Customizer.
 *
 * @access public
 */
class Technical_Blogging_Info_Control extends WP_Customize_Control {

	/**
	 * The type of customize control.
	 *
	 * @access public
	 * @since  1.3.4
	 * @var    string
	 */
	public $type = 'technical-blogging-info';


	/**
	 *  Render the content via PHP.
	 *
	 * @access public
	 * @since  1.0.0
	 * @return void
	 */
	public function render_content() {
		?>
			<p class="customizer-custom-info-text">
				<?php echo esc_html( $this->label ); ?>
			</p>
		<?php
	}
}
