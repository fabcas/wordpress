<footer class="black-wrapper">

	<?php if( is_active_sidebar('footer1') ) : ?>
		<div class="container inner">
		  <div class="row">
		  	
		  	<?php 
		  		/**
		  		 * Get footer widgets depending on active columns
		  		 */
		  		get_template_part('inc/content','footer-widgets'); 
		  	?>
		    
		  </div><!-- /.row --> 
		</div><!-- .container -->
	<?php endif; ?>
	
	<div class="subfooter">
	  <div class="container">
	    
	    <div class="pull-left">
	    	<?php echo wpautop(htmlspecialchars_decode(get_option('copyright', 'Configure this message in "appearance" => "customize"'))); ?>
	    </div>
	    
	    <?php get_template_part('inc/content','social-footer'); ?>
	    
	  </div>
	</div>

</footer>
  
</div><!-- /.body-wrapper --> 

<?php wp_footer(); ?>

</body>
</html>