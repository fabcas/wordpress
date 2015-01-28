<?php

class AQ_Portfolio_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Portfolio',
			'size' => 'span12',
			'resizable' => 0,
			'block_description' => 'Add your portfolio items<br />straight to the page.'
		);
		parent::__construct('aq_portfolio_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'type' => 'full-portfolio',
			'pppage' => '999',
			'filter' => 'all',
			'hide_filter' => 0
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$args = array(
			'orderby'                  => 'name',
			'hide_empty'               => 0,
			'hierarchical'             => 1,
			'taxonomy'                 => 'portfolio-category'
		); 
			
		$filter_options = get_categories( $args );
		
		$portfolio_types = array(
			'portfolio-full' => 'Fullscreen Portfolio',
			'portfolio-full-lightbox' => 'Fullscreen Portfolio (Lightbox)',
			'portfolio-grid' => 'Grid Portfolio (4 Columns)',
			'portfolio-grid-alt' => 'Grid Portfolio (3 Columns)',
			'portfolio-grid-lightbox' => 'Grid Portfolio (4 Columns)(Lightbox)',
			'portfolio-grid-alt-lightbox' => 'Grid Portfolio (3 Columns)(Lightbox)',
			'portfolio-masonry' => 'Masonry Portfolio (4 Columns)',
			'portfolio-masonry-alt' => 'Masonry Portfolio (3 Columns)',
			'portfolio-masonry-lightbox' => 'Masonry Portfolio Lightbox (4 Columns)',
			'portfolio-masonry-alt-lightbox' => 'Masonry Portfolio Lightbox (3 Columns)',
		);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('type') ?>">
				Portfolio Style
				<?php echo aq_field_select('type', $block_id, $portfolio_types, $type) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Load how many items? 999 for all. <code>Note: The Portfolio is not Paged</code>
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('filter') ?>">
				Show a specific portfolio category?
				<?php echo ebor_portfolio_field_select('filter', $block_id, $filter_options, $filter) ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('hide_filter') ?>">
				Hide Portfolio Filters?
				<?php echo aq_field_checkbox('hide_filter', $block_id, $hide_filter) ?>
			</label>
		</p>
		
	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		if(!( isset( $hide_filter ) ))
			$hide_filter = 0;
		
		$query_args = array(
			'post_type' => 'portfolio',
			'posts_per_page' => $pppage
		);
		
		if (!( $filter == 'all' )) {
			if( function_exists( 'icl_object_id' ) ){
				$filter = (int)icl_object_id( $filter, 'portfolio-category', true);
			}
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio-category',
					'field' => 'id',
					'terms' => $filter
				)
			);
		}
	
		$portfolio_query = new WP_Query( $query_args );

		if( $filter == 'all' ){
			$cats = get_categories('taxonomy=portfolio-category');
		} else {
			$cats = get_categories('taxonomy=portfolio-category&exclude='. $filter .'&child_of='. $filter);
		}
		
		if( 'portfolio-full' == $type ) {
	?>
		
		<div class="dark-wrapper">
			<div class="portfolio full-portfolio grid-portfolio">
			
				<?php if( !( empty($cats) ) && $hide_filter == 0 ) : ?>
					<div class="container inner bp0">
					    <?php ebor_portfolio_filters($cats); ?>
					</div>
				<?php endif; ?>
				
				<ul class="items">
					<?php 
						if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
							
							/**
							 * Get blog posts by blog layout.
							 */
							get_template_part('loop/content', 'portfolio-full');
						
						endwhile;	
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
						wp_reset_query();
					?>
				</ul><!-- /.items --> 
			
			</div><!-- /.portfolio -->
		</div>
			
	<?php	
		} elseif( 'portfolio-full-lightbox' == $type ) {
	?>
		
		<div class="dark-wrapper">
			<div class="portfolio full-portfolio grid-portfolio">
			
				<?php if( !( empty($cats) ) && $hide_filter == 0 ) : ?>
					<div class="container inner bp0">
					    <?php ebor_portfolio_filters($cats); ?>
					</div>
				<?php endif; ?>
				
				<ul class="items">
					<?php 
						if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
							
							/**
							 * Get blog posts by blog layout.
							 */
							get_template_part('loop/content', 'portfolio-full-lightbox');
						
						endwhile;	
						else : 
							
							/**
							 * Display no posts message if none are found.
							 */
							get_template_part('loop/content','none');
							
						endif;
						wp_reset_query();
					?>
				</ul><!-- /.items --> 
			
			</div><!-- /.portfolio -->
		</div>
		
	<?php	
		} elseif( 'portfolio-grid' == $type ) {
	?>
	
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>	
		
			<ul class="items col4">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-grid');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
	
	<?php	
		} elseif( 'portfolio-grid-alt' == $type ) {
	?>
	
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>
		
			<ul class="items col3">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-grid');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
	
	<?php	
		} elseif( 'portfolio-grid-lightbox' == $type ) {
	?>
	
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>
		
			<ul class="items col4">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-grid-lightbox');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
	
	<?php	
		} elseif( 'portfolio-grid-alt-lightbox' == $type ) {
	?>
		
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>
		
			<ul class="items col3">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-grid-lightbox');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
		
	<?php	
		} elseif( 'portfolio-masonry' == $type ) {
	?>
	
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>	
		
			<ul class="items col4">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-masonry');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
	
	<?php	
		} elseif( 'portfolio-masonry-alt' == $type ) {
	?>
	
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>
		
			<ul class="items col3">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-masonry');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
	
	<?php	
		} elseif( 'portfolio-masonry-lightbox' == $type ) {
	?>
	
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>
		
			<ul class="items col4">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-masonry-lightbox');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
	
	<?php	
		} elseif( 'portfolio-masonry-alt-lightbox' == $type ) {
	?>
		
		<div class="portfolio fix-portfolio grid-portfolio">
		
			<?php
				if( !( empty($cats) ) && $hide_filter == 0 )
					ebor_portfolio_filters($cats);
			?>
		
			<ul class="items col3">
				<?php 
					if ( $portfolio_query->have_posts() ) : while ( $portfolio_query->have_posts() ) : $portfolio_query->the_post();
						
						/**
						 * Get blog posts by blog layout.
						 */
						get_template_part('loop/content', 'portfolio-masonry-lightbox');
					
					endwhile;	
					else : 
						
						/**
						 * Display no posts message if none are found.
						 */
						get_template_part('loop/content','none');
						
					endif;
					wp_reset_query();
				?>
			</ul><!-- /.items --> 
			
		</div><!-- /.portfolio -->
		
	<?php
		}//end portfolio layout checks, phew
		
	}//end block
	
}//end class