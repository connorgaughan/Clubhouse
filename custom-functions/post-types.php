<?php
// Register Portfolio Custom Post Types
add_action('init', 'portfolio_register');
	function portfolio_register() {
	$labels = array(
		'name'                  => _x('Projects', 'post type general name'),
		'singular_name'         => _x('Projects', 'post type singular name'),
		'add_new'               => _x('Add New Project', 'Project item'),
		'add_new_item'          => __('Add New Project'),
		'edit_item'             => __('Edit Project'),
		'new_item'              => __('New Project'),
		'view_item'             => __('View Project'),
		'search_items'          => __('Search Projects'),
		'not_found'             => __('No Projects found'),
		'not_found_in_trash'    => __('Nothing found in Trash'),
		'parent_item_colon'     => ''
	);
	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-page',
		'rewrite'               => array('slug'=>'work'),
		'capability_type'       => 'post',
		'hierarchical'          => false,
		'menu_position'         => null,
		'supports' 				=> array('title','editor','thumbnail', 'excerpt', 'author'),
	);
	register_post_type( 'portfolio' , $args );
}  


// Register Press Taxonomy
function project_taxonomy() {
	register_taxonomy(
	'project_type', 
	'portfolio',
		array(
			"hierarchical"          => true,
			"label"                 => 'Project Type',
			'public'                => true,
			'query_var'             => true,
			'show_ui'               => true,
			'rewrite'               => true
		)
	);
	register_taxonomy(
	'featured',
	'portfolio',
		array(
			"hierarchical"          => true,
			"label"                 => 'Feature Type',
			'public'                => true,
			'query_var'             => true,
			'show_ui'               => true,
			'rewrite'               => true
		)
	);
}
add_action('init', 'project_taxonomy');


// Add Portfolios to the Author Pages
function custom_post_author_archive($query) {
	if ($query->is_author)
		$query->set( 'post_type', array('portfolio', 'post') );
    remove_action( 'pre_get_posts', 'custom_post_author_archive' );
}
add_action('pre_get_posts', 'custom_post_author_archive');


// Register Team Custom Post Types
add_action('init', 'team_register');
	function team_register() {
	$labels = array(
		'name'                  => _x('Team', 'post type general name'),
		'singular_name'         => _x('Team Member', 'post type singular name'),
		'add_new'               => _x('Add Team Member', 'Team Member'),
		'add_new_item'          => __('Add Team Member'),
		'edit_item'             => __('Edit Team Member'),
		'new_item'              => __('New Team Member'),
		'view_item'             => __('View Team Member'),
		'search_items'          => __('Search Team Members'),
		'not_found'             => __('No Projects found'),
		'not_found_in_trash'    => __('Nothing found in Trash'),
		'parent_item_colon'     => ''
	);
	$args = array(
		'labels'                => $labels,
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-id',
		'rewrite'               => array('slug'=>'team-member'),
		'capability_type'       => 'post',
		'hierarchical'          => false,
		'menu_position'         => null,
		'supports' 				=> array('title','thumbnail'),
	);
	register_post_type( 'team' , $args );
}     
?>