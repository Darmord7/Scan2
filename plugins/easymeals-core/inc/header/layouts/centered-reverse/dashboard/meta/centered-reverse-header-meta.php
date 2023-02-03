<?php

if ( ! function_exists( 'easymeals_core_add_centered_reverse_header_meta' ) ) {
	function easymeals_core_add_centered_reverse_header_meta( $page ) {
		
		$section = $page->add_section_element(
			array(
				'name'       => 'qodef_centered_reverse_header_section',
				'title'      => esc_html__( 'Centered Reverse Header', 'easymeals-core' ),
				'dependency' => array(
					'show' => array(
						'qodef_header_layout' => array(
							'values' => 'centered-reverse',
							'default_value' => ''
						)
					)
				)
			)
		);
		
		$section->add_field_element(
			array(
				'field_type'  => 'text',
				'name'        => 'qodef_centered_reverse_header_height',
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
				'name'        => 'qodef_centered_reverse_header_background_color',
				'title'       => esc_html__( 'Header Background Color', 'easymeals-core' ),
				'description' => esc_html__( 'Enter header background color', 'easymeals-core' ),
				'args'        => array(
					'suffix' => esc_html__( 'px', 'easymeals-core' )
				)
			)
		);

        $section->add_field_element(
            array(
                'field_type'    => 'select',
                'name'          => 'qodef_centered_reverse_header_enable_before_widget_area',
                'title'         => esc_html__( 'Enable Widget Area Before Header', 'easymeals-core' ),
                'description'   => esc_html__( 'Choose if you want to show custom widget area before header', 'easymeals-core' ),
                'options'     => easymeals_core_get_select_type_options_pool( 'no_yes' ),
            )
        );

        $custom_sidebars = easymeals_core_get_custom_sidebars();
        if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {

            $section->add_field_element(
                array(
                    'field_type'  => 'select',
                    'name'        => 'qodef_centered_reverse_header_before_widget_area',
                    'title'       => esc_html__( 'Choose Custom Widget Area', 'easymeals-core' ),
                    'options'     => $custom_sidebars,
                    'dependency' => array(
                        'show' => array(
                            'qodef_centered_reverse_header_enable_before_widget_area' => array(
                                'values'        => 'yes',
                                'default_value' => ''
                            )
                        )
                    )
                )
            );
        }
	}
	
	add_action( 'easymeals_core_action_after_page_header_meta_map', 'easymeals_core_add_centered_reverse_header_meta' );
}