<?php 
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="row">
		<div class="col-sm-12">
			<div class="owl-posts ebor-cat-catch" data-parent="archive">
				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-carousel');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
			</div>
		</div><!-- /.col --> 
		
	</div><!-- /.row -->

<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end');