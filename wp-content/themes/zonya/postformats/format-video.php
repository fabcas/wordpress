<?php 
	if ( get_post_meta( $post->ID, "_ebor_the_video_1", true ) ) 
		echo '<figure class="media-wrapper player main full">' . wp_oembed_get( esc_url( get_post_meta( $post->ID, "_ebor_the_video_1", true ) ) ) . '</figure>';