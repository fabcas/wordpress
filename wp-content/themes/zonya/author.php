<?php
	/**
	 * search.php
	 * The searched post loop in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header();
	
	$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start-dark');
?>

	<p class="lead main"><?php _e('Posts By','zonya'); ?>: <?php echo $author->display_name; ?></p>
	 
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