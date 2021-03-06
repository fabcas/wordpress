<?php 
	/*
	Template Name: Page Builder - Sidebar
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
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
	
	<div class="row">
		<div class="col-sm-8 post-content page-with-sidebar">
			<div class="row">
			
				<?php the_content(); ?>
			
			</div>
		</div>
		
		<?php get_sidebar('page'); ?>
	</div>
	
<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();