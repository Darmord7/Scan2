<?php

if ( ! function_exists( 'easymeals_is_woo_page' ) ) {
	/**
	 * Function that check WooCommerce pages
	 *
	 * @param string $page
	 *
	 * @return bool
	 */
	function easymeals_is_woo_page( $page ) {
		switch ( $page ) {
			case 'shop':
				return function_exists( 'is_shop' ) && is_shop();
				break;
			case 'single':
				return is_singular( 'product' );
				break;
			case 'cart':
				return function_exists( 'is_cart' ) && is_cart();
				break;
			case 'checkout':
				return function_exists( 'is_checkout' ) && is_checkout();
				break;
			case 'account':
				return function_exists( 'is_account_page' ) && is_account_page();
				break;
			case 'category':
				return function_exists( 'is_product_category' ) && is_product_category();
				break;
			case 'tag':
				return function_exists( 'is_product_tag' ) && is_product_tag();
				break;
			case 'any':
				return (
					function_exists( 'is_shop' ) && is_shop() ||
					is_singular( 'product' ) ||
					function_exists( 'is_cart' ) && is_cart() ||
					function_exists( 'is_checkout' ) && is_checkout() ||
					function_exists( 'is_account_page' ) && is_account_page() ||
					function_exists( 'is_product_category' ) && is_product_category() ||
					function_exists( 'is_product_tag' ) && is_product_tag()
				);
				break;
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'easymeals_get_woo_main_page_classes' ) ) {
	/**
	 * Function that return current WooCommerce page class name
	 *
	 * @return string
	 */
	function easymeals_get_woo_main_page_classes() {
		$classes = array();

		if ( easymeals_is_woo_page( 'shop' ) ) {
			$classes[] = 'qodef--list';
		}

		if ( easymeals_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef--single';

			if ( easymeals_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'photo-swipe' ) {
				$classes[] = 'qodef-popup--photo-swipe';
			}

			if ( easymeals_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'magnific-popup' ) {
				$classes[] = 'qodef-popup--magnific-popup';
				// add classes to initialize lightbox from theme
				$classes[] = 'qodef-magnific-popup';
				$classes[] = 'qodef-popup-gallery';
			}
		}

		if ( easymeals_is_woo_page( 'cart' ) ) {
			$classes[] = 'qodef--cart';
		}

		if ( easymeals_is_woo_page( 'checkout' ) ) {
			$classes[] = 'qodef--checkout';
		}

		if ( easymeals_is_woo_page( 'account' ) ) {
			$classes[] = 'qodef--account';
		}

		return apply_filters( 'easymeals_filter_main_page_classes', implode( ' ', $classes ) );
	}
}

if ( ! function_exists( 'easymeals_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function easymeals_woo_get_global_product() {
		global $product;

		return $product;
	}
}

if ( ! function_exists( 'easymeals_woo_get_main_shop_page_id' ) ) {
	/**
	 * Function that return main shop page ID
	 *
	 * @return int
	 */
	function easymeals_woo_get_main_shop_page_id() {
		// Get page id from options table
		$shop_id = get_option( 'woocommerce_shop_page_id' );

		if ( ! empty( $shop_id ) ) {
			return $shop_id;
		}

		return false;
	}
}

if ( ! function_exists( 'easymeals_woo_set_main_shop_page_id' ) ) {
	/**
	 * Function that set main shop page ID for get_post_meta options
	 *
	 * @param int $post_id
	 *
	 * @return int
	 */
	function easymeals_woo_set_main_shop_page_id( $post_id ) {

		if ( easymeals_is_woo_page( 'shop' ) || easymeals_is_woo_page( 'single' ) || easymeals_is_woo_page( 'category' ) || easymeals_is_woo_page( 'tag' ) ) {
			$shop_id = easymeals_woo_get_main_shop_page_id();

			if ( ! empty( $shop_id ) ) {
				$post_id = $shop_id;
			}
		}

		return $post_id;
	}

	add_filter( 'easymeals_filter_page_id', 'easymeals_woo_set_main_shop_page_id' );
	add_filter( 'qode_framework_filter_page_id', 'easymeals_woo_set_main_shop_page_id' );
}

if ( ! function_exists( 'easymeals_woo_set_page_title_text' ) ) {
	/**
	 * Function that returns current page title text for WooCommerce pages
	 *
	 * @param string $title
	 *
	 * @return string
	 */
	function easymeals_woo_set_page_title_text( $title ) {

		if ( easymeals_is_woo_page( 'shop' ) || easymeals_is_woo_page( 'single' ) ) {
			$shop_id = easymeals_woo_get_main_shop_page_id();

			$title = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'easymeals' );
		} elseif ( easymeals_is_woo_page( 'category' ) || easymeals_is_woo_page( 'tag' ) ) {
			$taxonomy_slug = easymeals_is_woo_page( 'tag' ) ? 'product_tag' : 'product_cat';
			$taxonomy      = get_term( get_queried_object_id(), $taxonomy_slug );

			if ( ! empty( $taxonomy ) ) {
				$title = esc_html( $taxonomy->name );
			}
		}

		return $title;
	}

	add_filter( 'easymeals_filter_page_title_text', 'easymeals_woo_set_page_title_text' );
}

