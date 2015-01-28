<?php 
	add_action('wp_head','ebor_custom_colours', 20);
	function ebor_custom_colours(){
		
		$highlight = get_option('highlight_colour','#72b6af');
		$highlightrgb = ebor_hex2rgb( $highlight );
		$highlight_hover = get_option('highlight_hover_colour','#62a39c');
		$dark_wrapper = get_option('wrapper_background_dark', '#f1f1f1');
		$header_bg = get_option('header_bg', '#29292c');
		$footer_bg = get_option('footer_bg', '#2d2d30');
		$sub_footer_bg = get_option('sub_footer_bg', '#29292c');
		$black_wrapper = get_option('wrapper_background_black','#2d2d30');
?>
	
<style type="text/css">
	
	/**
	 * Header
	 */
	.navbar-header {
		background: <?php echo $header_bg; ?>;
	}

	.navbar .dropdown-menu {
		background: <?php echo $header_bg; ?>;
	}
	
	/**
	 * Footer
	 */
	footer.black-wrapper {
		background: <?php echo $footer_bg; ?>;
	}
	
	.subfooter,
	#sub-header.sub-footer.social-line {
		background: <?php echo $sub_footer_bg; ?>;
	}
	
	/**
	 * Page Wrappers Backgounds
	 */
	.light-wrapper,
	#sub-header.sub-footer.social-light  {
	    background: #<?php echo get_background_color(); ?>;
	}
	.dark-wrapper,
	#sub-header.sub-footer.social-line .container:after {
	    background: <?php echo $dark_wrapper; ?>;
	}
	.black-wrapper, {
	    background: <?php echo $black_wrapper; ?>;
	}
	
	.progress.plain,
	.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content, .woocommerce-page .widget_price_filter .price_slider_wrapper .ui-widget-content {
	    background: rgba(<?php echo $highlightrgb; ?>,0.15);
	}
	.spinner,
	#fancybox-loading div,
	.tp-loader.spinner0 {
	    border-left: 3px solid rgba(<?php echo $highlightrgb; ?>,.15);
	    border-right: 3px solid rgba(<?php echo $highlightrgb; ?>,.15);
	    border-bottom: 3px solid rgba(<?php echo $highlightrgb; ?>,.15);
	    border-top: 3px solid rgba(<?php echo $highlightrgb; ?>,.8);
	}
	#sub-header.sub-footer.social-line .pull-left a:hover,
	#sub-header.sub-footer.social-light .pull-left a:hover {
		color: <?php echo $highlight_hover; ?>;
	}
	a,
	.woocommerce-tabs ul.tabs li.active,
	#sub-header .pull-left i {
	    color: <?php echo $highlight; ?>;
	}
	.yamm-content a:hover {
		color: <?php echo $highlight; ?> !important;
	}
	.colored {
	    color: <?php echo $highlight; ?>
	}
	.post-title a:hover {
	    color: <?php echo $highlight; ?>
	}
	.black-wrapper a:hover {
	    color: <?php echo $highlight; ?>
	}
	.color-wrapper,
	.ebor-count,
	.woocommerce .widget_price_filter .ui-slider-horizontal .ui-slider-range, .woocommerce-page .widget_price_filter .ui-slider-horizontal .ui-slider-range {
	    background: <?php echo $highlight; ?>
	}
	ul.circled li:before {
	    color: <?php echo $highlight; ?>;
	}
	.contact-info i {
	    color: <?php echo $highlight; ?>;
	}
	footer.black-wrapper a:hover {
	    color: <?php echo $highlight; ?>
	}
	.subfooter a:hover {
	    color: <?php echo $highlight; ?>
	}
	.nav > li > a:hover {
	    color: <?php echo $highlight; ?>;
	}
	.nav > li.current > a {
	    color: <?php echo $highlight; ?>;
	}
	.navbar .dropdown-menu {
	    border-top: 2px solid <?php echo $highlight; ?> !important;
	}
	.navbar .nav .open > a,
	.navbar .nav .open > a:hover,
	.navbar .nav .open > a:focus {
	    color: <?php echo $highlight; ?>;
	}
	.navbar .dropdown-menu > li > a:hover,
	.navbar .dropdown-menu > li > a:focus,
	.navbar .dropdown-submenu:hover > a,
	.navbar .dropdown-submenu:focus > a,
	.navbar .dropdown-menu > .active > a,
	.navbar .dropdown-menu > .active > a:hover,
	.navbar .dropdown-menu > .active > a:focus {
	    color: <?php echo $highlight; ?>;
	}
	.current-menu-parent > a {
	    color: <?php echo $highlight; ?> !important;
	}
	.btn,
	.btn-submit,
	input[type="submit"],
	.woocommerce span.onsale, .woocommerce-page span.onsale, .woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale,
	.woocommerce .button,
	.added_to_cart {
	    background: <?php echo $highlight; ?>;
	}
	.btn:hover,
	.btn:focus,
	.btn:active,
	.btn.active,
	input[type="submit"]:hover,
	.woocommerce .button:hover,
	.added_to_cart:hover,
	.woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle {
	    background: <?php echo $highlight_hover; ?>;
	}
	.btn-white:hover,
	.btn-white:focus,
	.btn-white:active,
	.btn-white.active {
	    background: <?php echo $highlight; ?> !important;
	}
	.owl-carousel .owl-controls .owl-nav .owl-prev:hover,
	.owl-carousel .owl-controls .owl-nav .owl-next:hover {
	    color: <?php echo $highlight; ?>
	}
	.progress-list li em {
	    color: <?php echo $highlight; ?>;
	}
	.progress.plain .bar {
	    background: <?php echo $highlight; ?>;
	}
	.parallax a:hover {
	    color: <?php echo $highlight; ?>
	}
	.newsletter-wrapper #mc_embed_signup .button {
	    background: <?php echo $highlight; ?>;
	}
	.newsletter-wrapper #mc_embed_signup .button:hover {
	    background: <?php echo $highlight_hover; ?>;
	}
	.pricing .plan h4 span {
	    color: <?php echo $highlight; ?>
	}
	.post-content .meta a:hover,
	.more {
	    color: <?php echo $highlight; ?>
	}
	.post-content .meta a:hover
	.post-content .footer-meta a:hover {
	    color: <?php echo $highlight; ?>
	}
	.pagination ul > li > a:hover,
	.pagination ul > li > a:focus,
	.pagination ul > .active > a,
	.pagination ul > .active > span {
	    color: <?php echo $highlight; ?> !important;
	}
	.sidebox a:hover {
	    color: <?php echo $highlight; ?>
	}
	ul.tag-list li a:hover {
	    color: <?php echo $highlight; ?> !important;
	}
	textarea:focus,
	input[type="text"]:focus,
	input[type="password"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="time"]:focus,
	input[type="week"]:focus,
	input[type="number"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="search"]:focus,
	input[type="tel"]:focus,
	input[type="color"]:focus,
	.uneditable-input:focus {
	    -webkit-box-shadow: 0 1px 0 <?php echo $highlight; ?>;
	    -moz-box-shadow: 0 1px 0 <?php echo $highlight; ?>;
	    box-shadow: 0 1px 0 <?php echo $highlight; ?>;
	}
	#comments .info h2 a:hover {
	    color: <?php echo $highlight; ?>
	}
	#comments a.reply-link:hover {
	    color: <?php echo $highlight; ?>
	}
	.filter li a:hover,
	.filter li a.active {
	    color: <?php echo $highlight; ?>
	}
	.panel-title > a:hover {
	    color: <?php echo $highlight; ?>
	}
	.tabs-top .tab a:hover,
	.tabs-top .tab.active a {
	    color: <?php echo $highlight; ?>;
	}
	.tooltip-inner {
	    background-color: <?php echo $highlight; ?>;
	}
	.tooltip.top .tooltip-arrow,
	.tooltip.top-left .tooltip-arrow,
	.tooltip.top-right .tooltip-arrow {
	    border-top-color: <?php echo $highlight; ?>
	}
	.tooltip.right .tooltip-arrow {
	    border-right-color: <?php echo $highlight; ?>
	}
	.tooltip.left .tooltip-arrow {
	    border-left-color: <?php echo $highlight; ?>
	}
	.tooltip.bottom .tooltip-arrow,
	.tooltip.bottom-left .tooltip-arrow,
	.tooltip.bottom-right .tooltip-arrow {
	    border-bottom-color: <?php echo $highlight; ?>
	}
	@media (max-width: 767px) { 
		.filter li a:hover,
		.filter li a.active {
		    color: <?php echo $highlight; ?>
		}
	}
	
	<?php echo get_option('custom_css'); ?>
	
</style>
	
<?php }

add_action('login_head','ebor_custom_admin');
function ebor_custom_admin(){
	if( get_option('custom_login_logo') )
		echo '<style type="text/css">
				.login h1 a { 
					background-image: url("'.get_option('custom_login_logo').'"); 
					background-size: auto 80px;
					width: 100%; 
				} 
			</style>';
}