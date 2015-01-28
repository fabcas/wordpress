<?php 

add_action('customize_register', 'ebor_theme_customize');
function ebor_theme_customize($wp_customize) {

/* Remove the WordPress background image control. */
$wp_customize->remove_control( 'background_image' );

require_once('theme_options_classes.php');

/* Add our custom background image control. */
$wp_customize->add_control( new JT_Customize_Control_Background_Image( $wp_customize ) );

$social_options = array(
    'pinterest'=> 'Pinterest',
    'rss'=> 'RSS',
    'facebook'=> 'Facebook',
    'twitter'=> 'Twitter',
    'flickr'=> 'Flickr',
    'dribbble'=> 'Dribbble',
    'behance'=> 'Behance',
    'linkedin'=> 'LinkedIn',
    'vimeo'=> 'Vimeo',
    'youtube'=> 'Youtube',
    'skype'=> 'Skype',
    'tumblr'=> 'Tumblr',
    'delicious'=> 'Delicious',
    '500px'=> '500px',
    'grooveshark'=> 'Grooveshark',
    'forrst'=> 'Forrst',
    'digg'=> 'Digg',
    'blogger'=> 'Blogger',
    'klout'=> 'Klout',
    'dropbox'=> 'Dropbox',
    'github'=> 'Github',
    'songkick'=> 'Singkick',
    'posterous'=> 'Posterous',
    'appnet'=> 'Appnet',
    'gplus'=> 'Google Plus',
    'stumbleupon'=> 'Stumbleupon',
    'lastfm'=> 'LastFM',
    'spotify'=> 'Spotify',
    'instagram'=> 'Instagram',
    'evernote'=> 'Evernote',
    'paypal'=> 'Paypal',
    'picasa'=> 'Picasa',
    'soundcloud'=> 'Soundcloud',
);

$location_options = array(
    'left'=> 'Left',
    'right'=> 'Right',
);

$icon_options = ebor_picons();

/**
 * Ebor Framework
 * Login Section
 * @since version 1.0
 * @author TommusRhodus
 */
 
$wp_customize->add_section( 'site_settings', array(
	'title'          => 'Site Settings',
	'priority'       => 20
) );

$wp_customize->add_setting( 'use_preloader', array(
    'default' => 1,
    'type' => 'option'
) );

$wp_customize->add_control( 'use_preloader', array(
    'label' => __('Use Site Preloader?', 'zonya'),
    'type' => 'checkbox',
    'section' => 'site_settings',
    'priority'       => 7,
) );

$wp_customize->add_setting('site_layout', array(
    'default' => 'normal',
    'type' => 'option'
));
$wp_customize->add_control( 'site_layout', array(
    'label'   => __('Choose layout site.', 'zonya'),
    'section' => 'site_settings',
    'type'    => 'select',
    'priority' => 1,
    'choices'    => array(
        'normal' => 'Full Width',
        'boxed' => 'Boxed',
    ),
));

$wp_customize->add_setting('site_version', array(
    'default' => 'multipage',
    'type' => 'option'
));

$wp_customize->add_control( 'site_version', array(
    'label'   => __('Choose Site Version', 'slowave'),
    'section' => 'site_settings',
    'type'    => 'select',
    'priority'       => 1,
    'choices'    => array(
        'multipage' => 'Multipage (Default)',
        'one-page' => 'One Page (Enables URL Rewriting)',
    ),
));


/**
 * Ebor Framework
 * Login Section
 * @since version 1.0
 * @author TommusRhodus
 */

/**
 * Create Header Section
 */
$wp_customize->add_section( 'custom_login_section', array(
	'title'          => 'wp-login.php Logo',
	'priority'       => 29,
) );

/**
 * Custom Logo Default
 */
$wp_customize->add_setting('custom_login_logo', array(
    'default'  => '',
    'type' => 'option'

));

/**
 * Custom Logo Control
 */
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_login_logo', array(
    'label'    => __('Custom Login Logo Upload', 'ebor_starter'),
    'section'  => 'custom_login_section',
    'priority'       => 1
)));

