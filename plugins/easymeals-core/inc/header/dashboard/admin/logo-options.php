<?php

if ( ! function_exists( 'easymeals_core_add_logo_options' ) ) {
	function easymeals_core_add_logo_options() {
		$qode_framework = qode_framework_get_framework_root();

		$page = $qode_framework->add_options_page(
			array(
				'scope'       => EASYMEALS_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'logo',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Logo', 'easymeals-core' ),
				'description' => esc_html__( 'Global Logo Options', 'easymeals-core' ),
				'layout'      => 'tabbed'
			)
		);

		if ( $page ) {

			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Logo Options', 'easymeals-core' ),
					'description' => esc_html__( 'Set options for initial headers', 'easymeals-core' )
				)
			);

			$header_tab->add_field_element(
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

			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_main',
					'title'         => esc_html__( 'Logo - Main', 'easymeals-core' ),
					'description'   => esc_html__( 'Choose main logo image', 'easymeals-core' ),
					'default_value' => defined( 'EASYMEALS_ASSETS_ROOT' ) ? EASYMEALS_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no'
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_dark',
					'title'       => esc_html__( 'Logo - Dark', 'easymeals-core' ),
					'description' => esc_html__( 'Choose dark logo image', 'easymeals-core' ),
					'multiple'    => 'no'
				)
			);

			$header_tab->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_logo_light',
					'title'       => esc_html__( 'Logo - Light', 'easymeals-core' ),
					'description' => esc_html__( 'Choose light logo image', 'easymeals-core' ),
					'multiple'    => 'no'
				)
			);

			// Hook to include additional options after module options
			do_action( 'easymeals_core_action_after_header_logo_options_map', $page, $header_tab );
		}
	}

	add_action( 'easymeals_core_action_default_options_init', 'easymeals_core_add_logo_options', easymeals_core_get_admin_options_map_position( 'logo' ) );
}