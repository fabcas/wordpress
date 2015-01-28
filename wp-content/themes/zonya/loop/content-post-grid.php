<div id="post-<?php the_ID(); ?>" class="post">

	<?php if( has_post_thumbnail() ) : ?>
		<figure>
			<a href="<?php the_permalink(); ?>">
				<div class="text-overlay">
					<div class="info"><?php echo get_option('blog_read_more', 'Read More'); ?></div>
				</div>
				<?php the_post_thumbnail('index'); ?>
			</a>
		</figure>
	<?php endif; ?>
	
	<div class="post-content">
		<?php 
			the_title('<h3 class="post-title entry-title"><a href="'. get_permalink() .'">', '</a></h3>'); 
			the_excerpt();
			get_template_part('inc/content','meta-footer');
		?>
	</div>

</div>