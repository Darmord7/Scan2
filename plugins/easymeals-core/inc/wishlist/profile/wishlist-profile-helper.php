<?php

if ( ! function_exists( 'easymeals_core_add_wishlist_profile_navigation_item' ) ) {
	function easymeals_core_add_wishlist_profile_navigation_item( $items, $dashboard_url ) {
		$user = wp_get_current_user();

			$items['my-wishlist'] = array(
				'url'         => esc_url( add_query_arg( array( 'user-action' => 'my-wishlist' ), $dashboard_url ) ),
				'text'        => esc_html__( 'My Wishlist', 'easymeals-core' ),
				'user_action' => 'my-wishlist',
				'icon'        => '<span class="qodef-icon-linear-icons lnr-bookmark lnr"></span>'
			);
		
		return $items;
	}
	
	add_filter( 'easymeals_membership_filter_dashboard_navigation_pages', 'easymeals_core_add_wishlist_profile_navigation_item', 10, 2 );
}

if ( ! function_exists( 'easymeals_core_add_wishlist_profile_navigation_pages' ) ) {
	function easymeals_core_add_wishlist_profile_navigation_pages( $html, $action ) {
		
		if ( $action == 'my-wishlist' ) {
			$atts                = array();
			
			$html = easymeals_core_get_template_part( 'wishlist', '/profile/templates/my-wishlist', '', $atts );
		}
		
		return $html;
	}
	
	add_filter( 'easymeals_membership_filter_dashboard_page', 'easymeals_core_add_wishlist_profile_navigation_pages', 10, 2 );
}
