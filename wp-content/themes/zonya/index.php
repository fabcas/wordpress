<?php 

/**
 * index.php
 * The main post loop in Zonya
 * @author TommusRhodus
 * @package Zonya
 * @since 1.0.0
 */
get_header(); 

/**
 * Get the blog layout
 */
get_template_part('loop/loop', get_option('blog_layout', 'blog-grid-sidebar') );

get_footer();