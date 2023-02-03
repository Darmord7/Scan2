<?php
if ( ! function_exists( 'easymeals_core_add_divided_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */

	function easymeals_core_add_divided_header_global_option( $header_layout_options ) {
		$header_layout_options['divided'] = array(
			'image' => EASYMEALS_CORE_HEADER_LAYOUTS_URL_PATH . '/divided/assets/img/divided-header.png',
			'label' => esc_html__( 'Divided', 'easymeals-core' )
		);

		return $header_layout_options;
	}

	add_filter( 'easymeals_core_filter_header_layout_option', 'easymeals_core_add_divided_header_global_option' );
}


if ( ! function_exists( 'easymeals_core_register_divided_header_layout' ) ) {
	function easymeals_core_register_divided_header_layout( $header_layouts ) {
		$header_layout = array(
			'divided' => 'DividedHeader'
		);

		$header_layouts = array_merge( $header_layouts, $header_layout );

		return $header_layouts;
	}

	add_filter( 'easymeals_core_filter_register_header_layouts', 'easymeals_core_register_divided_header_layout');
}

if ( ! function_exists( 'easymeals_core_register_divided_menu' ) ) {
	function easymeals_core_register_divided_menu($menus) {

		$menus['divided-menu-left-navigation']  = esc_html__( 'Divided Left Navigation', 'easymeals-core' );
		$menus['divided-menu-right-navigation'] = esc_html__( 'Divided Right Navigation', 'easymeals-core' );

		return $menus;
	}
	add_filter('easymeals_filter_register_navigation_menus','easymeals_core_register_divided_menu');
}