<?php

class AQ_Map_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Map',
			'size' => 'span12',
			'block_description' => 'Add a google map<br />to the page.'
		);
		//create the block
		parent::__construct('aq_map_block', $block_options);
	}//end construct
	
	function form($instance) {
		
		$defaults = array(
			'image' => '',
			'pppage' => 350
		);
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
	?>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('image') ?>">
				Upload a Marker Image
				<?php echo aq_field_upload('image', $block_id, $image, $media_type = 'image') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Address for map, use plain text, e.g: <code>Lord Mayors Walk, York, England</code>
				<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
			</label>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('pppage') ?>">
				Map Height (px)
				<?php echo aq_field_input('pppage', $block_id, $pppage, $size = 'full', $type = 'number') ?>
			</label>
		</p>

	<?php
	}//end form
	
	function block($instance) {
		extract($instance);
		
		$unique = wp_rand(0,10000);
	?>
		
		<div id="map" class="<?php echo $unique; ?>" style="height: <?php echo $pppage;?>px;"></div>
		
	<?php
		echo "<script type='text/javascript'>
				jQuery(document).ready(function($){
				'use strict';
				
					jQuery('#map.$unique').goMap({ address: '$title',
					  zoom: 14,
					  mapTypeControl: true,
				      draggable: false,
				      scrollwheel: false,
				      streetViewControl: true,
				      maptype: 'ROADMAP',
			    	  markers: [
			    		{ 'address' : '$title' }
			    	  ],
					  icon: '$image', 
					  addMarker: false,
					});
					
					var styles = [{stylers:[{saturation:-100},{gamma:1}]},{elementType:'labels.text.stroke',stylers:[{visibility:'off'}]},{featureType:'poi.business',elementType:'labels.text',stylers:[{visibility:'off'}]},{featureType:'poi.business',elementType:'labels.icon',stylers:[{visibility:'off'}]},{featureType:'poi.place_of_worship',elementType:'labels.text',stylers:[{visibility:'off'}]},{featureType:'poi.place_of_worship',elementType:'labels.icon',stylers:[{visibility:'off'}]},{featureType:'road',elementType:'geometry',stylers:[{visibility:'simplified'}]},{featureType:'water',stylers:[{visibility:'on'},{saturation:50},{gamma:0},{hue:'#50a5d1'}]},{featureType:'administrative.neighborhood',elementType:'labels.text.fill',stylers:[{color:'#333333'}]},{featureType:'road.local',elementType:'labels.text',stylers:[{weight:0.5},{color:'#333333'}]},{featureType:'transit.station',elementType:'labels.icon',stylers:[{gamma:1},{saturation:50}]}];
					
					$.goMap.setMap({styles: styles});
				
				});
			</script>";	
			
	}//end block
	
}//end class