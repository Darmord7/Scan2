<?php

if ( ! function_exists( 'easymeals_nav_item_classes' ) ) {
	/**
	 * Function that add additional classes for menu items
	 *
	 * @param array    $classes The CSS classes that are applied to the menu item's `<li>` element.
	 * @param WP_Post  $item The current menu item.
	 * @param stdClass $args An object of wp_nav_menu() arguments.
	 * @param int      $depth Depth of menu item. Used for padding.
	 *
	 * @return array
	 */
	function easymeals_nav_item_classes( $classes, $item, $args, $depth ) {

		if ( 0 === $depth && is_array( $item->classes ) && in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$classes[] = 'qodef-menu-item--narrow';
		}
		
		return $classes;
	}
	
	add_filter( 'nav_menu_css_class', 'easymeals_nav_item_classes', 10, 4 );
}
