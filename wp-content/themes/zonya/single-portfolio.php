<?php
	/**
	 * single-portfolio.php
	 * The single portfolio post display for Zonya
	 * @author TommusRhodus
	 * @package Zonya
	 * @since 1.0.0
	 */
	get_header();
	the_post();
			
	$layout = get_post_meta( $post->ID, '_ebor_layout_checkbox', true );
	
	/**
	 * Get the layout of this post depending on post meta
	 */
	get_template_part('inc/content', 'portfolio-layout-' . $layout);
	
	/**
	 * Get the related portfolio posts for this
	 */
	if( get_option('portfolio_related', '1') == '1' )
		get_template_part('loop/loop','portfolio-related');
	
	/**
	 * Get the nav for portfolio items, prev/next etc.
	 */
	get_template_part('inc/content', 'portfolio-nav');
	
	get_footer();