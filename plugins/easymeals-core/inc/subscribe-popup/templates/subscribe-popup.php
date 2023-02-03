<?php
    $background_image = easymeals_core_get_option_value( 'admin', 'qodef_subscribe_popup_background_image' );
?>
<div id="qodef-subscribe-popup-modal" class="qodef-sp-holder <?php echo esc_attr( $holder_classes ); ?>">
    <div class="qodef-content-grid">
		<?php if ( ! empty( $title ) ) : ?>
            <h3 class="qodef-sp-title">
				<?php echo esc_html( $title ); ?>
            </h3>
		<?php endif; ?>

		<?php echo do_shortcode( '[contact-form-7 id="' . $contact_form . '"]' ); ?>

		<?php if ( $enable_prevent === 'yes' ) : ?>
            <div class="qodef-sp-prevent">
                <div class="qodef-sp-prevent-inner">
                    <span class="qodef-sp-prevent-input" data-value="no">
                        <?php echo qode_framework_icons()->render_icon( 'dripicons-checkmark', 'dripicons' ); ?>
                    </span>
                    <label class="qodef-sp-prevent-label"><?php esc_html_e( 'Prevent This Pop-up', 'easymeals-core' ); ?></label>
                </div>
            </div>
		<?php endif; ?>
    </div>
	<a class="qodef-sp-close" href="javascript:void(0)">
		<?php echo qode_framework_icons()->render_icon( 'lnr-cross', 'linear-icons' ); ?>
	</a>
</div>