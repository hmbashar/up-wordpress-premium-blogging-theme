<?php 

function up_widget_areas() {

  
	register_sidebar( array(
		'name' => __( 'Right Sidebar', 'up_text_domain' ),
		'id' => 'right_sidebar',
		'before_widget' => '<div class="single_sidebar">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Left', 'up_text_domain' ),
		'id' => 'footer_widget_left',
		'before_widget' => '<div class="single_widget floatleft">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Middle', 'up_text_domain' ),
		'id' => 'footer_widget_middle',
		'before_widget' => '<div class="single_widget floatleft">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Widget Right', 'up_text_domain' ),
		'id' => 'footer_widget_right',
		'before_widget' => '<div class="single_widget floatright">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	register_sidebar( array(
		'name' => __( 'Header Ads', 'up_text_domain' ),
		'id' => 'header_ads',
		'before_widget' => '<div class="banner_ads floatright">',
		'after_widget' => '</div>',
		'before_title' => '<h2 style="display:none">',
		'after_title' => '</h2>',
		'description' => __( 'This sidebar is Header Ads', 'up_text_domain' ),
	) );


}
add_action('widgets_init', 'up_widget_areas');

?>