<?php
	/**
	 * searchform.php
	 * The theme searchform
	 * @author TommusRhodus
	 * @package loom
	 * @since 1.0.0
	 */
?>
<form class="searchform" method="get" id="searchform" action="<?php echo home_url(); ?>">
  <input type="text" id="s2" name="s" value="type and hit enter" onfocus="this.value=''" onblur="this.value='<?php _e('type and hit enter','zonya'); ?>'"/>
</form>