<div class="qodef-centered-reverse-header-wrapper">
	<div class="qodef-centered-reverse-top-wrapper qodef-content-grid">
		<?php
		// Include widget area two
		if ( is_active_sidebar( 'qodef-header-widget-area-two' ) ) { ?>
			<div class="qodef-widget-holder">
				<?php easymeals_core_get_header_widget_area( '', 'two' ); ?>
			</div>
		<?php }
		
		// Include main navigation
		easymeals_core_template_part( 'header', 'templates/parts/navigation' );
		
		// Include widget area one
		if ( is_active_sidebar( 'qodef-header-widget-area-one' ) ) { ?>
			<div class="qodef-widget-holder">
				<?php easymeals_core_get_header_widget_area(); ?>
			</div>
		<?php } ?>
	</div>
</div>
<div class="qodef-centered-reverse-logo-wrapper">
	<?php

	// Include logo
	easymeals_core_get_header_logo_image(); ?>
</div>