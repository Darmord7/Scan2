<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post media
		easymeals_template_part( 'blog', 'templates/parts/post-info/media' );
		?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post category info
				easymeals_template_part( 'blog', 'templates/parts/post-info/meta-recipe' );
				// Include post category info
				easymeals_template_part( 'blog', 'templates/parts/post-info/category-recipe' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post title
				easymeals_template_part( 'blog', 'templates/parts/post-info/title', '', array( 'title_tag' => 'h3' ) );

				// Include post excerpt
				easymeals_template_part( 'blog', 'templates/parts/post-info/excerpt' );

				// Hook to include additional content after blog single content
				do_action( 'easymeals_action_after_blog_single_content' );
				?>
			</div>
		</div>
	</div>
</article>