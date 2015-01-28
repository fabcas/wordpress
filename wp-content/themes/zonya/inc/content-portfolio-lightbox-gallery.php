<?php

/**
* Make sure we can access post data easily.
*/
global $post;

/**
* Setup variables needed for the gallery
*/
$attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );

/**
* If we found items, output the gallery.
* $before and $after change depending on the gallery chosen.
*/
if ( is_array( $attachments ) ){

		foreach( $attachments as $ID ){
			$attachment = get_post($ID);
			$url = wp_get_attachment_image_src( $attachment->ID, 'full' );
			echo '<a href="'. $url[0] .'" class="fancybox-media" data-rel="gallery-'. $post->ID .'" style="display:none;"></a>';
		}

}