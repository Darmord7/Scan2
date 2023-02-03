<?php
$nav_items     = easymeals_membership_get_dashboard_navigation_pages();
$link = $nav_items['my-wishlist']['url'];
?>
<a itemprop="url" href="<?php echo esc_url($link ); ?>" class="qodef-m-link">
	<?php echo qode_framework_icons()->render_icon( 'lnr-bookmark', 'linear-icons', array( 'icon_attributes' => array( 'class' => 'qodef-m-link-icon' ) ) ); ?>
	<span class="qodef-m-link-label"><?php echo esc_html__('Favourites', 'easymeals-core'); ?></span>
</a>
<div class="qodef-m-items">
	<?php if ( ! empty( $number_of_items ) ) {
		$items = easymeals_core_get_wishlist_items();
		
		foreach ( $items as $id => $title ) {
			$item_params          = array();
			$item_params['id']    = $id;
			$item_params['title'] = $title;
			
			easymeals_core_template_part( 'wishlist', 'widgets/wishlist-dropdown/templates/item', '', $item_params );
		}
	}
	?>
</div>