<?php 
	global $post;
?>

<div id="team-<?php the_ID(); ?>" class="item post">
  
  <?php if( has_post_thumbnail() ) : ?>
  	<figure>
  		<a href="<?php the_permalink(); ?>">
  			<div class="text-overlay">
  				<?php the_title('<div class="info">', '</div>'); ?>
  			</div>
  			<?php the_post_thumbnail('portfolio'); ?>
  		</a>
  	</figure>
  <?php endif; ?>
  
  <div class="post-content">
    <?php 
    	the_title('<h3 class="post-title">', '</h3>');
    	echo '<div class="biz-title">'. get_post_meta( $post->ID, '_ebor_the_job_title', true ) .'</div>';
    	the_excerpt();
    	get_template_part('inc/content', 'social');	
    ?>
  </div><!-- /.post-content --> 
  
</div>