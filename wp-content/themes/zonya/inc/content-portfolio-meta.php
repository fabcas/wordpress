<?php
	$additional = get_post_meta( $post->ID, '_ebor_meta_repeat_group', true );
	$url = get_post_meta( $post->ID, '_ebor_the_client_url', true );
?>
	
<ul class="item-details">
	<?php
		  if( get_post_meta( $post->ID, '_ebor_the_client_date', true ) && get_option('portfolio_date', '1') == 1 ){
		  		echo '<li><h5>'.__('Date','zonya').'</h5> '.get_post_meta( $post->ID, '_ebor_the_client_date', true ).'</li>';
		  }
		  if( ebor_the_simple_terms() && get_option('portfolio_categories', '1') == 1 ){
		  		echo '<li><h5>'.__('Categories','zonya').'</h5> '.ebor_the_simple_terms().'</li>';
		  }
		  if( get_post_meta( $post->ID, '_ebor_the_client', true ) && get_option('portfolio_client', '1') == 1 ){
		  		echo '<li><h5>'.__('Client','zonya').'</h5> '.get_post_meta( $post->ID, '_ebor_the_client', true ).'</li>';
		  }
		  if( $additional ){
		  	foreach( $additional as $index => $item ){
		  		echo '<li><h5>';
		  		if( isset ( $item['_ebor_the_additional_title'] ) )
		  			echo $item['_ebor_the_additional_title'];
		  		echo '</h5> ';
		  		if( isset ( $item['_ebor_the_additional_detail'] ) )
		  			echo $item['_ebor_the_additional_detail'];
		  		echo '</li>';
		  	}
		  }
	?>
</ul>

<?php
	if( $url && get_option('portfolio_url', '1') == 1 ){
			echo '<a href="'.esc_url( $url ).'" target="_blank" class="btn">See Project</a>';
	}
?>