<?php 
add_action( 'init', 'blentech_theme_custom_post' );
function blentech_theme_custom_post() {
	register_post_type( 'system-items',
		array(
			'labels' => array(
				'name' => __( 'System Items' ),
				'singular_name' => __( 'System Item' ),
				'add_new_item' => __( 'Add New System Item' )
			),
			'public' => true,
			'supports' => array('title', 'editor', 'custom-fields', 'thumbnail'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'system-item'),
		)
	);
	
}



function custom_post_taxonomy() {
	register_taxonomy(
		'event_cat',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'event-items',                  //post type name
		array(
			'hierarchical'          => true,
			'label'                         => 'Event Category',  //Display name
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'event-category', // This controls the base slug that will display before each term
				'with_front'    => true // Don't display the category base before
				)
			)
	);
}
add_action( 'init', 'custom_post_taxonomy');   

?>