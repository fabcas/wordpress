<?php 
	/**
	 * Make sure we can easily access the post ID
	 */
	global $post;
	
	/**
	 * Set up variables
	 */
	$attachments = get_post_meta( $post->ID, '_ebor_portfolio_gallery_list', true );
	$after = '</figure>';
	$i = 0;
	$count = count($attachments);
	
	if(!( is_single() )){
		$before = '<figure><a href="'. get_permalink() .'"><div class="text-overlay"><div class="info">'. get_option('blog_read_more', 'Read More') .'</div></div>';
		$after = '</a></figure>';
	}
	
	/**
	 * Everything is set up, let's make sure we have anything to work with.
	 */
	if ( is_array( $attachments ) ){ 
		
		/**
		 * Now loop through everything that we found and build our gallery
		 */
		foreach( $attachments as $attachment ){
			$i++;
			$image = wp_get_attachment_image_src($attachment, 'full');
			
			if( is_single() ){
				echo '<figure class="relative"><a href="'. $image[0] .'" class="image-link-list fancybox-media" rel="portfolio"><i class="icon icon-search"></i></a>';
			} else {
				echo $before;
			}
			echo wp_get_attachment_image($attachment, 'large'); 
			echo $after;
	
			if(!( $i == $count ))
				echo '<div class="divide40"></div>';
		}
	
	}