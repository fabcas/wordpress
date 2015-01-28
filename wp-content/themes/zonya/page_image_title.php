<?php 
	/*
	Template Name: Page With Image Title
	*/
	
	/**
	 * page.php
	 * The default page template in Zonya
	 * @author TommusRhodus
	 * @package Zonya
	 * @since 1.0.0
	 */
	get_header(); 
	the_post();
	
	/**
	 * Next, we need to grab the featured image URL of this post, so that we can trim it to the correct size for the chosen size of this post.
	 */
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	
	/**
	 * Avoid PHP errors if we didn't find a featured image.
	 */
	if(!( $url[0] ))
		$url[0] = '';
?>

	<div class="parallax" style="background-image: url(<?php echo $url[0]; ?>);">
		<div class="container inner text-center">
			<?php the_title('<h3 class="section-title large text-center">', '</h3>'); ?>
			<div class="lead large text-center"><?php echo get_post_meta($post->ID, '_ebor_page_subtitle', 1); ?></div>
		</div><!-- /.container --> 
	</div><!-- /.parallax -->
	
<?php	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
	
	<div class="row">
		<div class="col-sm-12">
	
			<?php	
				the_content();
				wp_link_pages();
			?>
	
		</div>
	</div>
	
<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();