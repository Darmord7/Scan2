<?php ?>

<div class="qodef-centered-header-top-wrapper">
<?php // Include logo
easymeals_core_get_header_logo_image(); ?>
</div>

<div class="qodef-centered-header-wrapper">
	<div class="qodef-widget-holder">
		<?php
		// Include widget area two
		if ( is_active_sidebar( 'qodef-header-widget-area-two' ) ) {
			easymeals_core_get_header_widget_area( '', 'two' );
		}
		?>
	</div>
	<?php
	// Include main navigation
	easymeals_core_template_part( 'header', 'templates/parts/navigation' );
	?>
	<div class="qodef-widget-holder">
		<?php
		// Include widget area two
		if ( is_active_sidebar( 'qodef-header-widget-area-one' ) ) {
			easymeals_core_get_header_widget_area( );
		}
		?>
	</div>
</div>
