<?php 
	$format = get_post_format();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php get_template_part('postformats/format', $format ); ?>
	
	<div class="post-content">
		<?php 
			the_title('<h2 class="post-title"><a href="'. get_permalink() .'">', '</a></h2>'); 
			get_template_part('inc/content','meta');
			if( $format == 'chat' || $format == 'quote' ){
				the_content();
			} else {
				echo wpautop( wp_trim_words( get_the_content(), 40) );
				echo '<a href="'. get_permalink() .'" class="more">'. get_option('blog_continue', 'Continue Reading') .' →</a>';
			}
		?>
	</div>

</div>