<?php if ( comments_open() ) { ?>
	<div class="qodef-e-info-item qodef-e-info-comments">
		<a itemprop="url" class="qodef-e-info-comments-link" href="<?php comments_link(); ?>">
			<?php comments_number( '0 ' . esc_html__( 'Comments', 'easymeals' ), '1 ' . esc_html__( 'Comment', 'easymeals' ), '% ' . esc_html__( 'Comments', 'easymeals' ) ); ?>
		</a>
	</div>
<?php } ?>