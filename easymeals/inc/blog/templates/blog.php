<div class="qodef-grid-item <?php echo esc_attr( easymeals_get_page_content_sidebar_classes() ); ?>">
	<?php
	// Hook to include additional content before blog loop
	do_action( 'easymeals_action_before_blog_loop' );
	?>
	<div class="qodef-blog qodef-m <?php echo esc_attr( easymeals_get_blog_holder_classes() ); ?>">
		<?php
		// Include posts loop
		easymeals_template_part( 'blog', 'templates/parts/loop' );
		
		if ( ! is_single() ) {
			// Include pagination
			easymeals_template_part( 'pagination', 'templates/pagination-infinite-scroll' );
		}
		?>
	</div>
</div>