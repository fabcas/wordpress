<?php

class AQ_Parallax_Title_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Image Page Title',
			'size' => 'span12',
			'resizable' => false,
			'block_icon' => '<i class="fa fa-camera"></i>',
			'block_description' => 'Add a Parallax Image<br />title area to the page.'
		);
		parent::__construct('aq_parallax_title_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'image' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('image') ?>">
				Upload Background Image (Required)
				<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title <code>optional</code>
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Subtitle <code>optional</code>
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
				
		<div class="parallax" style="background-image: url(<?php echo $image; ?>);">
			<div class="container inner text-center">
				<?php 
					if( $title)
						echo '<h3 class="section-title large text-center">'. htmlspecialchars_decode($title) .'</h3>';
						
					if( $link )
						echo '<div class="lead large text-center">'. htmlspecialchars_decode( $link ) .'</div>';
				?>
			</div><!-- /.container --> 
		</div><!-- /.parallax -->
		
	<?php
	}//end block
	
}//end class