<?php

//REGISTER CUSTOM MENUS
function register_ebor_menus() {
  register_nav_menus( 
  	array(
  		'primary' => __( 'Standard Navigation', 'zonya' )
  	) 
  );
}
add_action( 'init', 'register_ebor_menus' );

//REGISTER SIDEBARS
function ebor_register_sidebars() {

	register_sidebar(
		array(
			'id' => 'primary',
			'name' => __( 'Blog Sidebar', 'zonya' ),
			'description' => __( 'Widgets to be displayed in the blog sidebar.', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'shop',
			'name' => __( 'Shop Sidebar', 'zonya' ),
			'description' => __( 'Widgets to be displayed in the shop sidebar.', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'page',
			'name' => __( 'Page With Sidebar, Sidebar', 'zonya' ),
			'description' => __( 'Widgets to be displayed in the page with sidebar, sidebar.', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="sidebox widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
		)
	);

	register_sidebar(
		array(
			'id' => 'footer1',
			'name' => __( 'Footer Column 1', 'zonya' ),
			'description' => __( 'If this is set, your footer will be 1 column', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title upper">',
			'after_title' => '</h5>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer2',
			'name' => __( 'Footer Column 2', 'zonya' ),
			'description' => __( 'If this & column 1 are set, your footer will be 2 columns.', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title upper">',
			'after_title' => '</h5>'
		)
	);
	
	
	register_sidebar(
		array(
			'id' => 'footer3',
			'name' => __( 'Footer Column 3', 'zonya' ),
			'description' => __( 'If this & column 1 & column 2 are set, your footer will be 3 columns.', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title upper">',
			'after_title' => '</h5>'
		)
	);
	
	register_sidebar(
		array(
			'id' => 'footer4',
			'name' => __( 'Footer Column 4', 'zonya' ),
			'description' => __( 'If this & column 1 & column 2 & column 3 are set, your footer will be 4 columns.', 'zonya' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title upper">',
			'after_title' => '</h5>'
		)
	);
	
}
add_action( 'widgets_init', 'ebor_register_sidebars' );