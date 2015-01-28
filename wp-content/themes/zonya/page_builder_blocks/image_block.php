<?php

class AQ_Image_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Image',
			'size' => 'span6',
			'block_icon' => '<i class="fa fa-camera"></i>',
			'block_description' => 'Use to add an Image<br />block to the page.'
		);
		parent::__construct('aq_image_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'image' => '',
			'lightbox' => '',
			'alt' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('image') ?>">
				Upload Image (Required)
				<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Link Image? Enter URL here.
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('lightbox') ?>">
				Upload Lightbox Image?<br /><code>Optional</code> - Note: Disables Link Option
				<?php echo aq_field_upload('lightbox', $block_id, $lightbox, $media_type = 'image') ?>
			</label>
		</p>
		
		<hr />
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Image "title" Attribute
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('alt') ?>">
				Image "alt" Attribute
				<?php echo aq_field_input('alt', $block_id, $alt, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		if(!( isset($lightbox) ))
			$lightbox = '';
			
		if(!( isset($alt) ))
			$alt = '';
	?>
				
		<?php if( $lightbox ) : ?>
			<figure>
				<a href="<?php echo esc_url($lightbox); ?>" class="fancybox-media" data-rel="image-block">
				<div class="text-overlay">
					<div class="info"><?php echo get_option('blog_view_larger','View Larger'); ?></div>
				</div>
		<?php elseif( $link ) : ?>
			<a href="<?php echo esc_url($link); ?>">
		<?php endif; ?>
		
			<img src="<?php echo $image; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
		
		<?php if( $link || $lightbox ) : ?>
			</a></figure>
		<?php endif; ?>
		
	<?php
	}//end block
	
}//end class