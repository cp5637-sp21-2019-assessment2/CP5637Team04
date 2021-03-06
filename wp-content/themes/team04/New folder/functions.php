<?php
// linking CSS and JS file.

function func_setup(){
	wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab');
	wp_enqueue_style('fontawesome', '//use.fontawesome.com/releases/v5.1.0/css/all.css');
	wp_enqueue_style('style', get_stylesheet_uri(), NULL, microtime(), 'all');
	wp_enqueue_script("main", get_theme_file_uri('/js/main.js'), NULL, microtime(), true);
}

add_action('wp_enqueue_scripts', 'func_setup');

// Theme Support // Will provide features to posts

function func_init() {
	// featured image
	add_theme_support('post-thumbnails');
	// title tag
	add_theme_support('title-tag');
	//html5 attributes
	add_theme_support('html5',
		array('comment-list', 'comment-form', 'search-form')
	);
}

add_action('after_setup_theme', 'func_init');

function bootstrapstarter_wp_setup() {
	add_theme_support('title-tag');
}
add_action('after_setup_theme','bootstrapstarter_wp_setup');
// posttype for custom posts

function func_custom_posts() {
	register_post_type('project',
		array(
			'rewrite' => array('slug' => 'projects'),
			'labels' => array(
				'name' => 'Projects',
				'singular_name' => 'Project',
				'add_new_item' => 'Add',
				'edit_item' => 'Edit Project'
		),
		'menu-icon' => 'dashicons-media-document',
		'public' => true,
		'has_archive' => true,
		'supports' => array(
			'title', 'thumbnail', 'editor', 'excerpt', 'comments'
		)
	  )
	);
}

add_action('init', 'func_custom_posts');

//sidenavbar

function gt_widgets() {
	register_sidebar(
		array(
		'name' => 'Main Sidebar',
		'id' => 'main_sidebar',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
		)
	);
}
add_action('widgets_init', 'gt_widgets');
