<?php

if ( ! function_exists( 'easymeals_core_add_page_logo_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function easymeals_core_add_page_logo_meta_box( $page ) {

		if ( $page ) {

			$logo_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-logo',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Logo Settings', 'easymeals-core' ),
					'description' => esc_html__( 'Logo settings', 'easymeals-core' )
				)
			);

			$header_logo_section = $logo_tab->add_section_element(
				array(
					'name'  => 'qodef_header_logo_section',
					'title' => esc_html__( 'Header Logo Options', 'easymeals-core' ),
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_height',
					'title'       => esc_html__( 'Logo Height', 'easymeals-core' ),
					'description' => esc_html__( 'Enter logo height', 'easymeals-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'easymeals-core' )
					)
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_main',
					'title'       => esc_html__( 'Logo - Main', 'easymeals-core' ),
					'description' => esc_html__( 'Choose main logo image', 'easymeals-core' ),
					'multiple'    => 'no'
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'easymeals-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'easymeals-core' ),
					'multiple'    => 'no'
				)
			);

			$header_logo_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'easymeals-core' ),
					'description' => esc_html__( 'Choose light logo image', 'easymeals-core' ),
					'multiple'    => 'no'
				)
			);

			// Hook to include additional options after module options
			do_action( 'easymeals_core_action_after_page_logo_meta_map', $logo_tab, $header_logo_section );
		}
	}

	add_action( 'easymeals_core_action_after_general_meta_box_map', 'easymeals_core_add_page_logo_meta_box' );
	add_action( 'easymeals_core_action_after_portfolio_meta_box_map', 'easymeals_core_add_page_logo_meta_box' );
}