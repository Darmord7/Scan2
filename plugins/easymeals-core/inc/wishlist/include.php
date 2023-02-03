<?php

include_once EASYMEALS_CORE_INC_PATH . '/wishlist/helper.php';

if ( ! function_exists( 'easymeals_core_wishlist_include_widgets' ) ) {
	/**
	 * Function that includes widgets
	 */
	function easymeals_core_wishlist_include_widgets() {
		if ( qode_framework_is_installed( 'membership' ) ) {
			foreach ( glob( EASYMEALS_CORE_INC_PATH . '/wishlist/widgets/*/include.php' ) as $widget ) {
				include_once $widget;
			}
		}
	}

	add_action( 'qode_framework_action_before_widgets_register', 'easymeals_core_wishlist_include_widgets' );
}

include_once EASYMEALS_CORE_INC_PATH . '/wishlist/profile/wishlist-profile-helper.php';
