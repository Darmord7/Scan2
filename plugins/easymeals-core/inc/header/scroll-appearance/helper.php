<?php

if ( ! function_exists( 'easymeals_core_dependency_for_scroll_appearance_options' ) ) {
	function easymeals_core_dependency_for_scroll_appearance_options() {
		$dependency_options = apply_filters( 'easymeals_core_filter_header_scroll_appearance_hide_option', $hide_dep_options = array() );
		
		return $dependency_options;
	}
}