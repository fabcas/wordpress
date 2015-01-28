<?php
	/**
	 * single.php
	 * The single blog post template in Zonya
	 * @author TommusRhodus
	 * @package Zonya
	 * @since 1.0.0
	 */
	get_header();
	the_post();
	
	$sidebar = ( is_active_sidebar('primary') ) ? 'col-sm-8' : 'col-sm-12';
	
	/**
	 * Get Wrapper Start - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','start'); 
?>

	<div class="row">
		<div class="<?php echo $sidebar; ?> content">
			<div class="classic-blog single">
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php get_template_part( 'postformats/format', get_post_format() ); ?>
					
					<div class="post-content">
						<?php
							the_title('<h1 class="post-title">', '</h1>');
							get_template_part('inc/content','meta');
							the_content();
							wp_link_pages();
						?>
							
							<div class="meta tags">
								<?php the_tags('', ', ', ''); ?>
							</div>
							
						<?php
							if( get_option('blog_social','1') == 1 )
								get_template_part('inc/content','sharing');
						?>
					</div>
					
				</div><!--/.post -->
			
				<?php 
					if( get_option('blog_author','1') == 1 )
						get_template_part('inc/content','author'); 
				
					if( comments_open() ) 
						comments_template(); 
				?>
			
			</div><!--/.grid-blog -->
		</div><!-- /.content -->     
	
		<?php 
			if( is_active_sidebar('primary') )
				get_sidebar(); 
		?>
	
	</div><!-- /.row --> 
  
<?php 
	/**
	 * Get Wrapper End - Uses get_template_part for simple child themeing.
	 */
	get_template_part('inc/wrapper','end'); 
	
	get_footer();