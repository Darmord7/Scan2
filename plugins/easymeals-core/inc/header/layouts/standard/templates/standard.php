<div class="qodef-standard-header-top-wrapper">
<?php
// Include logo
easymeals_core_get_header_logo_image();
// Include widget area one
if ( is_active_sidebar( 'qodef-header-widget-area-one' ) ) { ?>
	<div class="qodef-widget-holder">
		<?php easymeals_core_get_header_widget_area(); ?>
	</div>
<?php } ?>
</div>
<div class="qodef-standard-header-bottom-wrapper">
<?php
// Include main navigation
easymeals_core_template_part( 'header', 'templates/parts/navigation' );
if ( is_active_sidebar( 'qodef-header-widget-area-two' ) ) { ?>
	<div class="qodef-widget-holder">
		<?php easymeals_core_get_header_widget_area( '', 'two' ); ?>
	</div>
<?php }
?>
</div>