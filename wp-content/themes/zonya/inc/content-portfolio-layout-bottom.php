<?php
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
	
	/**
	 * Output the post title
	 */
	the_title( '<h1 class="post-title text-center">', '</h1>' );
	the_content();
	wp_link_pages();
?>

	<div class="text-center">
		<?php
			if( get_option('portfolio_share','1') == 1 )
				get_template_part('inc/content','sharing'); 
		?>
	
	<div class="divide25"></div>
    
		<?php
			/**
			 * The the required markup and meta for the chosen post format.
			 */
			if(!( post_password_required() ))
				get_template_part( 'postformats/format', get_post_format() );
		?>

	</div>
	
<?php		
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 