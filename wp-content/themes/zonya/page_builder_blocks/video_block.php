<?php

class AQ_Video_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Video Lightbox',
			'size' => 'span12',
			'resizable' => false,
			'block_icon' => '<i class="fa fa-video"></i>',
			'block_description' => 'Add a Video Lightbox<br />button to the page.'
		);
		parent::__construct('aq_video_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => '',
			'subtitle' => '',
			'button' => 'Watch video in lightbox'
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
			<label for="<?php echo $this->get_field_id('subtext') ?>">
				Subtitle
				<?php echo aq_field_input('subtitle', $block_id, $subtitle, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('button') ?>">
				Button Text
				<?php echo aq_field_input('button', $block_id, $button, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Video or oEmbed URL.<br /><code>List of Acceptable Services Here:</code><br /><a href="http://codex.wordpress.org/Embeds" target="_blank">http://codex.wordpress.org/Embeds</a><br />E.g: <code>http://vimeo.com/24496773</code>
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		if( $title )
			echo '<h3 class="section-title large text-center">'. htmlspecialchars_decode($title) .'</h3>';
		
		if( $subtitle )
			echo '<div class="lead large text-center">'. htmlspecialchars_decode($subtitle) .'</div>';
			
		if( $link )
			echo '<div class="text-center"><a href="'. esc_url( $link ) .'" class="fancybox-media btn btn-white">'. htmlspecialchars_decode($button) .'</a></div>';
		
	}//end block
	
}//end class