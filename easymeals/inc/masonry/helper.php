<?php

if ( ! function_exists( 'easymeals_register_masonry_scripts' ) ) {
	/**
	 * Function that include modules 3rd party scripts
	 */
	function easymeals_register_masonry_scripts() {
		wp_register_script( 'isotope', EASYMEALS_INC_ROOT . '/masonry/assets/js/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_register_script( 'packery', EASYMEALS_INC_ROOT . '/masonry/assets/js/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
	}
	add_action( 'easymeals_action_before_main_js', 'easymeals_register_masonry_scripts' );
}

if ( ! function_exists( 'easymeals_include_masonry_scripts' ) ) {
	/**
	 * Function that include modules 3rd party scripts
	 */
	function easymeals_include_masonry_scripts() {
		wp_enqueue_script( 'isotope' );
		wp_enqueue_script( 'packery' );
	}
}

if ( ! function_exists( 'easymeals_enqueue_masonry_scripts_for_templates' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for templates
	 */
	function easymeals_enqueue_masonry_scripts_for_templates() {
		$post_type = apply_filters( 'easymeals_filter_allowed_post_type_to_enqueue_masonry_scripts', '' );
		
		if ( ! empty( $post_type ) && is_singular( $post_type ) ) {
			easymeals_include_masonry_scripts();
		}
	}
	
	add_action( 'easymeals_action_before_main_js', 'easymeals_enqueue_masonry_scripts_for_templates' );
}

if ( ! function_exists( 'easymeals_enqueue_masonry_scripts_for_shortcodes' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for shortcodes
	 *
	 * @param array $atts
	 */
	function easymeals_enqueue_masonry_scripts_for_shortcodes( $atts ) {
		
		if ( isset( $atts['behavior'] ) && $atts['behavior'] == 'masonry' ) {
			easymeals_include_masonry_scripts();
		}
	}
	
	add_action( 'easymeals_core_action_list_shortcodes_load_assets', 'easymeals_enqueue_masonry_scripts_for_shortcodes' );
}

if ( ! function_exists( 'easymeals_register_masonry_scripts_for_list_shortcodes' ) ) {
	/**
	 * Function that add masonry scripts to array
	 *
	 * @param array $scripts
	 *
	 * @return array
	 */
	function easymeals_register_masonry_scripts_for_list_shortcodes( $scripts ) {
		$scripts['isotope'] = array(
			'registered'    => true
		);
		$scripts['packery'] = array(
			'registered'    => true
		);
		return $scripts;
	}
	add_filter( 'easymeals_core_filter_registered_list_scripts', 'easymeals_register_masonry_scripts_for_list_shortcodes' );
}