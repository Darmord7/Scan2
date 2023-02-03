<?php

if ( ! function_exists( 'easymeals_core_add_fixed_header_option' ) ) {
	/**
	 * This function set header scrolling appearance value for global header option map
	 */
	function easymeals_core_add_fixed_header_option( $options ) {
		$options['fixed'] = esc_html__( 'Fixed', 'easymeals-core' );

		return $options;
	}

	add_filter( 'easymeals_core_filter_header_scroll_appearance_option', 'easymeals_core_add_fixed_header_option' );
}