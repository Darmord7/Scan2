<?php
// Hook to include additional content before page content holder
do_action( 'easymeals_action_before_page_content_holder' );
?>
<main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( easymeals_get_grid_gutter_classes() ); ?>">
	<div class="qodef-grid-inner clear">
		<?php
		// Include search template
		echo apply_filters( 'easymeals_filter_search_archive_template', easymeals_get_template_part( 'search', 'templates/search' ) );
		
		// Include page content sidebar
		easymeals_template_part( 'sidebar', 'templates/sidebar' );
		?>
	</div>
</main>
<?php
// Hook to include additional content after main page content holder
do_action( 'easymeals_action_after_page_content_holder' );
?>