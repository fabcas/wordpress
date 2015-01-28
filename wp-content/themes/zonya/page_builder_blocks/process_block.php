<?php

class AQ_Process_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
			'name' => 'Process Steps',
			'size' => 'span12',
			'resizable' => false,
			'block_description' => 'Show off your process<br />with icons and text.'
		);
		parent::__construct('AQ_Process_Block', $block_options);
		add_action('wp_ajax_aq_block_process_add_new', array($this, 'add_process'));
	}//end construct
	
	function form($instance) {
	
		$defaults = array(
			'tabs' => array(
				1 => array(
					'title' => 'Creative Ideas',
					'icon' => '',
					'icon-retina' => '',
					'content' => ''
				)
			),
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<div class="description cf">
			<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
				<?php
				$tabs = is_array($tabs) ? $tabs : $defaults['tabs'];
				$count = 1;
				foreach($tabs as $tab) {	
					$this->tab($tab, $count);
					$count++;
				}
				?>
			</ul>
			<p></p>
			<a href="#" rel="process" class="aq-sortable-add-new button">Add New</a>
			<p></p>
		</div>
		
	<?php
	}//end form
	
	function tab($tab = array(), $count = 0) {	
	?>
	
		<li id="<?php echo $this->get_field_id('tabs') ?>-sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
			
			<div class="sortable-head cf">
				<div class="sortable-title">
					<strong><?php echo $tab['title'] ?></strong>
				</div>
				<div class="sortable-handle">
					<a href="#">Open / Close</a>
				</div>
			</div>
			
			<div class="sortable-body">
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title">
						Title
						<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][title]" value="<?php echo $tab['title'] ?>" />
					</label>
				</p>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content">
						Tab Content (Optional)<br/>
						<div class="clear"></div>
						<button name="B">B</button>
						<button name="I">I</button>
						<button name="BQ">Quote</button>
						<button name="LINK">Link</button>
						<button name="OL">OL</button>
						<button name="UL">UL</button>
						<button name="IMG">IMG</button>
						<button name="H1">H1</button>
						<button name="H2">H2</button>
						<button name="H3">H3</button>
						<button name="H4">H4</button>
						<button name="H5">H5</button>
						<button name="H6">H6</button>
						<textarea id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $tab['content'] ?></textarea>
					</label>
				</p>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon">
						Insert an Image (Required)<br/>
						<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon" class="input-full input-upload" value="<?php echo $tab['icon'] ?>" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][icon]" />
						<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
					</label>
				</p>
				<p class="tab-desc description">
					<label for="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon-retina">
						Insert a Retina Version of Image<br/>
						<input type="text" id="<?php echo $this->get_field_id('tabs') ?>-<?php echo $count ?>-icon-retina" class="input-full input-upload" value="<?php echo $tab['icon-retina'] ?>" name="<?php echo $this->get_field_name('tabs') ?>[<?php echo $count ?>][icon-retina]" />
						<a href="#" class="aq_upload_button button" rel="image">Upload</a><p></p>
					</label>
				</p>
				<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
			</div>
			
		</li>
	<?php
	}//end tab
	
	function block($instance) {
		extract($instance);
	?>
	
		<section class="timeline process">
		
			<?php foreach($tabs as $tab) : ?>
			
				<div class="timeline-block">
				
					<div class="timeline-img"> 
						<img src="<?php echo esc_url($tab['icon']); ?>" 
							 data-src="<?php echo esc_url($tab['icon']); ?>" 
							 data-ret="<?php echo esc_url($tab['icon-retina']); ?>" 
							 class="retina" 
							 alt="<?php echo $tab['title']; ?>" 
						/>
					</div><!-- timeline-img -->
					
					<div class="timeline-content">
						<?php 
							if( $tab['title'] )
								echo '<h5>'. htmlspecialchars_decode($tab['title']) .'</h5>';
								
							if( $tab['content'] )
								echo wpautop(do_shortcode(htmlspecialchars_decode($tab['content'])));
						?>
					</div><!-- timeline-content --> 
				
				</div><!-- timeline-block -->
			
			<?php endforeach; ?>
			
		</section>
		
	<?php	
	}//end block
	
	/* AJAX add tab */
	function add_process() {
		$nonce = $_POST['security'];	
		if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
		
		$count = isset($_POST['count']) ? absint($_POST['count']) : false;
		$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
		
		//default key/value for the tab
		$tab = array(
			'title' => 'Rapid Solutions',
			'icon' => '',
			'icon-retina' => '',
			'content' => ''
		);
		
		if($count) {
			$this->tab($tab, $count);
		} else {
			die(-1);
		}
		
		die();
	}//end add skill
	
	function update($new_instance, $old_instance) {
		$new_instance = aq_recursive_sanitize($new_instance);
		return $new_instance;
	}//end update
}//end class