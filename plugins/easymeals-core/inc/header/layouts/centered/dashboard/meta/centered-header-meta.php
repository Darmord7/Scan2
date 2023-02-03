<?php

if ( ! function_exists( 'easymeals_core_add_centered_header_meta' ) ) {
	function easymeals_core_add_centered_header_meta( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_centered_header_section',
				'title'      => esc_html__( 'Centered Header', 'easymeals-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'centered',
							'default_value' => ''
						)
					)
				)
			)
		);

		$section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_centered_header_in_grid',
				'title'       => esc_html__( 'Content in Grid', 'easymeals-core' ),
				'description' => esc_html__( 'Set content to be in grid', 'easymeals-core' ),
				'default_value' => '',
				'options'       => easymeals_core_get_select_type_options_pool( 'no_yes' )
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_centered_header_height',
				'title'       => esc_html__( 'Header Height', 'easymeals-core' ),
				'description' => esc_html__( 'Enter header height', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'easymeals-core' )
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_centered_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'easymeals-core' ),
				'description' => esc_html__( 'Enter header background color', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'easymeals-core' )
				)
			)
		);
	}
	
	add_action( 'easymeals_core_action_after_page_header_meta_map', 'easymeals_core_add_centered_header_meta' );
}