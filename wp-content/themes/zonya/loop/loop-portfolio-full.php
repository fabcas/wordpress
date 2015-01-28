<?php $cats = get_categories('taxonomy=portfolio-category'); ?>

<div class="light-wrapper">

	<div class="portfolio full-portfolio grid-portfolio">
		
		<?php if(!is_tax() && !empty($cats) ) : ?>
			<div class="container inner bp0">
			    <?php ebor_portfolio_filters($cats); ?>
			</div>
		<?php endif; ?>
		
		<ul class="items">
			<?php 
				if ( have_posts() ) : while ( have_posts() ) : the_post();
					
					/**
					 * Get blog posts by blog layout.
					 */
					get_template_part('loop/content', 'portfolio-full');
				
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
  
</div>