/**
 * END LOGIN LOGO SECTION
 */
 

/**
 * Create site settings section
 * @author TommusRhodus
 * @package loom
 * @since 1.0.0
 */
$wp_customize->add_section( 'demo_data', array(
	'title'          => 'Import Demo Data',
	'priority'       => 1,
) );

/**
 * Demo Data Defaults
 */
$wp_customize->add_setting( 'import', array(
    'default'        => ''
) );

/**
 * Demo Data Control
 */
$wp_customize->add_control( new Demo_Import_control( $wp_customize, 'import', array(
    'label'   => __('Import Demo Data', 'zonya'),
    'section' => 'demo_data',
    'settings'   => 'import',
    'priority' => 1,
) ) );

/**
 * END DEMO DATA SECTION
 */


///////////////////////////////////////
//     BLOG SECTION                 //
/////////////////////////////////////
	
//CREATE CUSTOM STYLING SUBSECTION
$wp_customize->add_section( 'blog_settings', array(
	'title'          => 'Blog Settings',
	'priority'       => 35,
) );

//blog layout
$wp_customize->add_setting('blog_layout', array(
    'default' => 'blog-grid-sidebar',
    'type' => 'option'
));

//blog layout
$wp_customize->add_control( 'blog_layout', array(
    'label'   => __('Choose layout for Blog.', 'zonya'),
    'section' => 'blog_settings',
    'type'    => 'select',
    'priority' => 4,
    'choices' => array(
        'blog-grid' => 'Grid Blog',
        'blog-grid-sidebar' => 'Grid Blog Sidebar',
        'blog-classic' => 'Classic Feed Blog',
    ),
));

//comments TITLE
$wp_customize->add_setting( 'comments_title', array(
    'default'        => 'Would you like to share your thoughts?',
    'type' => 'option'
) );

