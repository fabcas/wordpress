<?php 
	$cats = get_categories('taxonomy=portfolio-category'); 
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="portfolio fix-portfolio grid-portfolio">
	
		<?php
			if(!is_tax() && !empty($cats) )
				ebor_portfolio_filters($cats);
		?>
	
		<ul class="items col4">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					
					/**
					 * Get blog posts by blog layout.
					 */
					get_template_part('loop/content', 'portfolio-grid');
				
				endwhile;	
				else : 
					
					/**
					 * Display no posts message if none are found.
					 */
					get_template_part('loop/content','none');
					
				endif;
			?>
		</ul><!-- /.items --> 
		
	</div><!-- /.portfolio -->

<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end');