<?php
$wishlist_items = easymeals_core_get_wishlist_items();
?>
<div class="qodef-listing-profile-wishlist">
	<?php if ( ! empty( $wishlist_items ) ) { ?>
		<div class="qodef-lp-section-title">
			<h3 class="qodef-lp-st-title"><?php esc_html_e( 'My Wishlist', 'easymeals-core' ); ?></h3>
		</div>
		<?php
		$included_items = array();
		foreach ( $wishlist_items as $id => $title ) {
			$included_items[] = $id;
		}
		
		if ( ! empty( $included_items ) && class_exists( 'EasyMealsCoreRecipeListShortcode' ) ) {
			$shortcode_params = array(
				'number_of_columns' => 'four',
				'additional_params' => 'id',
				'post_ids'    => implode( ',', $included_items ),
				'enable_excerpt'    => 'no',
				'images_proportion'    => 'custom',
                'custom_image_width' => '500px',
                'custom_image_height' => '667px',
                'title_tag' => 'h4',
                'info_below_title_margin_bottom' => '20px',
			);
			echo EasyMealsCoreRecipeListShortcode::call_shortcode( apply_filters( 'easymeals_core_filter_wishlist_profile_page_params', $shortcode_params ) );
		}
	} else { ?>
		<h3 class="qodef-lp-not-found"><?php esc_html_e( 'Your wishlist is empty.', 'easymeals-core' ); ?> </h3>
	<?php } ?>
</div>