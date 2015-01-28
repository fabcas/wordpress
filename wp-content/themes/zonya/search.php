<?php
	/**
	 * search.php
	 * The searched post loop in loom
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
	get_header();
	
	global $wp_query;
	$total_results = $wp_query->found_posts;
	( $total_results == '1' ) ? $items = __('Item','zonya') : $items = __('Items','zonya'); 
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start-dark');
?>

	<p class="lead main"><?php echo sprintf( __('Your Search For','zonya') . ': <em>%s</em>, ' . __( 'returned:', 'zonya' ) . ' <em>%s %s</em> ', get_search_query(), $total_results, $items); ?></p>
	 
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