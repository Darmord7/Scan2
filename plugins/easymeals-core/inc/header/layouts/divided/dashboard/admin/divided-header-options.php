<?php

if ( ! function_exists( 'easymeals_core_add_divided_header_options' ) ) {
	function easymeals_core_add_divided_header_options( $page, $general_header_tab ) {
		
		$section = $general_header_tab->add_section_element(
			array(
				'name'       => 'qodef_divided_header_section',
				'title'      => esc_html__( 'Divided Header', 'easymeals-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'divided',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_height',
				'title'       => esc_html__( 'Header Height', 'easymeals-core' ),
				'description' => esc_html__( 'Enter header height', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'easymeals-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_divided_header_side_padding',
				'title'       => esc_html__( 'Header Side Padding', 'easymeals-core' ),
				'description' => esc_html__( 'Enter side padding for header area', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px or %', 'easymeals-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_divided_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'easymeals-core' ),
				'description' => esc_html__( 'Enter header background color', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'easymeals-core' )
				)
			)
		);

	}
	
	add_action( 'easymeals_core_action_after_header_options_map', 'easymeals_core_add_divided_header_options', 10, 2 );
}