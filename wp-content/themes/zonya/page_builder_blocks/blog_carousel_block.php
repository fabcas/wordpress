<?php

class AQ_Blog_Carousel_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Blog Carousel',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a carousel of<br />blog posts to the page.'
		);
		parent::__construct('aq_blog_carousel_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '6',
			'filter' => 'all',
			'subtitle' => '',
			'text' => '',
			'button_text' => '',
			'button_url' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'category'
		); 
			
		$filter_options = get_categories( $args );
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title <code>Optional</code>
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('subtitle') ?>">
				Subtitle <code>Optional</code>
				<?php echo aq_field_input('subtitle', $block_id, $subtitle, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content <code>Optional</code>
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full', true) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('button_text') ?>">
				Button Text <code>Optional, if entered a button will appear under the content.</code>
				<?php echo aq_field_input('button_text', $block_id, $button_text, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('button_url') ?>">
				Button URL
				<?php echo aq_field_input('button_url', $block_id, $button_url, $size = 'full') ?>
			</label>
		</p>
		
		<hr />
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Load how many posts?
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Show posts from a specific category?<br />
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$class = ( $title || $subtitle || $text || $button_text ) ? 'col-md-9 col-sm-12' : 'col-sm-12 col-4-carousel';
		
		$query_args = array(
			'post_type' => 'post',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$blog_query = new WP_Query( $query_args );
	?>
	
		<div class="row">
		
			<?php if( $title || $subtitle || $text || $button_text ) : ?>
				<div class="col-md-3 col-sm-12">
					<?php
						if( $title )
							echo '<h3 class="section-title">'. htmlspecialchars_decode($title) .'</h3>';
							
						if( $subtitle )
							echo '<div class="lead bm25">'. htmlspecialchars_decode($subtitle) .'</div>';
							
						if( $text )
							echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
							
						if( $button_text )
							echo '<div class="divide20"></div><a href="'. esc_url($button_url) .'" class="btn">'. htmlspecialchars_decode($button_text) .'</a>';
					?>
				</div><!-- /.col -->
			<?php endif; ?>
			
			<div class="<?php echo $class; ?>">
				<div class="owl-posts">
				
					<?php 
						if ( $blog_query->have_posts() ) : while ( $blog_query->have_posts() ) : $blog_query->the_post(); 
							
							/**
							 * Get blog carousel post markup
							 */
							get_template_part('loop/content','post-carousel');
					
						endwhile;
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
						wp_reset_query();
					?>
					
				</div>
			</div>
			
		</div>
			
	<?php	
	}//end block
	
}//end class