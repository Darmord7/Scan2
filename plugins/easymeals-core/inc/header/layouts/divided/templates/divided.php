<div class="qodef-divided-header-left-wrapper">
	<?php
	// Include widget area two
	if ( is_active_sidebar( 'qodef-header-widget-area-two' ) ) { ?>
		<div class="qodef-widget-holder">
			<?php easymeals_core_get_header_widget_area( '', 'two' ); ?>
		</div>
	<?php }
	
	// Include divided left navigation
	easymeals_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' ); ?>
</div>

<?php
// Include logo
easymeals_core_get_header_logo_image();
?>

<div class="qodef-divided-header-right-wrapper">
	<?php
	// Include divided right navigation
	easymeals_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );
	
	// Include widget area one
	if ( is_active_sidebar( 'qodef-header-widget-area-one' ) ) { ?>
		<div class="qodef-widget-holder">
			<?php easymeals_core_get_header_widget_area(); ?>
		</div>
	<?php } ?>
</div>


