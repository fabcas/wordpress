<?php
	/**
	 * This loop is used to create items for the portfolio archives and also the homepage template.
	 * Any custom functions prefaced with ebor_ are found in /ebor_framework/theme_functions.php
	 * First let's declare $post so that we can easily grab everthing needed.
	 */
	 global $post;
	 
	 /**
	  * Next, we need to grab the featured image URL of this post, so that we can trim it to the correct size for the chosen size of this post.
	  */
	 $url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	 
	 if( get_option('portfolio_lightbox','0') == '1' )
	 	$url[0] = get_the_permalink();
	 
	 /**
	  * Leave this portfolio item out if we didn't find a featured image.
	  */
	 if(!( $url[0] ))
	 	return false;
	 	
	 if( get_post_format() == 'video' )
	 	$url[0] = get_post_meta( $post->ID, "_ebor_the_video_1", true );
	 	
	 $lightbox_gallery = get_option('lightbox_gallery', 'no');
	 $data_rel = ( 'yes' == $lightbox_gallery ) ? 'gallery-' . get_the_id() : 'lightbox';
?>

<li id="portfolio-<?php the_ID(); ?>" class="item thumb <?php echo ebor_the_isotope_terms(); ?>">
	<figure>
		<a href="<?php echo $url[0]; ?>" class="fancybox-media" data-rel="<?php echo $data_rel; ?>">
			<div class="text-overlay">
				<?php the_title('<div class="info">', '</div>'); ?>
			</div>
			<?php the_post_thumbnail('masonry'); ?>
		</a>
	</figure>
	
	<?php 
		if( 'yes' == $lightbox_gallery )
			get_template_part('inc/content', 'portfolio-lightbox-gallery'); 
	?>
	
</li>