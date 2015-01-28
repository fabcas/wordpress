<?php
  
function ebor_custom_metaboxes( $meta_boxes ) {
	$prefix = '_ebor_'; // Prefix for all fields
	
	$social_options = array(
		array('name' => 'Pinterest', 'value' => 'pinterest'),
		array('name' => 'RSS', 'value' => 'rss'),
		array('name' => 'Facebook', 'value' => 'facebook'),
		array('name' => 'Twitter', 'value' => 'twitter'),
		array('name' => 'Flickr', 'value' => 'flickr'),
		array('name' => 'Dribbble', 'value' => 'dribbble'),
		array('name' => 'Behance', 'value' => 'behance'),
		array('name' => 'linkedIn', 'value' => 'linkedin'),
		array('name' => 'Vimeo', 'value' => 'vimeo'),
		array('name' => 'Youtube', 'value' => 'youtube'),
		array('name' => 'Skype', 'value' => 'skype'),
		array('name' => 'Tumblr', 'value' => 'tumblr'),
		array('name' => 'Delicious', 'value' => 'delicious'),
		array('name' => '500px', 'value' => '500px'),
		array('name' => 'Grooveshark', 'value' => 'grooveshark'),
		array('name' => 'Forrst', 'value' => 'forrst'),
		array('name' => 'Digg', 'value' => 'digg'),
		array('name' => 'Blogger', 'value' => 'blogger'),
		array('name' => 'Klout', 'value' => 'klout'),
		array('name' => 'Dropbox', 'value' => 'dropbox'),
		array('name' => 'Github', 'value' => 'github'),
		array('name' => 'Songkick', 'value' => 'singkick'),
		array('name' => 'Posterous', 'value' => 'posterous'),
		array('name' => 'Appnet', 'value' => 'appnet'),
		array('name' => 'Google Plus', 'value' => 'gplus'),
		array('name' => 'Stumbleupon', 'value' => 'stumbleupon'),
		array('name' => 'LastFM', 'value' => 'lastfm'),
		array('name' => 'Spotify', 'value' => 'spotify'),
		array('name' => 'Instagram', 'value' => 'instagram'),
		array('name' => 'Evernote', 'value' => 'evernote'),
		array('name' => 'Paypal', 'value' => 'paypal'),
		array('name' => 'Picasa', 'value' => 'picasa'),
		array('name' => 'Soundcloud', 'value' => 'soundcloud')
	);
	
	$portfolio_layouts = array(
		array('name' => 'Full Screen (Full Screen Width Element on Top)', 'value' => 'screen'),
		array('name' => 'Full Width (Large Element on Top)', 'value' => 'full'),
		array('name' => 'Half Width (Left/Right)', 'value' => 'half'),
		array('name' => 'Full Width (Large Element on Bottom)', 'value' => 'bottom'),
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR PORTFOLIO POST TYPE /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'portfolio_metabox',
		'title' => __('Additional Portfolio Item Details', 'zonya'),
		'pages' => array('portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Portfolio Item Layout',
				'desc' => 'What layout would you like for this portfolio item?',
				'id' => $prefix . 'layout_checkbox',
				'type' => 'select',
				'options' => $portfolio_layouts
			),
			array(
				'name' => __('Client Name', 'zonya'),
				'desc' => __("(Optional) Add a Client Name for this Project?", 'zonya'),
				'id'   => $prefix . 'the_client',
				'type' => 'text',
			),
			array(
				'name' => __('Project Date', 'zonya'),
				'desc' => __("(Optional) Add the Date this Project Took Place?", 'zonya'),
				'id'   => $prefix . 'the_client_date',
				'type' => 'text_date',
			),
			array(
				'name' => __('Client URL', 'zonya'),
				'desc' => __("(Optional) Add a URL for this Project?", 'zonya'),
				'id'   => $prefix . 'the_client_url',
				'type' => 'text_url',
			),
			array(
			    'id'          => $prefix . 'meta_repeat_group',
			    'type'        => 'group',
			    'description' => __( 'Additional Meta Titles & Descriptions', 'zonya' ),
			    'options'     => array(
			        'add_button'    => __( 'Add Another Entry', 'zonya' ),
			        'remove_button' => __( 'Remove Entry', 'zonya' ),
			        'sortable'      => true, // beta
			    ),
			    'fields'      => array(
					array(
						'name' => __('Additional Item Title', 'zonya'),
						'desc' => __("Title of your Additional Meta", 'zonya'),
						'id'   => $prefix . 'the_additional_title',
						'type' => 'text'
					),
					array(
						'name' => __('Additional Item Detail', 'zonya'),
						'desc' => __("Detail of your Additional Meta", 'zonya'),
						'id'   => $prefix . 'the_additional_detail',
						'type' => 'text'
					),
			    ),
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR TEAM MEMBERS      ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'team_metabox',
		'title' => __('The Job Title', 'zonya'),
		'pages' => array('team', 'testimonial'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Job Title', 'zonya'),
				'desc' => '(Optional) Enter a Job Title for this Team Member',
				'id'   => $prefix . 'the_job_title',
				'type' => 'text',
			),
		)
	);
	
	$meta_boxes[] = array(
		'id' => 'page_metabox',
		'title' => __('Page Subtitle', 'zonya'),
		'pages' => array('page'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Page Subtitle', 'zonya'),
				'desc' => '(Optional) Enter a subtitle for this page. NOTE: Only applies to the page with title image type.',
				'id'   => $prefix . 'page_subtitle',
				'type' => 'text',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR SOCIAL            ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'social_metabox',
		'title' => __('Post Social Details', 'zonya'),
		'pages' => array('team', 'user'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Social Icon 1',
				'desc' => 'What icon would you like for this team members first social profile?',
				'id' => $prefix . 'team_social_icon_1',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 1', 'zonya'),
				'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'zonya'),
				'id'   => $prefix . 'team_social_icon_1_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 2',
				'desc' => 'What icon would you like for this team members second social profile?',
				'id' => $prefix . 'team_social_icon_2',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 2', 'zonya'),
				'desc' => __("Enter the URL for Social Icon 1 e.g www.google.com", 'zonya'),
				'id'   => $prefix . 'team_social_icon_2_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 3',
				'desc' => 'What icon would you like for this team members third social profile?',
				'id' => $prefix . 'team_social_icon_3',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 3', 'zonya'),
				'desc' => __("Enter the URL for Social Icon 3 e.g www.google.com", 'zonya'),
				'id'   => $prefix . 'team_social_icon_3_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 4',
				'desc' => 'What icon would you like for this team members fourth social profile?',
				'id' => $prefix . 'team_social_icon_4',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 4', 'zonya'),
				'desc' => __("Enter the URL for Social Icon 4 e.g www.google.com", 'zonya'),
				'id'   => $prefix . 'team_social_icon_4_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 5',
				'desc' => 'What icon would you like for this team members fifth social profile?',
				'id' => $prefix . 'team_social_icon_5',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 5', 'zonya'),
				'desc' => __("Enter the URL for Social Icon 5 e.g www.google.com", 'zonya'),
				'id'   => $prefix . 'team_social_icon_5_url',
				'type' => 'text',
			),
			array(
				'name' => 'Social Icon 6',
				'desc' => 'What icon would you like for this team members sixth social profile?',
				'id' => $prefix . 'team_social_icon_6',
				'type' => 'select',
				'options' => $social_options
			),
			array(
				'name' => __('URL for Social Icon 6', 'zonya'),
				'desc' => __("Enter the URL for Social Icon 6 e.g www.google.com", 'zonya'),
				'id'   => $prefix . 'team_social_icon_6_url',
				'type' => 'text',
			),
		)
	);
	
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR CLIENTS /////////////////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'clients_metabox',
		'title' => __('Client URL', 'zonya'),
		'pages' => array('client'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('URL for this client (optional)', 'zonya'),
				'desc' => __("Enter a URL for this client, if left blank, client logo will open into a lightbox.", 'zonya'),
				'id'   => $prefix . 'client_url',
				'type' => 'text',
			),
		),
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR GALLERY POST FORMAT /////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'gallery_metabox',
		'title' => __('The Gallery', 'zonya'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Upload Images for Gallery or Image Post Format',
				'desc' => 'Upload Here, Drag & Drop to Reorder',
				'id' => $prefix . 'portfolio_gallery_list',
				'type' => 'pw_gallery',
				'sanitization_cb' => 'pw_gallery_field_sanitise',
			),
		)
	);
	
	//////////////////////////////////////////////////////////////////////////
	////// CREATE METABOXES FOR VIDEO POST FORMAT ///////////////////////////
	////////////////////////////////////////////////////////////////////////
	
	$meta_boxes[] = array(
		'id' => 'video_metabox',
		'title' => __('The Video Link', 'zonya'),
		'pages' => array('post', 'portfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'oEmbed',
				'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
				'id'   => $prefix . 'the_video_1',
				'type' => 'oembed',
			),
		)
	);


	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'ebor_custom_metaboxes' );

// Initialize the metabox class
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'metabox/init.php' );
	}
}
?>