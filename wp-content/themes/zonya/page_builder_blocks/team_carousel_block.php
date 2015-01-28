<?php

class AQ_Team_Carousel_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Team Carousel',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add a carousel of<br />team posts to the page.'
		);
		parent::__construct('aq_team_carousel_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'pppage' => '6',
			'filter' => 'all',
			'post_content' => 0,
			'links' => 0,
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
			'taxonomy'                 => 'team-category'
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
				Show a specific Team Category?
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('post_content') ?>">
				Use post content rather than excerpt?
				<?php echo aq_field_checkbox('post_content', $block_id, $post_content) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('links') ?>">
				Disable links to the single post?
				<?php echo aq_field_checkbox('links', $block_id, $links) ?>
			</label>
		</p>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$class = ( $title || $subtitle || $text || $button_text ) ? 'col-md-9 col-sm-12' : 'col-sm-12 col-4-carousel';
		
		$query_args = array(
			'post_type' => 'team',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'team-category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'team-category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$team_query = new WP_Query( $query_args );	
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
				<div class="owl-posts team">
				
				<?php 
					if ( $team_query->have_posts() ) : while ( $team_query->have_posts() ) : $team_query->the_post(); 
					global $post;	
					
					$before = '<a href="'. get_permalink() .'">';
					$after = '</a>';
					
					if( $links == 1 ){
						$before = '';
						$after = '';	
					}
				?>
						
						<div id="team-<?php the_ID(); ?>" class="item post">
						  
						  <?php if( has_post_thumbnail() ) : ?>
						  	<figure>
						  		<?php echo $before; ?>
						  			<?php if( $before ) : ?>
						  				<div class="text-overlay">
						  					<div class="info"><?php the_title(); ?></div>
						  				</div>
						  			<?php endif; ?>
						  			<?php the_post_thumbnail('index'); ?>
						  		<?php echo $after; ?>
						  	</figure>
						  <?php endif; ?>
						  
						  <div class="post-content">
						    <?php 
						    	the_title('<h3 class="post-title">' . $before, $after . '</h3>'); 
						    	echo '<div class="biz-title">'. get_post_meta( $post->ID, '_ebor_the_job_title', true ) .'</div>';
						    	($post_content == 1) ? the_content() : the_excerpt();
						    	get_template_part('inc/content', 'social');	
						    ?>
						  </div><!-- /.post-content --> 
						  
						</div>
					
				<?php
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
				?>
				</div><!-- /.team --> 
			</div><!-- /.col --> 
			
		</div><!-- /.row --> 
			
	<?php	
	}//end block
	
}//end class