<?php
if ( ! function_exists( 'easymeals_core_add_centered_reverse_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	
	function easymeals_core_add_centered_reverse_header_global_option( $header_layout_options ) {
		$header_layout_options['centered-reverse'] = array(
			'image' => EASYMEALS_CORE_HEADER_LAYOUTS_URL_PATH . '/centered-reverse/assets/img/centered-reverse-header.png',
			'label' => esc_html__( 'Centered Reverse ', 'easymeals-core' )
		);
		
		return $header_layout_options;
	}
	
	add_filter( 'easymeals_core_filter_header_layout_option', 'easymeals_core_add_centered_reverse_header_global_option' );
}


if ( ! function_exists( 'easymeals_core_register_centered_reverse_header_layout' ) ) {
	function easymeals_core_register_centered_reverse_header_layout( $header_layouts ) {
		$header_layout = array(
			'centered-reverse' => 'CenteredReverseHeader'
		);
		
		$header_layouts = array_merge( $header_layouts, $header_layout );
		
		return $header_layouts;
	}
	
	add_filter( 'easymeals_core_filter_register_header_layouts', 'easymeals_core_register_centered_reverse_header_layout');
}

if ( ! function_exists( 'easymeals_core_centered_reverse_header_widget_area_before' ) ) {
    function easymeals_core_centered_reverse_header_widget_area_before() {
        $area_enabled = easymeals_core_get_post_value_through_levels( 'qodef_centered_reverse_header_enable_before_widget_area' ) === 'yes';
        $custom_widget_area = easymeals_core_get_post_value_through_levels('qodef_centered_reverse_header_before_widget_area');
        if($area_enabled) {
            if($custom_widget_area !== '') {
                if ( is_active_sidebar( $custom_widget_area ) ) { ?>
                    <div class="qodef-before-header-widget-holder">
                        <?php dynamic_sidebar( $custom_widget_area ); ?>
                    </div>
                <?php }
            }
        }
    }

    add_action( 'easymeals_action_before_page_header', 'easymeals_core_centered_reverse_header_widget_area_before' );
}