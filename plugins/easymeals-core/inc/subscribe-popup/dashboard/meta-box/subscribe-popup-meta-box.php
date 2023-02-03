<?php

if ( ! function_exists( 'easymeals_core_add_page_subscribe_popup_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function easymeals_core_add_page_subscribe_popup_meta_box( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_subscribe_popup',
					'title'       => esc_html__( 'Enable Subscribe Popup', 'easymeals-core' ),
					'description' => esc_html__( 'Use this option to enable/disable subscribe popup', 'easymeals-core' ),
					'options'     => easymeals_core_get_select_type_options_pool( 'yes_no' )
				)
			);
		}
	}
	
	add_action( 'easymeals_core_action_after_general_page_meta_box_map', 'easymeals_core_add_page_subscribe_popup_meta_box', 9 );
}