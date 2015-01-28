<?php 
  /**
   * Make sure we can access post data easily.
   */
  global $post;
  
  /**
   * Setup variables needed for the gallery
   */
  $attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );
  $before = '<div class="owl-carousel image-slider custom-controls">';
  $after = '</div>';
  
  /**
   * If we found items, output the gallery.
   * $before and $after change depending on the gallery chosen.
   */
  if ( is_array( $attachments ) ) : 
  
  	echo $before;
  		foreach( $attachments as $ID ){
  			$attachment = get_post($ID);
  			echo '<div class="item">' . wp_get_attachment_image( $attachment->ID, 'full' ) . '</div>';
  		}
  	echo $after;
  
  endif;