//commentstitle
$wp_customize->add_control( 'comments_title', array(
    'label' => __('Comments Title', 'zonya'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 5,
) );

//comments subTITLE
$wp_customize->add_setting( 'comments_subtitle', array(
    'default'        => 'Your email address will not be published. Required fields are marked *',
    'type' => 'option'
) );

//comments subtitle
$wp_customize->add_control( 'comments_subtitle', array(
    'label' => __('Comments Sub-title', 'zonya'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 5,
) );

//blog continue
$wp_customize->add_setting( 'blog_continue', array(
    'default'        => 'Continue Reading',
    'type' => 'option'
) );

//blog continue
$wp_customize->add_control( 'blog_continue', array(
    'label' => __('Blog "Continue Reading" Text', 'zonya'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog read more
$wp_customize->add_setting( 'blog_read_more', array(
    'default'        => 'Read More',
    'type' => 'option'
) );

//blog read more
$wp_customize->add_control( 'blog_read_more', array(
    'label' => __('Blog "Read More" Text', 'zonya'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog view larger
$wp_customize->add_setting( 'blog_view_larger', array(
    'default'        => 'View Larger',
    'type' => 'option'
) );

//blog view larger
$wp_customize->add_control( 'blog_view_larger', array(
    'label' => __('Blog "View Larger" Text', 'zonya'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog continue
$wp_customize->add_setting( 'author_details_title', array(
    'default'        => 'About the author',
    'type' => 'option'
) );

//blog continue
$wp_customize->add_control( 'author_details_title', array(
    'label' => __('SINGLE - Author Details Title', 'zonya'),
    'type' => 'text',
    'section' => 'blog_settings',
    'priority'       => 6,
) );

//blog social
$wp_customize->add_setting( 'blog_social', array(
    'default' => 1,
    'type' => 'option'
) );

//blog social
$wp_customize->add_control( 'blog_social', array(
    'label' => __('META - SINGLE - Show Social Sharing Buttons?', 'zonya'),
    'type' => 'checkbox',
    'section' => 'blog_settings',
    'priority'       => 13,
) );

//blog author
$wp_customize->add_setting( 'blog_author', array(
    'default' => 1,
    'type' => 'option'
) );

//blog author
$wp_customize->add_control( 'blog_author', array(
    'label' => __('META - SINGLE - Show post author details?', 'zonya'),
    'type' => 'checkbox',
    'section' => 'blog_settings',
    'priority'       => 13,
) );
	
	
///////////////////////////////////////
//     PORTFOLIO SECTION            //
/////////////////////////////////////
	
//CREATE CUSTOM STYLING SUBSECTION
$wp_customize->add_section( 'portfolio_settings', array(
	'title'          => 'Portfolio Settings',
	'priority'       => 36,
) ); 

//blog layout
$wp_customize->add_setting('portfolio_layout', array(
    'default' => 'full-portfolio',
    'type' => 'option'
));

//blog layout
$wp_customize->add_control( 'portfolio_layout', array(
    'label'   => __('Choose layout for Portfolio Archives.', 'zonya'),
    'section' => 'portfolio_settings',
    'type'    => 'select',
    'priority' => 1,
    'choices'    => array(
        'portfolio-full' => 'Fullscreen Portfolio',
        'portfolio-full-lightbox' => 'Fullscreen Portfolio Lightbox',
        'portfolio-grid' => 'Classic Portfolio (4 Columns)',
        'portfolio-grid-alt' => 'Classic Portfolio (3 Columns)',
        'portfolio-grid-lightbox' => 'Classic Portfolio Lightbox (4 Columns)',
        'portfolio-grid-alt-lightbox' => 'Classic Portfolio Lightbox (3 Columns)',
        'portfolio-carousel' => 'Carousel Portfolio',
        'portfolio-masonry' => 'Masonry Portfolio (4 Columns)',
        'portfolio-masonry-alt' => 'Masonry Portfolio (3 Columns)',
        'portfolio-masonry-lightbox' => 'Masonry Portfolio Lightbox (4 Columns)',
        'portfolio-masonry-alt-lightbox' => 'Masonry Portfolio Lightbox (3 Columns)',
    ),
));

$wp_customize->add_setting( 'portfolio_related_title', array(
    'default' => 'Related Works',
    'type' => 'option'
) );

$wp_customize->add_control( 'portfolio_related_title', array(
    'label' => __('SINGLE - Related Work Title', 'zonya'),
    'type' => 'text',
    'section' => 'portfolio_settings',
    'priority'       => 3,
) );

$wp_customize->add_setting( 'portfolio_lightbox', array(
    'default' => 0,
    'type' => 'option'
) );
$wp_customize->add_control( 'portfolio_lightbox', array(
    'label' => 'GLOBAL - Turn off lightbox (images link to single post)',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
) );

//portfolio date
$wp_customize->add_setting( 'portfolio_date', array(
    'default' => 1,
    'type' => 'option'
) );

//portfolio date
$wp_customize->add_control( 'portfolio_date', array(
    'label' => 'META - SINGLE - Show project date?',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
) );

//portfolio categories
$wp_customize->add_setting( 'portfolio_categories', array(
    'default' => 1,
    'type' => 'option'
) );

//portfolio categories
$wp_customize->add_control( 'portfolio_categories', array(
    'label' => 'META - SINGLE - Show project categories?',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
) );

//portfolio client
$wp_customize->add_setting( 'portfolio_client', array(
    'default' => 1,
    'type' => 'option'
) );

//portfolio client
$wp_customize->add_control( 'portfolio_client', array(
    'label' => 'META - SINGLE - Show project client?',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
) );

//portfolio url
$wp_customize->add_setting( 'portfolio_url', array(
    'default' => 1,
    'type' => 'option'
) );

//portfolio url
$wp_customize->add_control( 'portfolio_url', array(
    'label' => 'META - SINGLE - Show project URL?',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
) );

//portfolio url
$wp_customize->add_setting( 'portfolio_share', array(
    'default' => 1,
    'type' => 'option'
) );

//portfolio url
$wp_customize->add_control( 'portfolio_share', array(
    'label' => 'SINGLE - Show Social Share Buttons',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
) );

$wp_customize->add_setting( 'portfolio_related', array(
    'default' => 1,
    'type' => 'option'
) );

$wp_customize->add_control( 'portfolio_related', array(
    'label' => 'SINGLE - Show related posts?',
    'type' => 'checkbox',
    'section' => 'portfolio_settings',
    'priority' => 4
) );

$wp_customize->add_setting( 'lightbox_gallery', array(
    'default' => 'no',
    'type' => 'option'
) );
$wp_customize->add_control( 'lightbox_gallery', array(
    'label' => 'LIGHTBOX PORTFOLIO - Show "Gallery" Post Images in Lightbox?',
    'type'     => 'radio',
    'choices'  => array(
        'yes'    => 'Yes - Gallery images in the Lightbox',
        'no'   => 'No - Featured Image Only'
    ),
    'section' => 'portfolio_settings',
    'priority' => 3
) );
	

/**
 * Create colors section
 * @author TommusRhodus
 * @package loom
 * @since 1.0.0
 */

/**
 * highlight settings
 */
$wp_customize->add_setting('highlight_colour', array(
    'default'           => '#72b6af',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * highlight controls
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_colour', array(
    'label'    => __('Key Colour (Highlight)', 'zonya'),
    'section'  => 'colors',
    'priority' => 100,
)));

/**
 * highlight hover settings
 */
$wp_customize->add_setting('highlight_hover_colour', array(
    'default'           => '#62a39c',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * highlight hover controls
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'highlight_hover_colour', array(
    'label'    => __('Key Colour (Highlight Hover)', 'zonya'),
    'section'  => 'colors',
    'priority' => 105,
)));

/**
 * wrapper dark settings
 */
$wp_customize->add_setting('wrapper_background_dark', array(
    'default'           => '#f1f1f1',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * wrapper dark control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrapper_background_dark', array(
    'label'    => __('Background Color (Darker)', 'zonya'),
    'section'  => 'colors',
    'priority' => 25,
)));

/**
 * wrapper dark settings
 */
$wp_customize->add_setting('wrapper_background_black', array(
    'default'           => '#2d2d30',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * wrapper dark control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wrapper_background_black', array(
    'label'    => __('Background Color (Black)', 'zonya'),
    'section'  => 'colors',
    'priority' => 25,
)));

/**
 * header background settings
 */
$wp_customize->add_setting('header_bg', array(
    'default'           => '#29292c',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * header background control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'header_bg', array(
    'label'    => __('Header Background Color', 'zonya'),
    'section'  => 'colors',
    'priority' => 120,
)));

/**
 * footer background settings
 */
$wp_customize->add_setting('footer_bg', array(
    'default'           => '#2d2d30',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * footer background control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_bg', array(
    'label'    => __('Main Footer Background', 'zonya'),
    'section'  => 'colors',
    'priority' => 130,
)));

/**
 * sub footer background settings
 */
$wp_customize->add_setting('sub_footer_bg', array(
    'default'           => '#29292c',
    'sanitize_callback' => 'sanitize_hex_color',
    'type' => 'option'
));

/**
 * sub footer background control
 */
$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'sub_footer_bg', array(
    'label'    => __('Sub Footer Background', 'zonya'),
    'section'  => 'colors',
    'priority' => 135,
)));

/**
 *  END COLOURS SECTION
 */


///////////////////////////////////////
//     CUSTOM LOGO SECTION          //
/////////////////////////////////////
	
//CREATE CUSTOM LOGO SUBSECTION
$wp_customize->add_section( 'custom_logo_section', array(
	'title'          => 'Header Settings & Logo',
	'priority'       => 30,
) );

//CUSTOM LOGO SETTINGS
$wp_customize->add_setting('custom_logo', array(
    'default'  => get_template_directory_uri() . '/style/images/logo.png',
    'type' => 'option'

));

//CUSTOM LOGO
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
    'label'    => __('Custom Logo Upload', 'zonya'),
    'section'  => 'custom_logo_section',
    'priority'       => 1
)));

//CUSTOM RETINA LOGO SETTINGS
$wp_customize->add_setting('custom_logo_retina', array(
    'default'  => get_template_directory_uri() . '/style/images/logo@2x.png',
    'type' => 'option'

));

//CUSTOM RETINA LOGO
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'custom_logo_retina', array(
    'label'    => __('Retina Logo - Needs @2x on the file e.g logo@2x.png', 'zonya'),
    'section'  => 'custom_logo_section',
    'priority'       => 1
)));

