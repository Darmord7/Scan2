<?php
if ( ! function_exists( 'easymeals_core_add_top_area_meta_options' ) ) {
	function easymeals_core_add_top_area_meta_options( $page ) {
		$top_area_section = $page->add_section_element(
			array(
				'name'       => 'qodef_top_area_section',
				'title'      => esc_html__( 'Top Area', 'easymeals-core' ),
				'dependency' => array(
					'hide' => array(
						'qodef_header_layout' => array(
							'values'        => easymeals_core_dependency_for_top_area_options(),
							'default_value' => ''
						)
					)
				)
			)
		);

		$top_area_section->add_field_element(
			array(
				'field_type'  => 'select',
				'name'        => 'qodef_top_area_header',
				'title'       => esc_html__( 'Top Area', 'easymeals-core' ),
				'description' => esc_html__( 'Enable top area', 'easymeals-core' ),
				'options'     => easymeals_core_get_select_type_options_pool( 'yes_no' )
			)
		);

		$top_area_options_section = $top_area_section->add_section_element(
			array(
				'name'        => 'qodef_top_area_options_section',
				'title'       => esc_html__( 'Top Area Options', 'easymeals-core' ),
				'description' => esc_html__( 'Set desired values for top area', 'easymeals-core' ),
				'dependency'  => array(
					'show' => array(
						'qodef_top_area_header' => array(
							'values'        => 'yes',
							'default_value' => 'no'
						)
					)
				)
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'color',
				'name'        => 'qodef_top_area_header_background_color',
				'title'       => esc_html__( 'Top Area Background Color', 'easymeals-core' ),
				'description' => esc_html__( 'Choose top area background color', 'easymeals-core' )
			)
		);

		$top_area_options_section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_top_area_header_height',
				'title'       => esc_html__( 'Top Area Height', 'easymeals-core' ),
				'description' => esc_html__( 'Enter top area height (default is 30px)', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'easymeals-core' )
				)
			)
		);

        $top_area_options_section->add_field_element(
            array(
                'field_type'  => 'select',
                'name'        => 'qodef_top_area_in_grid',
                'title'       => esc_html__( 'Content in Grid', 'easymeals-core' ),
                'description' => esc_html__( 'Set content to be in grid', 'easymeals-core' ),
                'default_value' => '',
                'options'       => easymeals_core_get_select_type_options_pool( 'no_yes' )
            )
        );

		$top_area_options_section->add_field_element(
			array(
				'field_type' => 'text',
				'name'       => 'qodef_top_area_header_side_padding',
				'title'      => esc_html__( 'Top Area Side Padding', 'easymeals-core' ),
				'args'       => array(
					'suffix' => esc_html__( 'px or %', 'easymeals-core' )
				)
			)
		);
	}

	add_action( 'easymeals_core_action_after_page_header_meta_map', 'easymeals_core_add_top_area_meta_options', 20 );
}