<?php

class AQ_Fact_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Fact Counter Block',
			'size' => 'span3',
			'block_description' => 'Use to add a<br />Fact & Counter.'
		);
		
		//create the block
		parent::__construct('aq_fact_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'text' => '7518',
			'icon' => '',
			'icon_retina' => '',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Number
				<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Fact
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('icon') ?>">
				Upload Icon (Required)
				<?php echo aq_field_upload('icon', $block_id, $icon, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('icon_retina') ?>">
				Upload Retina Version of Icon
				<?php echo aq_field_upload('icon_retina', $block_id, $icon_retina, $media_type = 'image') ?>
			</label>
		</p>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
	?>
	
		<div class="text-center facts">
			
			<div class="icon-wrapper"> 
				<img src="<?php echo esc_url($icon); ?>" 
					 data-src="<?php echo esc_url($icon); ?>" 
					 data-ret="<?php echo esc_url($icon_retina); ?>" 
					 class="retina" 
					 alt="<?php echo $title; ?>" 
				/>
			</div>
			
			<?php
				if( $text )
					echo '<h4>' . htmlspecialchars_decode($text) . '</h4>';
					
				if( $title )
					echo wpautop( htmlspecialchars_decode($title) );
			?>
			
		</div>
	
	<?php		
	}//end block
	
}//end class