//logo alt text
$wp_customize->add_setting( 'custom_logo_alt_text', array(
    'default'        => 'Alt Text',
    'type' => 'option'
) );

//logo alt text
$wp_customize->add_control( 'custom_logo_alt_text', array(
    'label' => __('Custom Logo Alt Text', 'zonya'),
    'type' => 'text',
    'section' => 'custom_logo_section',
) );

$wp_customize->add_setting('header_layout', array(
    'default' => 'basic',
    'type' => 'option'
));

$wp_customize->add_control( 'header_layout', array(
    'label'   => __('Choose layout for Header', 'loom'),
    'section' => 'custom_logo_section',
    'type'    => 'select',
    'priority' => 10,
    'choices'    => array(
        'basic' => 'Basic Header',
        'social-dark' => 'Header With Details & Social (Dark)',
        'social-light' => 'Header With Details & Social (Light)',
        'social-line' => 'Header With Details & Social (Underline)',
    ),
));

$wp_customize->add_setting( 'centered_header', array(
    'default' => 'no',
    'type' => 'option'
) );

$wp_customize->add_control( 'centered_header', array(
    'label' => 'Center Header? Centers logo & navigation on desktops.',
    'type' => 'radio',
    'section' => 'custom_logo_section',
    'priority' => 12,
    'choices'    => array(
        'no' => 'No',
        'yes' => 'Yes'
    ),
) );

