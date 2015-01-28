<div class="meta">

	<span class="date">
		<?php the_time( get_option('date_format') ); ?>
	</span> 
	
	<?php if( has_category() ) : ?>
		<span class="category">
			<?php the_category(', '); ?>
		</span>
	<?php endif; ?>
	
	<?php if( comments_open() ) : ?> 
		<span class="comments">
			<a href="<?php comments_link(); ?>"><?php comments_number( __('0 Comments','zonya'), __('1 Comment','zonya'), __('% Comments','zonya') ); ?></a>
		</span>
	<?php endif; ?>
	 
	<?php if( function_exists('zilla_likes') ) : ?>
		<span class="like"><?php zilla_likes(); ?></span> 
	<?php endif; ?>
	
</div>