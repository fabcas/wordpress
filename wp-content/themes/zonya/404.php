<?php 
	/**
	 * 404.php
	 * @author TommusRhodus
	 * @package Zonya
	 * @since 1.0.0
	 */
	get_header(); 
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>
	
	<div class="row">
		<div class="col-sm-12 post-content">
	
			<div class="whoopsie-daisy-wrapper">
				<h1 class="whoopsie-daisy">
					<small><?php _e('Uh, Oh.','zonya'); ?></small>
					<?php _e('404','zonya'); ?>
				</h1>
				<a href="<?php echo home_url(); ?>"><?php _e('&larr; Head Home','zonya'); ?></a>
			</div>
			
	
		</div>
	</div>
	
<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();