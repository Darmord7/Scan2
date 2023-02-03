<?php if ( get_the_posts_pagination() !== '' ): ?>

    <div class="qodef-m-pagination qodef--wp">
		<?php
		// Load posts pagination (in order to override template use navigation_markup_template filter hook)
		the_posts_pagination( array(
			'prev_text'          => easymeals_get_icon( 'lnr-chevron-left', 'linear-icons', esc_html__( '< Prev', 'easymeals' ) ),
			'next_text'          => easymeals_get_icon( 'lnr-chevron-right', 'linear-icons', esc_html__( 'Next >', 'easymeals' ) ),
			'before_page_number' => '',
		) ); ?>
    </div>

<?php endif; ?>