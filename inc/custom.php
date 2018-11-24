<?php 
global $redux_demo;

/*------------------------------------------------
Comment Form nav
--------------------------------------------------*/

function up_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'up_text_domain' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'up_text_domain' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'up_text_domain' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}


/*----------------------------------------------
Allow Email Provider for registraion this site
------------------------------------------------*/


function mh_check_email_provider($errors, $sanitized_user_login, $user_email){

    // Allowed Email provider. Must include extention
    $allowed_provider = array('yahoo.com', 'gmail.com', 'ymail.com', 'live.com', 'msn.com');
   
    // Get users email provider
    $user_mail_provider = substr($user_email, strpos($user_email, '@')+1);
    // Check if users email provider is allowed
    if(in_array($user_mail_provider, $allowed_provider)){
        // Allowed provider:)
        // Return unchanged $erorrs
        return $errors;
    }
    // Provider not allowed :(
    // Add error code and return
    $errors->add( 'restricted_emial_provider', __( '<strong>ERROR</strong>: We only support ' . implode(', ', $allowed_provider) ) );
    return $errors;
    // That's it
}
add_filter('registration_errors', 'mh_check_email_provider', 100, 3);

/*----------------------------------------------------------
wordpress dashboard widget remove
--------------------------------------------------------------*/

function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

/*--------------------------------------------------
wp version remove in header
----------------------------------------------------*/
remove_action('wp_head', 'wp_generator');

/*--------------------------------------------------
wp version remove in footer
----------------------------------------------------*/
function my_footer_version() {
    return 'Version 90';
}
add_filter( 'update_footer', 'my_footer_version', 11 );


/*-------------------------------------------
serice post tab remove
---------------------------------------------*/
function wp_admin_style_seric_hide() { ?>
<style type="text/css">
#seriesdiv {
  display: none;
}
</style>
<?php }
 
add_action( 'admin_head', 'wp_admin_style_seric_hide' );


/*-------------------------------------------
Custom Gravatar
---------------------------------------------*/
add_filter( 'avatar_defaults', 'up_custom_gravatar' );  
function up_custom_gravatar ($avatar_defaults) {
     $myavatar = get_stylesheet_directory_uri() . '/img/logo.png';
     $avatar_defaults[$myavatar] = "CB";
     return $avatar_defaults;
}



/****************************Login Form Style**********************************/
function customjs_enqueue_styles() { 
global $redux_demo;
	?>

    <style type="text/css">
        body.login div#login h1 a{background: url(<?php echo $redux_demo['login_logo']['url'] ?>) no-repeat;  height: 100px;  width: 297px;}   
		div#login .message.register,div#login .message.register a{font-size: 16px;font-family: sans-serif;color: red;text-align: justify;font-weight: bold;}  
		body.login div#login a {color: #FFFFFF;font-size: 16px;font-weight: bold;}  			
		.login form {background: none repeat scroll 0 0 #35B70D;  border-radius: 10px;}			
		.login label {color: #FFFFFF;font-size: 16px;font-weight: bold;}
		.login form .forgetmenot label {font-size: 14px;}	
		body.login #login #nav a {color:#666;}
		body.login #login #backtoblog a {color:#666;}
		body.login #login .submit input {color: #fff;
    background-color: #666;
    border: 1px solid #ddd;
    font-size: 18px;
    font-family: open sans;
    font-weight: 600;
    padding: 10px 15px;
    min-height: 50px;
    border-radius: 5px;}
	body.login #login #reg_passmail {    color: #fff;
    font-size: 16px;
    text-align: justify;}
    </style>
<?php	


}
add_action( 'login_enqueue_scripts', 'customjs_enqueue_styles' );


function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
 
/*---------------------------------------------------------
reg message change Terams
------------------------------------------------------------*/
function change_reg_message($message) 
{
	global $redux_demo;
	// change messages that contain 'Register' 
	if (strpos($message, 'Register') !== FALSE) {
		$newMessage = $redux_demo['register_message'];
		return '<p class="message register">' . $newMessage . '</p>';
	}
	else {
		return $message;
	}
}
// add our new function to the login_message hook
add_action('login_message', 'change_reg_message');



