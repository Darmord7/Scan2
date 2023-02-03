<?php if ( $show_header_area ) { ?>
	<div id="qodef-top-area">
		<?php if($in_grid) { ?>
            <div id="qodef-top-area-inner" class="qodef-content-grid">
        <?php } ?>
                <?php
                // Include widget area top left
                if ( is_active_sidebar( 'qodef-top-area-left' ) ) { ?>
                    <div class="qodef-widget-holder qodef-top-area-left">
                        <?php easymeals_core_get_header_widget_area( 'top-area-left' ); ?>
                    </div>
                <?php } ?>

                <?php
                // Include widget area top right
                if ( is_active_sidebar( 'qodef-top-area-right' ) ) { ?>
                    <div class="qodef-widget-holder qodef-top-area-right">
                        <?php easymeals_core_get_header_widget_area( 'top-area-right' ); ?>
                    </div>
                <?php } ?>
        <?php if($in_grid) { ?>
            </div>
        <?php } ?>
		<?php do_action( 'easymeals_core_action_after_top_area' ); ?>
	</div>
<?php } ?>