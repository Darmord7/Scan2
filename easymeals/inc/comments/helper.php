<?php

if ( ! function_exists( 'easymeals_include_comments_in_templates' ) ) {
	/**
	 * Function which includes comments templates on pages/posts
	 */
	function easymeals_include_comments_in_templates() {

		// Include comments template
		comments_template();
	}

	add_action( 'easymeals_action_after_page_content', 'easymeals_include_comments_in_templates', 100 ); // permission 100 is set to comments template be at the last place
	add_action( 'easymeals_action_after_blog_post_item', 'easymeals_include_comments_in_templates', 100 );
}

if ( ! function_exists( 'easymeals_is_page_comments_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 */
	function easymeals_is_page_comments_enabled() {
		$is_enabled = apply_filters( 'easymeals_filter_enable_page_comments', true );

		return $is_enabled;
	}
}

if ( ! function_exists( 'easymeals_load_page_comments' ) ) {
	/**
	 * Function which loads page template module
	 */
	function easymeals_load_page_comments() {

		if ( easymeals_is_page_comments_enabled() ) {
			easymeals_template_part( 'comments', 'templates/comments' );
		}
	}

	add_action( 'easymeals_action_page_comments_template', 'easymeals_load_page_comments' );
}

if ( ! function_exists( 'easymeals_get_comments_list_template' ) ) {
	/**
	 * Function which modify default WordPress comments list template
	 *
	 * @param object $comment
	 * @param array $args
	 * @param int $depth
	 *
	 * @return string that contains comments list html
	 */
	function easymeals_get_comments_list_template( $comment, $args, $depth ) {
		global $post;
		$GLOBALS['comment'] = $comment;

		$classes = array();

		$is_author_comment = $post->post_author == $comment->user_id;
		if ( $is_author_comment ) {
			$classes[] = 'qodef-comment--author';
		}

		$is_specific_comment = $comment->comment_type == 'pingback' || $comment->comment_type == 'trackback';
		if ( $is_specific_comment ) {
			$classes[] = 'qodef-comment--no-avatar';
			$classes[] = 'qodef-comment--' . esc_attr( $comment->comment_type );
		}
		?>
    <li class="qodef-comment-item qodef-e <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
        <div id="comment-<?php comment_ID(); ?>" class="qodef-e-inner">
			<?php if ( ! $is_specific_comment ) { ?>
                <div class="qodef-e-image"><?php echo get_avatar( $comment, 48 ); ?></div>
			<?php } ?>
            <div class="qodef-e-content">
                <span class="qodef-e-title vcard"><?php echo sprintf( '<span class="fn">%s%s</span>', $is_specific_comment ? sprintf( '%s: ', esc_attr( ucwords( $comment->comment_type ) ) ) : '', get_comment_author_link() ); ?></span>
                <div class="qodef-e-date commentmetadata">
                    <a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>"><?php comment_time( get_option( 'date_format' ) ); ?></a>
                </div>
				<?php if ( ! $is_specific_comment ) { ?>
                    <p class="qodef-e-text"><?php comment_text(); ?></p>
				<?php } ?>
                <div class="qodef-e-links">
					<?php
					comment_reply_link( array_merge( $args, array(
						'reply_text' => esc_html__( 'Reply', 'easymeals' ),
						'depth'      => $depth,
						'max_depth'  => $args['max_depth'],
					) ) );

					edit_comment_link( esc_html__( 'Edit', 'easymeals' ) ); ?>
                </div>
            </div>
        </div>
		<?php //li tag will be closed by WordPress after looping through child elements ?>
		<?php
	}
}