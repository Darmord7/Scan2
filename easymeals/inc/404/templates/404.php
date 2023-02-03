<?php

// Hook to include additional content before 404 page content
do_action( 'easymeals_action_before_404_page_content' );

// Include module content template
echo apply_filters( 'easymeals_filter_404_page_content_template', easymeals_get_template_part( '404', 'templates/404-content', '', easymeals_get_404_page_parameters() ) );

// Hook to include additional content after 404 page content
do_action( 'easymeals_action_after_404_page_content' );