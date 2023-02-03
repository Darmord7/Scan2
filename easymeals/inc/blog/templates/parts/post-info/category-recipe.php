<?php
$categories = wp_get_post_terms( get_the_ID(), 'recipe-category' );

if ( is_array( $categories ) && count( $categories ) ) { ?>
	<div class="qodef-e qodef-info--category">
		<div class="qodef-e-categories">
			<span class="qodef-icon-linear-icons lnr-tag lnr qodef-icon qodef-e"></span>
			<?php foreach ( $categories as $cat ) { ?>
				<a itemprop="url" class="qodef-e-category" href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>">
					<?php echo esc_html( $cat->name ); ?>
				</a>
			<?php } ?>
		</div>
	</div>
<?php }
