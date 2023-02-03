<?php

if ( ! function_exists( 'easymeals_core_header_radio_to_select_options' ) ) {
	function easymeals_core_header_radio_to_select_options( $radio_array ) {
		$select_array = array( '' => esc_html__( 'Default', 'easymeals-core' ) );

		foreach ( $radio_array as $key => $value ) {
			$select_array[ $key ] = $value['label'];
		}
		
		return $select_array;
	}
}