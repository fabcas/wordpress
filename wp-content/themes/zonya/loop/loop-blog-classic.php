<?php
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="row">
	
		<div class="col-sm-8 content">
		
			<div class="blog-posts classic-blog">
				
				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'post-classic');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
			
			</div><!-- /.blog-posts -->
			
			<?php 
				/**
				 * Post pagination, use ebor_pagination() first and fall back to default
				 */
				echo function_exists('ebor_pagination') ? ebor_pagination() : posts_nav_link();
			?>
		
		</div><!-- /.content -->
		
		<?php get_sidebar(); ?>
	
	</div><!-- /.row -->

<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 