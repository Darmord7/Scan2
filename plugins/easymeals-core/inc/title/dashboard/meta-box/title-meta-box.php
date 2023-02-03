<?php

if ( ! function_exists( 'easymeals_core_add_page_title_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function easymeals_core_add_page_title_meta_box( $page ) {

		if ( $page ) {

			$title_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-title',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Title Settings', 'easymeals-core' ),
					'description' => esc_html__( 'Title layout settings', 'easymeals-core' )
				)
			);

			$title_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_enable_page_title',
					'title'       => esc_html__( 'Enable Page Title', 'easymeals-core' ),
					'description' => esc_html__( 'Use this option to enable/disable page title', 'easymeals-core' ),
					'options'     => easymeals_core_get_select_type_options_pool( 'no_yes' )
				)
			);

			$page_title_section = $title_tab->add_section_element(
				array(
					'name'       => 'qodef_page_title_section',
					'title'      => esc_html__( 'Title Area', 'easymeals-core' ),
					'dependency' => array(
						'hide' => array(
							'qodef_enable_page_title' => array(
								'values'        => 'no',
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_title_layout',
					'title'       => esc_html__( 'Title Layout', 'easymeals-core' ),
					'description' => esc_html__( 'Choose a title layout', 'easymeals-core' ),
					'options'     => apply_filters( 'easymeals_core_filter_title_layout_options', $layouts = array( '' => esc_html__( 'Default', 'easymeals-core' ) ) )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_set_page_title_area_in_grid',
					'title'       => esc_html__( 'Page Title In Grid', 'easymeals-core' ),
					'description' => esc_html__( 'Enabling this option will set page title area to be in grid', 'easymeals-core' ),
					'options'     => easymeals_core_get_select_type_options_pool( 'no_yes' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height',
					'title'       => esc_html__( 'Height', 'easymeals-core' ),
					'description' => esc_html__( 'Enter title height', 'easymeals-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'easymeals-core' )
					)
				)
			);
			
			$page_title_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_page_title_height_on_smaller_screens',
					'title'       => esc_html__( 'Height on Smaller Screens', 'easymeals-core' ),
					'description' => esc_html__( 'Enter title height to be displayed on smaller screens with active mobile header', 'easymeals-core' ),
					'args'        => array(
						'suffix' => esc_html__( 'px', 'easymeals-core' )
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'color',
					'name'        => 'qodef_page_title_background_color',
					'title'       => esc_html__( 'Background Color', 'easymeals-core' ),
					'description' => esc_html__( 'Enter page title area background color', 'easymeals-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'  => 'image',
					'name'        => 'qodef_page_title_background_image',
					'title'       => esc_html__( 'Background Image', 'easymeals-core' ),
					'description' => esc_html__( 'Enter page title area background image', 'easymeals-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'select',
					'name'       => 'qodef_page_title_background_image_behavior',
					'title'      => esc_html__( 'Background Image Behavior', 'easymeals-core' ),
					'options'    => array(
						''           => esc_html__( 'Default', 'easymeals-core' ),
						'responsive' => esc_html__( 'Set Responsive Image', 'easymeals-core' ),
						'parallax'   => esc_html__( 'Set Parallax Image', 'easymeals-core' )
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type' => 'color',
					'name'       => 'qodef_page_title_color',
					'title'      => esc_html__( 'Title Color', 'easymeals-core' )
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_tag',
					'title'         => esc_html__( 'Title Tag', 'easymeals-core' ),
					'description'   => esc_html__( 'Enabling this option will set title tag', 'easymeals-core' ),
					'options'       => easymeals_core_get_select_type_options_pool( 'title_tag' ),
					'default_value' => '',
					'dependency'    => array(
						'show' => array(
							'qodef_title_layout' => array(
								'values'        => array( 'standard' ),
								'default_value' => ''
							)
						)
					)
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_text_alignment',
					'title'         => esc_html__( 'Text Alignment', 'easymeals-core' ),
					'options'       => array(
						''       => esc_html__( 'Default', 'easymeals-core' ),
						'left'   => esc_html__( 'Left', 'easymeals-core' ),
						'center' => esc_html__( 'Center', 'easymeals-core' ),
						'right'  => esc_html__( 'Right', 'easymeals-core' )
					),
					'default_value' => ''
				)
			);

			$page_title_section->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_title_vertical_text_alignment',
					'title'         => esc_html__( 'Vertical Text Alignment', 'easymeals-core' ),
					'options'       => array(
						''              => esc_html__( 'Default', 'easymeals-core' ),
						'header-bottom' => esc_html__( 'From Bottom of Header', 'easymeals-core' ),
						'window-top'    => esc_html__( 'From Window Top', 'easymeals-core' )
					),
					'default_value' => ''
				)
			);

			// Hook to include additional options after module options
			do_action( 'easymeals_core_action_after_page_title_meta_box_map', $page_title_section );
		}
	}

	add_action( 'easymeals_core_action_after_general_meta_box_map', 'easymeals_core_add_page_title_meta_box' );
	add_action( 'easymeals_core_action_after_portfolio_meta_box_map', 'easymeals_core_add_page_title_meta_box' );
}