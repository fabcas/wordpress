<?php 
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
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
	
	<div class="row">
		<div class="col-sm-12 post-content">
	
			<?php	
				/**
				 * Output the page title
				 */
				the_title('<h2>', '</h2>');
				
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