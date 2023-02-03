<div class="qodef-e-media">
	<?php switch ( get_post_format() ) {
		case 'gallery':
			easymeals_template_part( 'blog', 'templates/parts/post-format/gallery' );
			break;
		case 'video':
			easymeals_template_part( 'blog', 'templates/parts/post-format/video' );
			break;
		case 'audio':
			easymeals_template_part( 'blog', 'templates/parts/post-format/audio' );
			break;
		default:
			easymeals_template_part( 'blog', 'templates/parts/post-info/image' );
			break;
	} ?>
</div>