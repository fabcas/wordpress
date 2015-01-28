<?php

class AQ_Section_Title_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Section Title',
			'size' => 'span12',
			'block_icon' => '<i class="icon-picons-font"></i>',
			'block_description' => 'Use to add a title &<br />subtitle to the page.'
		);
		
		//create the block
		parent::__construct('aq_section_title_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => '',
			'line' => 1
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full', true) ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
	?>
	
		<h3 class="section-title text-center"><?php echo htmlspecialchars_decode($title); ?></h3>
		<div class="lead text-center"><?php echo htmlspecialchars_decode($text); ?></div>
	
	<?php
	}//end block
	
}//end class