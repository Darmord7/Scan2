<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post format part
		easymeals_template_part( 'blog', 'templates/parts/post-format/link' ); ?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post category info
				easymeals_template_part( 'blog', 'templates/parts/post-info/category' );
				?>
			</div>
			<div class="qodef-e-text">
				<?php
				// Include post content
				the_content();
				
				// Hook to include additional content after blog single content
				do_action( 'easymeals_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post author info
					easymeals_template_part( 'blog', 'templates/parts/post-info/author' );
					
					// Include post date info
					easymeals_template_part( 'blog', 'templates/parts/post-info/date' );
					
					// Include post comments info
					easymeals_template_part( 'blog', 'templates/parts/post-info/comments' );
					?>
				</div>
				<div class="qodef-e-info-right">
					<?php
					// Include post tags info
					easymeals_template_part( 'blog', 'templates/parts/post-info/tags' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>