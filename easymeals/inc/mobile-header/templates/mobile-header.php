<header id="qodef-page-mobile-header">
	<?php
	// Hook to include additional content before page mobile header inner
	do_action( 'easymeals_action_before_page_mobile_header_inner' );
	?>
	<div id="qodef-page-mobile-header-inner">
        <div class="qodef-page-mobile-header-holder qodef-content-grid">
            <?php
            // Include module content template
            echo apply_filters( 'easymeals_filter_mobile_header_content_template', easymeals_get_template_part( 'mobile-header', 'templates/mobile-header-content' ) ); ?>
        </div>
    </div>
	<?php
	// Hook to include additional content after page mobile header inner
	do_action( 'easymeals_action_after_page_mobile_header_inner' );
	?>
</header>