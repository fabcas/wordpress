<?php
	global $post;
	
	$url[] = '';
	$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
?>

<div class="share-links">
  <ul>
    <li><a class="btn share-facebook" target="_blank" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onClick="return ebor_fb_like()">Like</a></li>
    <li><a class="btn share-twitter" target="_blank" href="https://twitter.com/share?url=<?php the_permalink(); ?>" onClick="return ebor_tweet()">Tweet</a></li>
    <li><a class="btn share-pinterest" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" onClick="return ebor_fb_pin()">Pin it</a></li>
  </ul>
</div>

<script type="text/javascript">
	function ebor_fb_like() {
		window.open('http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_tweet() {
		window.open('https://twitter.com/share?url=<?php the_permalink(); ?>&t=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
	function ebor_pin() {
		window.open('http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $url[0]; ?>&description=<?php echo sanitize_title(get_the_title()); ?>','sharer','toolbar=0,status=0,width=626,height=436');
		return false;
	}
</script>