<div class="footer-meta"> 
	<span class="date pull-left"><?php the_time( get_option('date_format') ); ?></span> 
	<?php if( function_exists('zilla_likes') ) : ?>
		<span class="like pull-right"><?php zilla_likes(); ?></span> 
	<?php endif; ?>
</div>