<?php

if ( ! function_exists( 'easymeals_core_add_standard_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function easymeals_core_add_standard_header_global_option( $header_layout_options ) {
		$header_layout_options['standard'] = array(
			'image' => EASYMEALS_CORE_HEADER_LAYOUTS_URL_PATH . '/standard/assets/img/standard-header.png',
			'label' => esc_html__( 'Standard', 'easymeals-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'easymeals_core_filter_header_layout_option', 'easymeals_core_add_standard_header_global_option' );
}

if ( ! function_exists( 'easymeals_core_set_standard_header_as_default_global_option' ) ) {
	/**
	 * This function set header type as default option value for global header option map
	 */
	function easymeals_core_set_standard_header_as_default_global_option( $default_value ) {
		return 'standard';
	}
	
	add_filter( 'easymeals_core_filter_header_layout_default_option_value', 'easymeals_core_set_standard_header_as_default_global_option' );
}

if ( ! function_exists( 'easymeals_core_register_standard_header_layout' ) ) {
	function easymeals_core_register_standard_header_layout( $header_layouts ) {
		$header_layout = array(
			'standard' => 'StandardHeader'
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'easymeals_core_filter_register_header_layouts', 'easymeals_core_register_standard_header_layout');
}