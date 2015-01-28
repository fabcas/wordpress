<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php echo ( is_home() || is_front_page() ) ? bloginfo('name') : wp_title('| ', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class('full-layout'); ?>>

<?php 
	if( get_option('use_preloader', '1') == 1 )
		get_template_part('inc/content','spinner'); 
?>

<div class="body-wrapper">

  <div class="navbar yamm basic default">
    <div class="navbar-header">
    
    	<?php 
    		if(!( get_option('header_layout','basic') == 'basic' ))
    			get_template_part('inc/content','sub-header'); 
    	?>
    	
      <div class="container">
      
        <div class="basic-wrapper"> 
        
        	<a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse">
        		<i></i>
        	</a> 
        	
        	<a class="navbar-brand" href="<?php echo home_url(); ?>">
        		<?php if( get_option('custom_logo', trailingslashit( get_template_directory_uri() ) . 'style/images/logo.png') ) : ?>
        			<img 
        				src="<?php echo get_option('custom_logo', trailingslashit( get_template_directory_uri() ) . 'style/images/logo.png' ); ?>" 
        				alt="<?php echo get_option('custom_logo_alt_text'); ?>" 
        				data-src="<?php echo get_option('custom_logo', trailingslashit( get_template_directory_uri() ) . 'style/images/logo.png'); ?>" 
        				data-ret="<?php echo get_option('custom_logo_retina', trailingslashit( get_template_directory_uri() ) . 'style/images/logo@2x.png'); ?>" 
        				class="retina" 
        			/>
        		<?php else : ?>
        			<span><?php echo bloginfo('name'); ?></span>
        		<?php endif; ?>
        	</a> 
        	
        </div>
        
        <div class="collapse navbar-collapse pull-right">
			<?php
				if ( has_nav_menu( 'primary' ) ){
				    wp_nav_menu( 
				    	array(
					        'theme_location'    => 'primary',
					        'depth'             => 3,
					        'container'         => false,
					        'container_class'   => false,
					        'menu_class'        => 'nav navbar-nav',
					        'menu_id'           => 'menu-standard-navigation',
					        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					        'walker'            => new ebor_bootstrap_navwalker()
				        )
				    );
					    
				} else {
					echo '<ul class="nav navbar-nav"><li><a href="'. admin_url('nav-menus.php') .'">Set up a navigation menu now</a></li></ul>';
				}
			?>
        </div>
        
      </div>
    </div>
  </div>
  <div class="offset"></div>