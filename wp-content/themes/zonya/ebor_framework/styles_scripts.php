<?php

/**
 * Ebor Framework
 * Styles & Scripts Enqueuement
 * @since version 1.0
 * @author TommusRhodus
 */

/**
 * Ebor Load Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * @since version 1.0
 * @author TommusRhodus
 */ 
function ebor_load_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';

	//Enqueue Styles
	wp_enqueue_style( 'ebor-sorts-goudy-font', "$protocol://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400,400italic" );
	wp_enqueue_style( 'ebor-lato-font', "$protocol://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic" );
	wp_enqueue_style( 'ebor-bootstrap', get_template_directory_uri() . '/style/css/bootstrap.css' );
	wp_enqueue_style( 'ebor-owl', get_template_directory_uri() . '/style/css/owl.carousel.css' );
	wp_enqueue_style( 'ebor-fancybox', get_template_directory_uri() . '/style/js/fancybox/jquery.fancybox.css' );
	wp_enqueue_style( 'ebor-fancybox-thumbs', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.2' );
	wp_enqueue_style( 'ebor-prettify', get_template_directory_uri() . '/style/js/google-code-prettify/prettify.css' );
	
	if (class_exists('Woocommerce'))
		wp_enqueue_style( 'ebor-woocommerce', get_template_directory_uri() . '/style/css/woocommerce.css' );
	
	wp_enqueue_style( 'ebor-style', get_stylesheet_uri() );
	wp_enqueue_style( 'ebor-fontello', get_template_directory_uri() . '/style/type/fontello.css' );
	wp_enqueue_style( 'ebor-budicons', get_template_directory_uri() . '/style/type/budicons.css' );
	wp_enqueue_style( 'ebor-custom', get_template_directory_uri() . '/custom.css' );
	
	//Dequeue Styles
	wp_dequeue_style('aqpb-view-css');
	wp_deregister_style('aqpb-view-css');
	
	//Enqueue Scripts
	wp_enqueue_script( 'ebor-bootstrap', get_template_directory_uri() . '/style/js/bootstrap.min.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-bootstrap-dropdown', get_template_directory_uri() . '/style/js/twitter-bootstrap-hover-dropdown.min.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-retina', get_template_directory_uri() . '/style/js/retina.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-fancybox', get_template_directory_uri() . '/style/js/jquery.fancybox.pack.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-fancybox-thumbs', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.2', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-fancybox-media', get_template_directory_uri() . '/style/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-isotope', get_template_directory_uri() . '/style/js/jquery.isotope.min.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-easytabs', get_template_directory_uri() . '/style/js/jquery.easytabs.min.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-owl', get_template_directory_uri() . '/style/js/owl.carousel.min.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-fitvids', get_template_directory_uri() . '/style/js/jquery.fitvids.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-prettify', get_template_directory_uri() . '/style/js/google-code-prettify/prettify.js', array('jquery'), false, true  );
	
	if ( is_ssl() ) {
	    wp_enqueue_script('ebor-googlemapsapi', 'https://maps-api-ssl.google.com/maps/api/js?sensor=false&v=3.exp', array( 'jquery' ), false, true);
	} else {
	    wp_enqueue_script('ebor-googlemapsapi', 'http://maps.googleapis.com/maps/api/js?sensor=false&v=3.exp', array( 'jquery' ), false, true);
	}
	wp_enqueue_script( 'ebor-gomap', get_template_directory_uri() . '/style/js/gomap.js', array('jquery'), false, true  );
	wp_enqueue_script( 'ebor-scripts', get_template_directory_uri() . '/style/js/scripts.js', array('jquery'), false, true  );
	
	if( get_option('site_version', 'multipage') == 'one-page' )
		wp_enqueue_script( 'ebor-one-page', get_template_directory_uri() . '/style/js/onepage.js', array('jquery'), false, true  );
	
	//Enqueue Comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	/**
	 * Dequeue Scripts
	 */
	wp_dequeue_script('aqpb-view-js');
	wp_deregister_script('aqpb-view-js');
	
	/**
	 * localize script
	 */
	$script_data = array( 
		'fixed_lightbox' => get_option('lightbox_gallery','no')
	);
	wp_localize_script( 'ebor-scripts', 'wp_data', $script_data );
}
add_action('wp_enqueue_scripts', 'ebor_load_scripts', 10);

/**
 * Ebor Load Non Standard Scripts
 * Quickly insert HTML into wp_head()
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_load_non_standard_scripts() {
	echo '<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		  <!--[if lt IE 9]>
			  <script src="'. get_template_directory_uri() . '/style/js/html5shiv.js"></script>
			  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		  <![endif]-->';
}
add_action('wp_head', 'ebor_load_non_standard_scripts', 95);

/**
 * Ebor Load Admin Scripts
 * Properly Enqueues Scripts & Styles for the theme
 * @since version 1.0
 * @author TommusRhodus
 */
function ebor_admin_load_scripts(){
	wp_enqueue_script('ebor-admin-js', get_template_directory_uri().'/ebor_framework/ebor-admin.js', array('jquery'), false, true);
	wp_enqueue_style( 'ebor-admin-css', get_template_directory_uri() . '/ebor_framework/css/admin.css' );
	wp_enqueue_style( 'ebor-fontello', get_template_directory_uri() . '/style/type/fontello.css' );
	wp_enqueue_style( 'ebor-budicons', get_template_directory_uri() . '/style/type/budicons.css' );
}
add_action('admin_enqueue_scripts', 'ebor_admin_load_scripts', 200);