// Dashboard Logo
function dashboard_admin_palen_logo() {
	global $redux_demo;
	$blogname = $redux_demo['dashboard-logo'];
	$dashboard_logo_upload = $redux_demo['dashboard-logo-upload']['url'];
	wp_register_script( 'admin_js_logo', get_template_directory_uri().'/js/logo.js',  array( 'jquery' ), true  );
	wp_enqueue_script( 'admin_js_logo' );

	
	$translation_array = array( 'templateUrl' => $dashboard_logo_upload );
	
	$sitetitle_array = array( 'siteTitle' => $blogname );
	
	wp_localize_script( 'admin_js_logo', 'admin_logo', $translation_array );
	wp_localize_script( 'admin_js_logo', 'logo_site_title', $sitetitle_array );

	}
add_action( 'admin_enqueue_scripts', 'dashboard_admin_palen_logo' );




/*
* Remove the Wordpress Logo from the Wordpress Admin Bar
*/
function remove_wp_logo() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu('wp-logo');
}
add_action( 'wp_before_admin_bar_render', 'remove_wp_logo' );



/*----------------------------------------------------
Admin footer modification
-------------------------------------------------------*/
 
function remove_footer_admin ()
{
    echo '<span id="footer-thankyou">Design &amp; Developed by <a href="http://www.codingbank.com" target="_blank">Coding Bank</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/*--------------------------------------------------------
up version remove in rss
----------------------------------------------------------*/
function wpt_remove_version() {
return '';
}
add_filter('the_generator', 'wpt_remove_version');

/*----------------------------------------------------------
Custom metabox
------------------------------------------------------------*/

function up_custom_metabox() {

	add_meta_box('terams_notice', 'Terms and Conditions', 'up_custom_metabox_output', 'post', 'side', 'high');

}
add_action('add_meta_boxes', 'up_custom_metabox');

function up_custom_metabox_output(){
	global $redux_demo;

	echo $redux_demo['terms_and_conditions'];

}



// Text Automatic Replace
function replace_text_wps($text){
	 $replace = array(
		 'wordpress' => 'WordPress',
		 'ziddu.com' => 'link broken',
		 'popcash.com' => 'link broken',
		 'fucking' => '********',
		 'sexy' => '********',
		 'sex' => '********',
	 );
 $text = str_replace(array_keys($replace), $replace, $text);
 return $text;
}
add_filter('the_content', 'replace_text_wps');
add_filter('the_excerpt', 'replace_text_wps');










// URL Field Remove from comment form

function crunchify_disable_comment_url($fields) {
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields','crunchify_disable_comment_url');



// Change the default wordpress@ email address
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
	global $redux_demo;
return $redux_demo['email_sender_email'];
}
function new_mail_from_name($old) {
	global $redux_demo;
return $redux_demo['email_sender_name'];
}





//Insert ads after second paragraph of single post content.
add_filter( 'the_content', 'prefix_insert_post_ads' );
function prefix_insert_post_ads( $content ) {
	global $redux_demo;
	$count_ads_para = $redux_demo['single_content_ads_count'];
	$content_ads_code = $redux_demo['single_content_ads'];
	if ( is_single() && ! is_admin() ) {
		return prefix_insert_after_paragraph( $content_ads_code, $count_ads_para, $content );
	}
	return $content;
}
// Parent Function that makes the magic happen
function prefix_insert_after_paragraph( $insertion, $paragraph_id, $content ) {
	$closing_p = '</p>';
	$paragraphs = explode( $closing_p, $content );
	foreach ($paragraphs as $index => $paragraph) {
		if ( trim( $paragraph ) ) {
			$paragraphs[$index] .= $closing_p;
		}
		if ( $paragraph_id == $index + 1 ) {
			$paragraphs[$index] .= $insertion;
		}
	}
	return implode( '', $paragraphs );
}



/** remove redux menu under the tools **/
add_action( 'admin_menu', 'remove_redux_menu',12 );
function remove_redux_menu() {
	remove_submenu_page('tools.php','redux-about');
}

?>