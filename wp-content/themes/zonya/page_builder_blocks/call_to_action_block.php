<?php

class AQ_Call_To_Action_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Call to Action',
			'size' => 'span12',
			'block_icon' => '<i class="icon-picons-font"></i>',
			'block_description' => 'Use to add Text<br />HTML or shortcodes.'
		);
		
		//create the block
		parent::__construct('aq_call_to_action_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'lead' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('lead') ?>">
				Lead Text
				<?php echo aq_field_input('lead', $block_id, $lead, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Button Text
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Button URL
				<?php echo aq_field_input('text', $block_id, $text, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
		
		<div class="color-wrapper">
			<div class="container inner text-center">
				<div class="thin">
					<?php 
						if( $lead )
							echo '<p class="lead large">'. htmlspecialchars_decode($lead) .'</p>';
					?>
					<a href="<?php echo esc_url($text); ?>" class="btn btn-border"><?php echo htmlspecialchars_decode($title); ?></a> 
				</div><!-- /.thin --> 
			</div><!-- /.container --> 
		</div>
		
	<?php
	}//end block
	
}//end class