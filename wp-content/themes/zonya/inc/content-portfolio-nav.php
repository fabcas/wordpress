<?php
	$displays = get_option('ebor_cpt_display_options');
	$slug = ( $displays['portfolio_slug'] ) ? $displays['portfolio_slug'] : 'portfolio';
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
	
	echo '<a href="'. home_url($slug) .'" class="btn pull-left" title="Back">'. __('Back to Portfolio','zonya') .'</a>';
	
	next_post_link('%link', __('Next Post','zonya') );
	previous_post_link('%link', __('Prev Post','zonya') );
	
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 