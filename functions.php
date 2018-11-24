<?php 
/**
 * Edu Theme Setup & Functions.
 * @package UP
 * @Atuhor: Md Abul Bashar
 *
 */

/*------------------------------------------
Theme Version
--------------------------------------------*/
$up_theme_version = 1.0;
global $redux_demo;


/*-------------------------------------------
Theme Style and jQuery script
--------------------------------------------*/

function theme_style_and_jquery(){	
	global $up_theme_version;
	/*Style CSS*/
	wp_enqueue_style( 'noq-slicknav-css', get_template_directory_uri() . '/css/slicknav.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-normalize-css', get_template_directory_uri() . '/css/normalize.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-comment-css', get_template_directory_uri() . '/css/comments.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-fonts-css', get_template_directory_uri() . '/css/fonts.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-font-awesome', get_template_directory_uri() .'/css/font-awesome.min.css', array(), false );
	wp_enqueue_style( 'noq-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css', array(), false );
	wp_enqueue_style( 'noq-slicknav-css', get_template_directory_uri() .'/css/slicknav.css', array(), false );
	wp_enqueue_style( 'google-fonts-css', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300', array(), false );
	wp_enqueue_style( 'noq-menu-css', get_template_directory_uri() . '/css/menu.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-carousel-css', get_template_directory_uri() . '/slider/owl.carousel.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-owl-theme-css', get_template_directory_uri() . '/slider/owl.theme.css', array(), $up_theme_version );
	wp_enqueue_style( 'noq-main-css', get_stylesheet_uri(), array(), $up_theme_version );	
	wp_enqueue_style( 'noq-responsive-css', get_template_directory_uri() . '/responsive.css', array(), $up_theme_version );
	
	
	/*jQuery*/
	wp_enqueue_script( 'noq-modernizr-js', get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js', array( 'jquery' ), $up_theme_version, true );
	
	wp_enqueue_script( 'noq-carousel-js', get_template_directory_uri() . '/slider/owl.carousel.min.js', array( 'jquery' ), $up_theme_version, true );
	wp_enqueue_script( 'noq-plugins-js', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), $up_theme_version, true );	
	wp_enqueue_script( 'noq-bootstrap-js', get_template_directory_uri() .'/js/bootstrap.min.js', array( 'jquery' ), $up_theme_version, true );
	wp_enqueue_script( 'noq-slicknav-js', get_template_directory_uri() .'/js/jquery.slicknav.min', array( 'jquery' ), $up_theme_version, true );
	wp_enqueue_script( 'noq-main-js', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), $up_theme_version, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	
	
	wp_enqueue_script( 'jquery' );
}
add_action('wp_enqueue_scripts', 'theme_style_and_jquery');


// Admin Panel Css
function wp_admin_panel_css(){
	global $up_theme_version;
	wp_enqueue_style( 'admin-panel-css', get_template_directory_uri() . '/css/admin-css.css', array(), $up_theme_version );

}
add_action('admin_enqueue_scripts', 'wp_admin_panel_css');

/*----------------------------------------------
register text domain
------------------------------------------------*/
if ( function_exists('load_theme_textdomain') ){
load_theme_textdomain('up_text_domain', get_template_directory_uri().'/languages');

}

/*---------------------------------------------
Thumbnails Support
-----------------------------------------------*/
$fe_imgwidth = $redux_demo['index-featured-img-width'];
$fe_imgheight = $redux_demo['index-featured-img-height'];
add_theme_support( 'post-thumbnails', array( 'post') );

add_image_size( 'post-image', $fe_imgwidth, $fe_imgheight, true );
	


/*-------------------------------------
	Add Common <head> Items
--------------------------------------*/
function up_meta_charset() {
	echo '<meta charset="' . get_bloginfo( 'charset' ) . '" />' . "\n";
}

function up_meta_viewport() {
	echo '<meta name="viewport" content="initial-scale=1.0" />' . "\n";
}

function up_link_profile() {
	echo '<link rel="profile" href="http://gmpg.org/xfn/11" />' . "\n";
}

function up_link_pingback() {
	echo '<link rel="pingback" href="' . get_bloginfo( 'pingback_url' ) . '" />' . "\n";
}
function up_favicon() {
	echo '<link rel="icon" href="' . esc_url( get_template_directory_uri() ) .'/img/favicon.gif" type="image/x-icon" />' . "\n";
}
function seo_keywords() {
	global $redux_demo;
	if($redux_demo['seo_keywords']) {
?>
	<meta name="keywords" content="<?php echo $redux_demo['seo_keywords'] . "\n"; ?>"/>
<?php
	}
}

function seo_description() {
	global $redux_demo;
	if($redux_demo['seo_description']){
?>
	<meta name="description" content="<?php echo $redux_demo['seo_description'] . "\n"; ?>"/>
<?php	
	}
}


function up_google_analytics() {
	global $redux_demo;
	if($redux_demo["google_analytics"]){
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $redux_demo["google_analytics"]?>', 'auto');
  ga('send', 'pageview');

</script>

<?php
}
}
	
	
/*----------------------------------------------
Setup Theme Functions
------------------------------------------------*/
function setup_theme_functions(){	
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form' ) );
	add_filter('widget_text', 'do_shortcode');	
	add_action( 'wp_head', 'up_meta_charset', 0 );
	add_action( 'wp_head', 'up_meta_viewport', 0 );
	add_action( 'wp_head', 'up_link_profile', 1 );
	add_action( 'wp_head', 'up_link_pingback', 1 );
	add_action( 'wp_head', 'up_favicon', 1 );
	add_action( 'wp_head', 'up_google_analytics', 1 );
	add_action( 'wp_head', 'seo_keywords', 1 );
	add_action( 'wp_head', 'seo_description', 1 );
	if (function_exists('register_nav_menu')) {
		register_nav_menu( 'main_menu', __( 'Main Menu', 'up_text_domain' ) );
		register_nav_menu( 'logout_menu', __( 'Log Out Menu', 'up_text_domain' ) );
		register_nav_menu( 'loginmenu', __( 'Log In Menu', 'up_text_domain' ) );
	}
}
add_action('after_setup_theme', 'setup_theme_functions');


/*---------------------------------------------
Add Other Functions page
-----------------------------------------------*/
require_once( 'inc/nav-menu-template.php' );
require_once( 'inc/widgets.php' );
require_once( 'inc/custom.php' );
require_once('inc/css.php');
require_once('inc/widgets-development.php');

/*--------------------------------------------
Default Menu 
----------------------------------------------*/
function my_theme_default_menu() {
    echo '<ul>';
    if ('page' != get_option('show_on_front')) {
        echo '<li class="fa fa-home"><a href="'. esc_url(home_url()) . '/">Home</a></li>';
    }
   
        echo '</ul>';
}




/*--------------------------------------------
Theme Options
----------------------------------------------*/
require_once('theme-options/ReduxCore/framework.php');
require_once('theme-options/sample/theme-functions.php');
//require_once('theme-options/sample/sample-config.php');


function up_count_user_posts( $userid, $post_type = 'post' ) {
    if( empty( $userid ) )
        return false;
    $args = array(
        'post_type' => $post_type,
        'author' => $userid
    );
    $the_query = new WP_Query( $args );
    $user_post_count = $the_query->found_posts;
    return $user_post_count;
}






?>