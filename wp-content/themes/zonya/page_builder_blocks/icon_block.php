<?php

class AQ_Icon_Column_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Icon Block',
			'size' => 'span3',
			'block_description' => 'Use to add Text<br />with an icon top.'
		);
		parent::__construct('aq_icon_column_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'text' => '',
			'icon' => '',
			'icon_retina' => '',
			'link' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('text') ?>">
				Content
				<?php echo aq_field_textarea('text', $block_id, $text, $size = 'full', true) ?>
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
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Link entire Block? Enter URL here. <code>optional</code>
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		if($link)
			echo '<a class="ebor-icon-link" href="'. esc_url($link) .'">';
	?>
		
		<div class="text-center services-1">
			<div class="col-wrapper">
				<div class="icon-wrapper"> 
					<img src="<?php echo esc_url($icon); ?>" 
						 data-src="<?php echo esc_url($icon); ?>" 
						 data-ret="<?php echo esc_url($icon_retina); ?>" 
						 class="retina" 
						 alt="<?php echo $title; ?>" 
					/>
				</div>
				<div class="text-wrapper">
					<?php 	
						if($title)
							echo '<h5>'. htmlspecialchars_decode($title) .'</h5>';
							
						if($text)
							echo wpautop(do_shortcode(htmlspecialchars_decode($text)));
					?>
				</div>
			</div>
		</div>
	
	<?php	
		if($link)
			echo '</a>';
				
	}//end block
	
}//end class