<div class="about-author image-caption box">

  <div class="author-image">
  	<?php echo get_avatar( get_the_author_meta('email'), 120 ); ?>
  </div>
  
  <div class="author-details vcard author">
    <h4><?php echo get_option('author_details_title','About the author'); ?></h4>
    <?php 
    	echo sprintf(wpautop( '<span class="fn">%s</span>: %s' ), get_the_author(), get_the_author_meta('description')); 
    	get_template_part('inc/content', 'social');	
    ?>
  </div>
  
  <div class="clearfix"></div>
</div>

<hr />