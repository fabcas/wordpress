<?php

class AQ_Video_Embed_Block extends AQ_Block {
	
	function __construct() {
		$block_options = array(
			'name' => 'Video Embed',
			'size' => 'span12',
			'block_icon' => '<i class="fa fa-video"></i>',
			'block_description' => 'Add a Video Embedx<br />to the page.'
		);
		parent::__construct('aq_video_embed_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'link' => ''
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('link') ?>">
				Video or oEmbed URL.<br /><code>List of Acceptable Services Here:</code><br /><a href="http://codex.wordpress.org/Embeds" target="_blank">http://codex.wordpress.org/Embeds</a><br />
				<?php echo aq_field_input('link', $block_id, $link, $size = 'full') ?>
			</label>
		</p>
		
	<?php
	}// end form
	
	function block($instance) {
		extract($instance);
		
		if( $link )
			echo '<div class="divide20"></div><figure class="player">' . wp_oembed_get( esc_url( $link ) ) . '</figure>';
					
	}//end block
	
}//end class