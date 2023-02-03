<?php
$video_meta = get_post_meta( get_the_ID(), 'qodef_recipe_video_url', true );

$preparation_time = get_post_meta( get_the_ID(), 'qodef_recipe_preparation_time', true);
$difficulty = get_post_meta( get_the_ID(), 'qodef_recipe_single_difficulty', true);

if( ! empty ( $video_meta ) ) {
	$video_id = attachment_url_to_postid($video_meta);
	$video_metadata = get_post_meta( $video_id , '_wp_attachment_metadata', true ); ?>
	<p class="qodef-recipe-video-length">
		<span class="lnr lnr-camera-video"></span>
		<?php echo esc_html($video_metadata['length_formatted']);  ?>
	</p>
<?php } else {
	if( ! empty( $preparation_time ) ) { ?>
		<p class="qodef-recipe-prep-time">
			<span class="qodef-icon-linea-icons icon-basic-clock qodef-icon qodef-e"></span>
			<?php echo esc_html( $preparation_time ); ?>
		</p>
	<?php }

	if( ! empty( $difficulty ) ) { ?>
		<p class="qodef-recipe-difficulty">
			<span class="qodef-icon-linear-icons lnr-thumbs-up lnr qodef-icon qodef-e"></span>
			<?php echo esc_html( $difficulty ); ?>
		</p>
	<?php }
}