for( $i = 1; $i < 7; $i++ ){
	$wp_customize->add_setting("header_social_$i", array(
	    'default' => 'pinterest',
	    'type' => 'option'
	));
	
	$wp_customize->add_control( "header_social_$i", array(
	    'label'   => __("Header Social Icon $i", 'loom'),
	    'section' => 'custom_logo_section',
	    'type'    => 'select',
	    'priority' => 20 + $i + $i,
	    'choices'    => $social_options
	));
	
	$wp_customize->add_setting( "header_social_link_$i", array(
	    'default'        => '',
	    'type' => 'option'
	) );
	
	$wp_customize->add_control( "header_social_link_$i", array(
	    'label' => __("header Social Link $i", 'loom'),
	    'type' => 'text',
	    'section' => 'custom_logo_section',
	    'priority' => 21 + $i + $i,
	) );
}

//Header phone
$wp_customize->add_setting( 'header_phone', array(
    'default' => '+00 (123) 456 78 90',
    'type' => 'option'
) );

//Header Phone
$wp_customize->add_control( 'header_phone', array(
    'label' => __('Header Phone Number', 'loom'),
    'type' => 'text',
    'section' => 'custom_logo_section',
    'priority' => 998
) );

//Header email
$wp_customize->add_setting( 'header_email', array(
    'default' => 'hello@email.com',
    'type' => 'option'
) );

//Header email
$wp_customize->add_control( 'header_email', array(
    'label' => __('Header Email Address', 'loom'),
    'type' => 'text',
    'section' => 'custom_logo_section',
    'priority' => 999
) );

