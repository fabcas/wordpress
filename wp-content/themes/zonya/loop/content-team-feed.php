<?php global $post; ?>
		  
<div id="team-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

  <div class="col-sm-5 rp20">
    <?php if( has_post_thumbnail() ) : ?>
    	<figure>
    		<a href="<?php the_permalink(); ?>">
    			<div class="text-overlay">
    				<div class="info"><?php the_title(); ?><br /><?php echo get_post_meta( $post->ID, '_ebor_the_job_title', true ); ?></div>
    			</div>
    			<?php the_post_thumbnail('index'); ?>
    		</a>
    	</figure>
    <?php endif; ?>
  </div>

  <div class="col-sm-7">
  
    <?php 
    	the_title('<h2 class="post-title">','</h2>');
    	the_content(); 
    ?>
    
    <div class="divide10"></div>
    
    <?php get_template_part('inc/content','social'); ?>
    
  </div>
  
</div>

<div class="divide20"></div>