if ( ! function_exists( 'easymeals_woo_single_add_theme_supports' ) ) {
	/**
	 * Function that add native WooCommerce supports
	 */
	function easymeals_woo_single_add_theme_supports() {
		// Add featured image zoom functionality on product single page
		$is_zoom_enabled = easymeals_get_post_value_through_levels( 'qodef_woo_single_enable_image_zoom' ) !== 'no';

		if ( $is_zoom_enabled ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}

		// Add photo swipe lightbox functionality on product single images page
		$is_photo_swipe_enabled = easymeals_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'photo-swipe';

		if ( $is_photo_swipe_enabled ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
	}

	add_action( 'wp_loaded', 'easymeals_woo_single_add_theme_supports', 11 ); // permission 11 is set because options are init with permission 10 inside framework plugin
}

if ( ! function_exists( 'easymeals_woo_single_disable_page_title' ) ) {
	/**
	 * Function that disable page title area for single product page
	 *
	 * @param bool $enable_page_title
	 *
	 * @return bool
	 */
	function easymeals_woo_single_disable_page_title( $enable_page_title ) {
		$is_enabled = easymeals_get_post_value_through_levels( 'qodef_woo_single_enable_page_title' ) !== 'no';

		if ( ! $is_enabled && easymeals_is_woo_page( 'single' ) ) {
			$enable_page_title = false;
		}

		return $enable_page_title;
	}

	add_filter( 'easymeals_filter_enable_page_title', 'easymeals_woo_single_disable_page_title' );
}

if ( ! function_exists( 'easymeals_woo_single_thumb_images_position' ) ) {
	/**
	 * Function that changes the layout of thumbnails on single product page
	 */
	function easymeals_woo_single_thumb_images_position( $classes ) {
		$product_thumbnail_position = easymeals_is_installed( 'core' ) ? easymeals_get_post_value_through_levels( 'qodef_woo_single_thumb_images_position' ) : 'below';

		if ( ! empty( $product_thumbnail_position ) ) {
			$classes[] = 'qodef-position--' . $product_thumbnail_position;
		}

		return $classes;
	}

	add_filter( 'woocommerce_single_product_image_gallery_classes', 'easymeals_woo_single_thumb_images_position' );
}

if ( ! function_exists( 'easymeals_set_woo_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param string $sidebar_name
	 *
	 * @return string
	 */
	function easymeals_set_woo_custom_sidebar_name( $sidebar_name ) {
	
		if ( easymeals_is_woo_page( 'shop' ) || easymeals_is_woo_page( 'category' ) || easymeals_is_woo_page( 'tag' ) ) {
			$option = easymeals_get_post_value_through_levels( 'qodef_woo_product_list_custom_sidebar' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$sidebar_name = $option;
			}
		}

		return $sidebar_name;
	}

	add_filter( 'easymeals_filter_sidebar_name', 'easymeals_set_woo_custom_sidebar_name' );
}

if ( ! function_exists( 'easymeals_set_woo_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param string $layout
	 *
	 * @return string
	 */
	function easymeals_set_woo_sidebar_layout( $layout ) {
		
		if ( easymeals_is_woo_page( 'shop' ) || easymeals_is_woo_page( 'category' ) || easymeals_is_woo_page( 'tag' ) ) {
			$option = easymeals_get_post_value_through_levels( 'qodef_woo_product_list_sidebar_layout' );

			if ( isset( $option ) && ! empty( $option ) ) {
				$layout = $option;
			}
		}

		return $layout;
	}

	add_filter( 'easymeals_filter_sidebar_layout', 'easymeals_set_woo_sidebar_layout' );
}

if ( ! function_exists( 'easymeals_set_woo_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param string $classes
	 *
	 * @return string
	 */
	function easymeals_set_woo_sidebar_grid_gutter_classes( $classes ) {
		
		if ( easymeals_is_woo_page( 'shop' ) || easymeals_is_woo_page( 'category' ) || easymeals_is_woo_page( 'tag' ) ) {
			$option = easymeals_get_post_value_through_levels( 'qodef_woo_product_list_sidebar_grid_gutter' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}
		}

		return $classes;
	}

	add_filter( 'easymeals_filter_grid_gutter_classes', 'easymeals_set_woo_sidebar_grid_gutter_classes' );
}