/**
 * Ebor Framework
 * Custom Favicons
 * @since version 1.0
 * @author TommusRhodus
 */
 
 /**
  * Create the Favicon Section
  */
 $wp_customize->add_section( 'favicon_settings', array(
 	'title'          => 'Favicons',
 	'priority'       => 30,
 ) );

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('custom_favicon', array(
	'default' => '',
	'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'custom_favicon', array(
	'label'    => __('Custom Favicon Upload', 'ebor_starter'),
	'section'  => 'favicon_settings',
	'settings' => 'custom_favicon',
	'priority'       => 21,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('mobile_favicon', array(
    'default' => '',
    'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, 'mobile_favicon', array(
    'label'    => __('Non-Retina Mobile Favicon Upload', 'ebor_starter'),
    'section'  => 'favicon_settings',
    'settings' => 'mobile_favicon',
    'priority'       => 22,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('72_favicon', array(
    'default' => '',
    'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '72_favicon', array(
    'label'    => __('iPad Favicon (72x72px)', 'ebor_starter'),
    'section'  => 'favicon_settings',
    'settings' => '72_favicon',
    'priority'       => 23,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('114_favicon', array(
   'default' => '',
   'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '114_favicon', array(
   'label'    => __('Retina iPhone Favicon (114x114px)', 'ebor_starter'),
   'section'  => 'favicon_settings',
   'settings' => '114_favicon',
   'priority'       => 24,
)));

/**
 * Custom Favicon Defaults
 */
$wp_customize->add_setting('144_favicon', array(
	'default' => '',
	'type' => 'option'
));

/**
 * Custom Favicon Upload Control
 */
$wp_customize->add_control( new WP_Customize_Upload_Control($wp_customize, '144_favicon', array(
	'label'    => __('Retina iPad Favicon (144x144px)', 'ebor_starter'),
	'section'  => 'favicon_settings',
	'settings' => '144_favicon',
	'priority'       => 25,
)));

///////////////////////////////////////
//     CUSTOM CSS SECTION           //
/////////////////////////////////////

//CREATE CUSTOM CSS SUBSECTION
$wp_customize->add_section( 'custom_css_section', array(
	'title'          => 'Custom CSS',
	'priority'       => 200,
) ); 
      
$wp_customize->add_setting( 'custom_css', array(
  'default'        => '',
  'type'           => 'option',
) );

$wp_customize->add_control( new Ebor_Customize_Textarea_Control( $wp_customize, 'custom_css', array(
  'label'   => __('Custom CSS', 'zonya'),
  'section' => 'custom_css_section',
  'settings'   => 'custom_css',
) ) );


///////////////////////////////////////
//     FOOTER SETTINGS             //
/////////////////////////////////////
	
//CREATE CUSTOM CSS SUBSECTION
$wp_customize->add_section( 'footer_section', array(
	'title'          => 'Footer Settings',
	'priority'       => 40,
	'description' => 'PLEASE NOTE: Footer Social Icons will only show if the "Footer" menu location is not set with a menu in "appearance" -> "menus"'
) );

$wp_customize->add_setting('footer_layout', array(
    'default' => 'multiwidget',
    'type' => 'option'
));

$wp_customize->add_control( 'footer_layout', array(
    'label'   => __('Choose layout for Footer', 'zonya'),
    'section' => 'footer_section',
    'type'    => 'select',
    'priority' => 1,
    'choices'    => array(
        'singlewidget' => 'Single Widget Footer',
        'multiwidget' => 'Multi Widget Footer',
    ),
));

//copyright text
$wp_customize->add_setting( 'copyright', array(
    'default'        => 'Configure in "Appearance" => "Customise new" => "Footer"',
    'type' => 'option'
) );

//copyright text
$wp_customize->add_control( new Ebor_Customize_Textarea_Control( $wp_customize, 'copyright', array(
    'label'   => __('SubFooter Copyright Text', 'zonya'),
    'section' => 'footer_section',
    'settings'   => 'copyright',
    'priority' => 5,
) ) );

for( $i = 1; $i < 8; $i++ ){
	$wp_customize->add_setting("footer_social_$i", array(
	    'default' => 'pinterest',
	    'type' => 'option'
	));
	
	$wp_customize->add_control( "footer_social_$i", array(
	    'label'   => __("Footer Social Icon $i", 'zonya'),
	    'section' => 'footer_section',
	    'type'    => 'select',
	    'priority' => 10 + $i + $i,
	    'choices'    => $social_options
	));
	
	$wp_customize->add_setting( "footer_social_link_$i", array(
	    'default'        => '',
	    'type' => 'option'
	) );
	
	$wp_customize->add_control( "footer_social_link_$i", array(
	    'label' => __("Footer Social Link $i", 'zonya'),
	    'type' => 'text',
	    'section' => 'footer_section',
	    'priority' => 11 + $i + $i,
	) );
}
      	
}