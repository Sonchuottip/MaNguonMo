<?php
/**
 * Custom template hooks for this theme.
 *
 * @package Technical Blogging
 */


/**
 * Before title meta hook
 */
if ( ! function_exists( 'technical_blogging_before_title' ) ) :
function technical_blogging_before_title() {
	do_action('technical_blogging_before_title');
}
endif;


/**
 * Before title content hook
 */
if ( ! function_exists( 'technical_blogging_before_title_content' ) ) :
	function technical_blogging_before_title_content() {
		do_action('technical_blogging_before_title_content');
	}
endif;


/**
 * After title content hook
 */
if ( ! function_exists( 'technical_blogging_after_title_content' ) ) :
	function technical_blogging_after_title_content() {
		do_action('technical_blogging_after_title_content');
	}
endif;


/**
 * After title meta hook
 */
if ( ! function_exists( 'technical_blogging_after_title' ) ) :
function technical_blogging_after_title() {
	do_action('technical_blogging_after_title');
}
endif;

/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'technical_blogging_single_post_after_content' ) ) :
	function technical_blogging_single_post_after_content($postID) {
		do_action('technical_blogging_single_post_after_content',$postID);
	}
endif;