<?php

class AQ_Intro_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Intro',
			'size' => 'span12',
			'block_description' => 'Add a large, chunky<br />intro text to the page.'
		);
		parent::__construct('aq_intro_block', $block_options);
	}//end construct
	
	function form($instance) {
		$defaults = array(
			'text' => ''
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>

		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full', false) ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
 
			echo '<p class="lead main">'. htmlspecialchars_decode($text) .'</p>';

	}//end block
	
}//end class