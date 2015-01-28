<?php 
	get_header(); 
	
	/**
	 * Get portfolio posts by layout.
	 */
	get_template_part('loop/loop', get_option('portfolio_layout', 'portfolio-carousel') ); 
	
	get_footer();