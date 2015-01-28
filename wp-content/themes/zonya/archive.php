<?php
	/**
	 * search.php
	 * The searched post loop in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header();
	
	$term = get_queried_object();
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start-dark');
?>

	<p class="lead main"><?php _e('Posts In','zonya'); ?>: <?php echo $term->name; ?></p>
	 
<?php
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start');
	
	/**
	 * Get the blog layout
	 */
	get_template_part('loop/loop', get_option('blog_layout','blog-grid-sidebar') ); 

	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();