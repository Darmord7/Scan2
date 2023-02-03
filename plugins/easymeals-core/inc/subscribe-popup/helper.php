<?php

if ( ! function_exists( 'easymeals_core_get_subscribe_popup' ) ) {
	/**
	 * Loads subscribe popup HTML
	 */
	function easymeals_core_get_subscribe_popup() {
		$enable_popup = easymeals_core_get_post_value_through_levels( 'qodef_enable_subscribe_popup' );
		if ( $enable_popup === 'yes' && easymeals_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' ) !== '' ) {
			easymeals_core_load_subscribe_popup_template();
		}
	}

	// Get subscribe popup HTML
	add_action( 'easymeals_action_before_page_header', 'easymeals_core_get_subscribe_popup' );
}

if ( ! function_exists( 'easymeals_core_load_subscribe_popup_template' ) ) {
	/**
	 * Loads HTML template with params
	 */
	function easymeals_core_load_subscribe_popup_template() {
		$params                     = array();
		$params['title']            = easymeals_core_get_option_value( 'admin', 'qodef_subscribe_popup_title' );
		$params['subtitle']         = easymeals_core_get_option_value( 'admin', 'qodef_subscribe_popup_subtitle' );

//		$params['content_style']    = ! empty( $background_image ) ? 'background-image: url(' . esc_url( wp_get_attachment_url( $background_image ) ) . ')' : '';
		$params['contact_form']     = easymeals_core_get_option_value( 'admin', 'qodef_subscribe_popup_contact_form' );
		$params['enable_prevent']   = easymeals_core_get_option_value( 'admin', 'qodef_enable_subscribe_popup_prevent' );
		$params['prevent_behavior'] = easymeals_core_get_option_value( 'admin', 'qodef_subscribe_popup_prevent_behavior' );

		$holder_classes           = array();
		$holder_classes[]         = ! empty( $params['prevent_behavior'] ) ? 'qodef-sp-prevent-' . $params['prevent_behavior'] : 'qodef-sp-prevent-session';
		$params['holder_classes'] = implode( ' ', $holder_classes );

		echo easymeals_core_get_template_part( 'subscribe-popup', 'templates/subscribe-popup', '', $params );
	}
}