<?php
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="row">
		<div class="col-sm-8 content">
			<div class="grid-blog col2">
				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'post-grid');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
			</div><!--/.grid-blog -->
			
			<?php
				/**
				 * Post pagination, use ebor_pagination() first and fall back to default
				 */
				echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
			?>
			
		</div>
		
		<?php get_sidebar(); ?>
		
	</div>
      
<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 