<?php

class AQ_Testimonial_Feed_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Testimonial Feed',
			'size' => 'span12',
			'resizable' => false,
			'block_description' => 'Use to add blocks<br />of testimonials to page.'
		);
		
		//create the block
		parent::__construct('aq_testimonial_feed_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '4',
			'filter' => 'all',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'testimonial-category'
		); 
			
		$filter_options = get_categories( $args );
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Posts Per Page
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Show testimonials from a specific category?<br />
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$query_args = array(
			'post_type' => 'testimonial',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'testimonial-category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'testimonial-category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$testimonial_query = new WP_Query( $query_args );	
	?>
	
	<section class="timeline quotes">
	
		<?php 
			if ( $testimonial_query->have_posts() ) : while ( $testimonial_query->have_posts() ) : $testimonial_query->the_post();
			global $post;
		?>
			  
			  <div class="timeline-block">
			    <div class="timeline-img round"> 
			    	<?php the_post_thumbnail('testimonial'); ?>
			    </div>
			    
			    <div class="timeline-content">
			      <?php the_content(); ?>
			      <div class="cd-info">
			      	<?php the_title('<h4>', '</h4>'); ?>
			        <div class="biz-title"><?php echo get_post_meta($post->ID, '_ebor_the_job_title', 1); ?></div>
			      </div>
			    </div><!-- timeline-content --> 
			  </div> <!-- timeline-block --> 
		
		<?php	
			endwhile;
			else : 
				
				/**
				 * Display no posts message if none are found.
				 */
				get_template_part('loop/content','none');
				
			endif;
			wp_reset_query();
		?>
	
	</section><!-- timeline --> 
	
	<?php		
	}//end block
	
}//end class