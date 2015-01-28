<?php

class AQ_Sharing_Buttons_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Sharing Buttons',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-font"></i>',
			'block_description' => 'Use to add Social<br />Sharing Buttons to page.',
			'resizable' => false
		);
		
		//create the block
		parent::__construct('aq_sharing_buttons_block', $block_options);
	}
	
	function form($instance) {
		$defaults = array(
			'subtitle' =>''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title <code>optional</code>
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('subtitle') ?>">
				Subtitle <code>Optional</code>
				<?php echo aq_field_input('subtitle', $block_id, $subtitle, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance){
		extract($instance);
	?>
		
		<div class="text-center">
			<?php 
				if($title)
					echo '<h3 class="section-title large">'. htmlspecialchars_decode($title) .'</h3>';
					
				if( $subtitle )
					echo '<div class="lead large text-center">'. htmlspecialchars_decode($subtitle) .'</div>';
				
				get_template_part('inc/content','sharing'); 
			?>
		</div>
		
	<?php	
	}//end block
	
}//end class