<div class="light-wrapper">

	<?php
		/**
		 * The the required markup and meta for the chosen post format.
		 */
		if(!( post_password_required() ))
			get_template_part( 'postformats/format', get_post_format() );
	?>

	<div class="divide30"></div>
	<div class="container inner tp0">
	
		<?php
			/**
			 * Output the post title
			 */
			the_title( '<h1 class="post-title">', '</h1>' );
		?>
	    
		<div class="row">
		
			<div class="col-sm-8">
			
				<?php 
					the_content();
					wp_link_pages();
					
					if( get_option('portfolio_share','1') == 1 )
						get_template_part('inc/content','sharing'); 
				?>
			
			</div>
			
			<div class="col-sm-4 lp30">
				<?php 
					if(!( post_password_required() ))
						get_template_part('inc/content', 'portfolio-meta'); 
				?>
			</div>
			
		</div><!-- /.row --> 
	    
	</div>

</div>