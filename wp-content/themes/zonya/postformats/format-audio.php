<figure class="media-wrapper player main full">
	<?php 
		if ( get_post_meta( $post->ID, "_ebor_the_video_1", true ) ){
			if (strpos( get_post_meta( $post->ID, "_ebor_the_video_1", true ),'soundcloud') !== false) {
				echo str_replace( array('visual=true', 'height="400"', 'width="500"'), array('','height="166" class="soundcloud"', 'width="100%"'), wp_oembed_get( esc_url( get_post_meta( $post->ID, "_ebor_the_video_1", true ) ) ) );
			} else {
				echo wp_oembed_get( esc_url( get_post_meta( $post->ID, "_ebor_the_video_1", true ) ) );	
			}
		}
	?>
</figure>