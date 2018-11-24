<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /*
     *
     * --> Action hook examples
     *
     */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        'disable_tracking'     => true,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'UP Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => 'dashicons-admin-tools',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'up_theme_options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
         'footer_credit'     => 'Developed by <a href="http://www.linuxhostlab.com" target="_blank">Linux Host Lab &amp; Coding Bank</a>',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => __( 'Documentation', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => __( 'Support', 'redux-framework-demo' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => __( 'Extensions', 'redux-framework-demo' ),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => '#',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://fb.linuxhostlab.com',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/hmbashar',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/hmbashar',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */




    // -> START Sections

    Redux::setSection( $opt_name, array(
        'title' => __( 'Header Section', 'redux-framework-demo' ),
        'id'    => 'header',
        'desc'  => __( 'Header Section All Options', 'redux-framework-demo' ),
        'icon'  => 'el el-home'
    ) );
    Redux::setSection($opt_name, array(
        'title'         => __('Social', 'up_text_domain'),
        'id'            => 'social',
        'subsection'    => true,
        'desc'          => __('Your All social icons in header', 'up_text_domain'),
        'icon'          => 'dashicons dashicons-share',
        'fields'        => array(
            array(
                'title'     => __('Facebook URL', 'up_text_domain'),
                'id'        => 'social_facebook',
                'type'      => 'text',
                'desc'      => __('Input your facebook full url', 'up_text_domain'),
                ),
            array(
                'title'     => __('Twitter URL', 'up_text_domain'),
                'id'        => 'social_twitter',
                'type'      => 'text',
                'desc'      => __('Input your twitter full url', 'up_text_domain'),                
                ),
            array(
                'title'     => __('Youtube URL', 'up_text_domain'),
                'id'        => 'social_youtube',
                'type'      => 'text',
                'desc'      => __('Input your youtube full url', 'up_text_domain'),                
                ),
            array(
                'title'     => __('LinkedIn URL', 'up_text_domain'),
                'id'        => 'social_linkedin',
                'type'      => 'text',
                'desc'      => __('Input your LinkedIn full url', 'up_text_domain'),               
                ),
            array(
                'title'     => __('Google Plus URL', 'up_text_domain'),
                'id'        => 'social_google_plus',
                'type'      => 'text',
                'desc'      => __('Input your Google Plus full url', 'up_text_domain'),                
                ),

            ),

        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Logo', 'up_text_domain'),
        'id'        => 'logo',
        'subsection'=>true,
        'icon'      => 'dashicons dashicons-format-image',
        'fields'    => array(
                array(
                    'title'     => __('Header Logo Upload', 'up_text_domain'),
                    'id'        =>'header_logo',
                    'type'      => 'media',
                    'desc'      => __('Upload Your Logo, perfect size width 340px and height 100px.', 'up_text_domain'),
                    'default'   => array(
                        'url'   => get_template_directory_uri().('/img/logo.png'),
                        ),
                    ),

            ),


        ));
    Redux::setSection($opt_name, array(
            'title'         => __('Latest Update', 'up_text_domain'),
            'id'            => 'latest-update-p',
            'icon'          => 'dashicons dashicons-clipboard',
            'fields'        => array(
                    array(
                            'title'     => __('Latest Update Text', 'up_text_domain'),
                            'id'        => 'latest-update-title',
                            'type'      => 'text',
                            'desc'      => __('You can change latest update text', 'up_text_domain'),
                            'default'   => __('Latest Update', 'up_text_domain'),
                        ),
                    array(
                            'title'     => __('How Much POSTS Show', 'up_text_domain'),
                            'id'        => 'latest-post-count',
                            'type'      => 'text',
                            'desc'      => __('You can input numaric for show how meny posts on marquee', 'up_text_domain'),
                            'default'   => __('5', 'up_text_domain'),
                            'validate' =>'numeric',
                        ),
                    array(
                            'title'     => __('Select Category', 'up_text_domain'),
                            'id'        => 'latest-posts-category',
                            'type'      => 'select',
                            'data'      => 'categories',
                            'desc'      => __('You can select category wich categoinput numaric for show how meny posts on marquee', 'up_text_domain'),
                            
                        ),
                )

        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Switch', 'up_text_domain'),
        'id'        =>'switch_section',
        'icon'      => 'dashicons dashicons-dashboard',
        ));
    Redux::setSection($opt_name, array(
        'title'     => __('General', 'up_text_domain'),
        'id'        => 'general-switch',
        'icon'      => 'dashicons dashicons-admin-tools',
        'subsection'=> true,
        'fields'    => array(
                array(
                        'title'     => __('Allow only registered users', 'up_text_domain'),
                        'id'        => 'allow-registered-user',
                        'desc'      => __('If you want to show contents only Registered user, then you can on this option, this option only work in posts and pages ', 'up_text_domain'),
                        'type'      => 'switch',
                        'options'   => array(
                            '1'     =>__('ON', 'up_text_domain'),
                            '2'     =>__('OFF', 'up_text_domain'),
                            ),
                        'default'   => '2'

                    ),
                array(
                        'title'         => __('Unregisterd User Message', 'up_text_domain'),
                        'id'            => 'unregisterd-message',
                        'desc'          => __('Just You can write a message for show unregister user message.', 'up_text_domain'),
                        'default'       => __('Sorry! You don\'t have access this contents, Need to login this website for show this contents.', 'up_text_domain'),
                        'type'          => 'textarea',
                    ),
                array(
                        'title'         => __('Shortlink', 'up_text_domain'),
                        'id'            => 'post-shortlink',
                        'desc'          => __('You can enable Shortlink in every posts ', 'up_text_domain'),
                       'type'      => 'switch',
                        'options'   => array(
                            '1'     =>__('ON', 'up_text_domain'),
                            '2'     =>__('OFF', 'up_text_domain'),
                            ),
                        'default'   => '2'
                    ),
            )

        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Social Switch', 'up_text_domain'),
        'subsection'=> true,
        'id'        => 'social_switch',
        'icon'      => 'dashicons dashicons-share',
        'fields'    => array(
            array(
                'title'     => __('Facebook', 'up_text_domain'),
                'id'        => 'facebook_switch',
                'type'      => 'switch',
                'options'   => array(
                    '1'     =>__('ON', 'up_text_domain'),
                    '2'     =>__('OFF', 'up_text_domain'),
                    ),
                'default'   => '1'
                ),
            array(
                'title'     => __('Twitter', 'up_text_domain'),
                'id'        => 'twitter_switch',
                'type'      =>'switch',
                'options'   => array(
                    '1'     =>__('ON', 'up_text_domain'),
                    '2'     =>__('OFF', 'up_text_domain'),
                    ),
                'default'   => '1'               
                ),

            array(
                'title'     => __('Youtube', 'up_text_domain'),
                'id'        => 'youtube_switch',
                'type'      =>'switch',
                'options'   => array(
                    '1'     =>__('ON', 'up_text_domain'),
                    '2'     =>__('OFF', 'up_text_domain'),
                    ),
                'default'   => '1'               
                ),
            array(
                'title'     => __('LinkedIn', 'up_text_domain'),
                'id'        => 'linkedin_switch',
                'type'      =>'switch',
                'options'   => array(
                    '1'     =>__('ON', 'up_text_domain'),
                    '2'     =>__('OFF', 'up_text_domain'),
                    ),
                'default'   => '1'               
                ),
            array(
                'title'     => __('Google Plus', 'up_text_domain'),
                'id'        => 'google_plus_switch',
                'type'      =>'switch',
                'options'   => array(
                    '1'     =>__('ON', 'up_text_domain'),
                    '2'     =>__('OFF', 'up_text_domain'),
                    ),
                'default'   => '1'               
                ),

            ),

        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Logo', 'up_text_domain'),
        'id'        => 'logo_id_switch',
        'icon'      =>'dashicons dashicons-dashboard', 
        'subsection'=> true,
        'fields'    => array(
            array(
                'title'     => __('Logo Switch', 'up_text_domain'),
                'id'        => 'logo_switch',
                'type'      => 'switch',
                'options'   => array(
                    '1'     =>__('ON', 'up_text_domain'),
                    '2'     =>__('OFF', 'up_text_domain'),
                    ),
                'default'   => '1'  
                ),
            ),


        ));

    Redux::setSection($opt_name, array(
        'title'     => __('Posts', 'up_text_domain'),
        'id'        => 'posts-sections',
        'icon'      =>'dashicons dashicons-admin-post',         
        'fields'    => array(
            array(
                'title'     => __('Featured Image', 'up_text_domain'),
                'id'        => 'index-featured-section',
                'type'      => 'section',
				'indent'	=> true,
				'subtitle'		=> __('Index Featured Image dimension', 'up_text_domain'),
                ),
            array(
                'title'     => __('Featured Image width', 'up_text_domain'),
                'id'        => 'index-featured-img-width',
                'type'      => 'text',
				'default'	=> 150,
				'desc'		=> __('input only number without px.', 'up_text_domain'),
                ),
            array(
                'title'     => __('Featured Image Height', 'up_text_domain'),
                'id'        => 'index-featured-img-height',
                'type'      => 'text',
				'default'	=> 150,				
				'desc'		=> __('input only number without px.', 'up_text_domain'),
                ),
            ),


        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Colors', 'up_text_domain'),
        'id'        => 'color',
        'icon'      => 'dashicons dashicons-admin-appearance', 
        'fields'    => array(
            array(
                'title'         => __('Body Background', 'up_text_domain'),
                'id'            => 'body_color',
                'type'          => 'color',
                'validate'      => 'color',
                'desc'          =>__('Chose your color.', 'up_text_domain'),

                ),
            array(
                'title'         => __('Main Color', 'up_text_domain'),
                'id'            => 'main_color',
                'type'          => 'color',
                'validate'      => 'color',
                'desc'          =>__('Chose your color.', 'up_text_domain'),
                'default'       => '#95a5a6',

                ),
            array(
                'title'         => __('Border 5px Top', 'up_text_domain'),
                'id'            => 'single_post_border_top',
                'type'          => 'color',
                'validate'      => 'color',
                'desc'          =>__('Chose your color.', 'up_text_domain'),
                'default'       => '#95a5a6',

                ),
            array(
                'title'         => __('Hover Color', 'up_text_domain'),
                'id'            => 'hover-colors',
                'type'          => 'color',
                'validate'      => 'color',
                'desc'          =>__('Chose your color.', 'up_text_domain'),
                'default'       => '#16a085',

                ),


            ),

        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Control Panel', 'up_text_domain'),
        'id'        => 'control_panel',
        'icon'      => 'dashicons dashicons-admin-users',

        ));
    Redux::setSection($opt_name, array(
        'title'         => __('Login Panel', 'up_text_domain'),
        'id'            =>'login_section',
        'subsection'    => true,
        'icon'          => 'dashicons dashicons-admin-network',
        'fields'        => array(
            array(
                'title'         => __('Login Logo', 'up_text_domain'),
                'id'            => 'login_logo',
                'type'          => 'media',
                'desc'          => __('If you want change logo in Control Panel, just upload your logo, required size: 340px width, and 100px height.', 'up_text_domain'),
                'default'       => array(
                    'url'       => get_stylesheet_directory_uri().('/img/logo.png'),
                    ),
                ),

            ),

        ));
    Redux::setSection($opt_name, array(
        'title'         => __('Register Panel', 'up_text_domain'),
        'id'            => 'register_panel',
        'icon'          => 'dashicons dashicons-lock',
        'fields'        => array(
            array(
                'title'     => __('Terms Notice in Register Panel.', 'up_text_domain'),
                'id'        => 'register_message',
                'type'          => 'textarea',
                'desc'          => __('if you want show message in register panel, just input your text.', 'up_text_domain'),
                'default'       => __('Please read our Terms and Conditions before register this site. <a href="'.esc_url(site_url()).'/terms" target="_blank">Terms and Conditions</a>', 'up_text_domain'),
                ),


            ),
        ));
    Redux::setSection($opt_name, array(
        'title'     => __('Dashboard', 'up_text_domain'),
        'id'        => 'dashboard_section',
        'icon'      => 'dashicons dashicons-dashboard',
        'fields'    => array(
            array(
                'title'         => __('Dashboard Title', 'up_text_domain'),
                'id'            => 'dashboard-logo',
                'type'          => 'text',                
                'default'       => get_bloginfo("name"),
                ),
            array(
                'title'         => __('Dashboard Logo', 'up_text_domain'),
                'id'            => 'dashboard-logo-upload',
                'type'          => 'media', 
                'default'       => array(
                    'url'       => get_stylesheet_directory_uri().('/img/logo.png'),
                    ),
                ),

            ),

        ));
    Redux::setSection($opt_name, array(
        'title'         => __('Email Subscribe', 'up_text_domain'),
        'id'            => 'email_subscribe_set',
        'icon'          => 'dashicons dashicons-email', 
        'desc'          => __('Email Subscription Box in single post below.', 'up_text_domain'),
        'fields'        => array(
            array(
                'title'         => __('Email Subscribe Hadding', 'up_text_domain'),
                'id'            => 'email_subs_hadding',
                'type'          => 'text',
                'default'       => __('You have to enjoy this articel? Don\'t forget subscribes this site.', 'up_text_domain'),

                ),
            array(
                'title'         => __('Email Subscribe Content', 'up_text_domain'),
                'id'            => 'email_subs_content',
                'type'          => 'textarea',
                'default'       => __('If you want to get your update article, then please subscribe this site.', 'up_text_domain'),


                ),
            array(
                'title'         => __('Feed Address', 'up_text_domain'),
                'id'            => 'feed_address',
                'desc'          => __('Example: <strong>codingbank</strong> <br/> for <a target="_blank" href="http://feeds.feedburner.com/codingbank">http://feeds.feedburner.com/codingbank</a> feed address.<br/>If you don\'t have feed url then go to <a href="http://feeds.feedburner.com/" target="_blank">Feedburner</a> and signup', 'up_text_domain'),
                'type'          => 'text',
                'default'       => 'codingbank',
                ),

            ),


        ));
    Redux::setSection($opt_name, array(
        'title'         => __('SEO', 'up_text_domain'),
        'id'            => 'seo_section',
        'icon'          => 'dashicons dashicons-pressthis',
        'desc'          => __('This is SEO Keywords, and Description box, but if you use WordPress SEO plugin, then don\'t need use the section, just input only google analytics id.', 'up_text_domain'),
        'fields'        => array(
            array(
                'title'         => __('Google Analytics ID', 'up_text_domain'),
                'id'            => 'google_analytics',
                'type'          => 'text',
                'desc'          => __('Example: UA-68045555-1', 'up_text_domain'),
                ),

            array(
                'title'         => __('SEO Meta Keywords', 'up_text_domain'),
                'id'            => 'seo_keywords',
                'type'          => 'textarea',
                'desc'          => __('Input Your SEO Meta keywords.', 'up_text_domain'),

                ),
            array(
                'title'         => __('SEO Meta Description', 'up_text_domain'),
                'id'            => 'seo_description',
                'type'          => 'textarea',
                'desc'          => __('Input Your SEO Meta Description.', 'up_text_domain'),

                ),

            ),


        ));
    Redux::setSection($opt_name, array(
        'title'         => __('Post Editor', 'up_text_domain'),
        'id'            => 'post_editor_section',
        'icon'          => 'dashicons dashicons-edit',
        'fields'        => array(
            array(
                'title'         => __('Terms and Conditions', 'up_text_domain'),
                'id'            => 'terms_and_conditions',
                'type'          => 'editor',
                'desc'          => __('Input Your Terms And Conditions if you want to change post box.', 'up_text_domain'),
                'default'       => __('<p style="font-weight:blod">Before writing the post you should check our rules and regulations, in case of violence, your post padding even you will be blocked. Our rules and regulations are given bellow:</p>
    
    <p style="color:red;font-weight:blod">Required Fields in this post</p>
    <p style="color:red;font-weight:blod">Featured Image</p>
    <p style="color:red;font-weight:blod">Category: Minimum 1, Maximum 2</p>
    <p style="color:red;font-weight:blod">Tags: Minimum 3, Maximum: 5</p>
    <p style="color:red;font-weight:blod"><a style="color: red;font-weight: bold;text-transform: uppercase;" href= "'. esc_url(home_url()) . '/terms" target="_blank">Read More</a></p>', 'up_text_domain'),
                ),

            ),


        ));
    Redux::setSection($opt_name, array(
        'title'         => __('Email Sender', 'up_text_domain'),
        'id'            => 'email_sender',
        'icon'          => 'dashicons dashicons-email',
        'desc'          => __('If you want to see this my plugin for know details <a href="https://wordpress.org/plugins/cb-change-mail-sender/screenshots/" target="_blank">CB Change Email Sender</a>', 'up_text_domain'),
        'fields'        => array(
            array(
                'title'         => __('Email Sender Name', 'up_text_domain'),
                'id'            => 'email_sender_name',
                'type'          => 'text',
                'desc'          => __('Input Your Email Sender Name', 'up_text_domain'),
                'default'       => get_bloginfo("name"),
                ),
            array(
                'title'         => __('Email Sender Email', 'up_text_domain'),
                'id'            => 'email_sender_email',
                'type'          => 'text',
                'desc'          => __('Input Your Email Sender Email address', 'up_text_domain'),
                'default'       => 'no_reply@gmail.com',
				'validate' 		=> 'email',
                ),
            ),
        ));
	Redux::setSection($opt_name, array(
		'title'			=> __('Ads Section', 'up_text_domain'),
		'id'			=> 'ads_section',
		'icon'			=> 'dashicons dashicons-networking', 
		'desc'			=> __('Input your ads code', 'up_text_domain'),
		'fields'		=> array(
            array(
                'title'         => __('Warning for Ads', 'up_text_domain'),
				'desc'			=> __('if you use index rendom ads then don\'t use Differents ads options, or if you use Differents ads options then don\'t use random ads.', 'up_text_domain'),
                'id'            => 'warning-ads-section',
				'type'			=> 'info',
				'style'			=> 'critical',				            
                ),
            array(
                'title'         => __('Index Ads', 'up_text_domain'),
				'desc'			=> __('Rendom Ads index', 'up_text_domain'),
                'id'            => 'index-ads-section',
				'type'			=> 'section',
				'indent'  		=> true,               
                ),
            array(
                'title'         => __('Index Rendom Ads', 'up_text_domain'),
				'desc'			=> __('If you use this box then show one ads rendom system after specific posts. examples: show after every 2 posts.', 'up_text_domain'),
                'id'            => 'index-rendom-ads',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',                            
                ),
            array(
                'title'         => __('How meny posts below show rendom ads?', 'up_text_domain'),
				'desc'			=> __('How meny posts below show rendom ads?. examples: show after every 2 posts.', 'up_text_domain'),
                'id'            => 'index-rendom-ads-count',
				'type'			=> 'text',
                ),

            array(
                'title'         => __('Index Differents One', 'up_text_domain'),
				'desc'			=> __('Please input number show after how many posts. examples: if you input 2 then show after 2nd posts.', 'up_text_domain'),
                'id'            => 'index-different-count-one',
				'type'			=> 'text',                          
                ),
			array(
                'title'         => __('Index Differents Ads One', 'up_text_domain'),
                'id'            => 'index-different-ads-one',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',                            
                ),
            array(
                'title'         => __('Index Differents Two', 'up_text_domain'),
				'desc'			=> __('Please input number show after how many posts. examples: if you input 2 then show after 2nd posts.', 'up_text_domain'),
                'id'            => 'index-different-count-two',
				'type'			=> 'text',                          
                ),
			array(
                'title'         => __('Index Differents Ads Two', 'up_text_domain'),
                'id'            => 'index-different-ads-two',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',                            
                ),
            array(
                'title'         => __('Index Differents Three', 'up_text_domain'),
				'desc'			=> __('Please input number show after how many posts. examples: if you input 2 then show after 2nd posts.', 'up_text_domain'),
                'id'            => 'index-different-count-three',
				'type'			=> 'text',                          
                ),
			array(
                'title'         => __('Index Differents Ads three', 'up_text_domain'),
                'id'            => 'index-different-ads-three',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',                            
                ),
            array(
                'title'         => __('Single Pages Ads', 'up_text_domain'),
				'subtitle'		=> __('Single Pages Ads', 'up_text_domain'),
                'id'            => 'single-ads-section',
				'type'			=> 'section',
				'indent'  		=> true,               
                ),
				
            array(
                'title'         => __('Single Page ads', 'up_text_domain'),
                'id'            => 'single_content_ads',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',
                'desc'          => __('Input Your Ads code for show in your single post content.', 'up_text_domain'),                
                ),
            array(
                'title'         => __('Show Paragraph', 'up_text_domain'),
                'id'            => 'single_content_ads_count',
				'type'			=> 'text',
                'desc'          => __('Input Number, how many after paragraph show your ads. default show after 2 paragraph.', 'up_text_domain'),      
				'default'		=> 2,
				'validate' => 'numeric',
                ),				
            array(
                'title'         => __('Single Page Top Ads', 'up_text_domain'),
                'id'            => 'single_page_top_ads',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',
                'desc'          => __('Input Your Ads code for show in your single page top and below menu.', 'up_text_domain'),                
                ),			
            array(
                'title'         => __('Single Page Below Title  Ads', 'up_text_domain'),
                'id'            => 'single_page_title_below',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',
                'desc'          => __('Input Your Ads code for show in your single page below title.', 'up_text_domain'),               
                ),		
            array(
                'title'         => __('Single Page After Content Ads', 'up_text_domain'),
                'id'            => 'single_page_after_content_ads',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',
                'desc'          => __('Input Your Ads code for show in your single page after content.', 'up_text_domain'),
				),	
            array(
                'title'         => __('Single Page After Comments Ads', 'up_text_domain'),
                'id'            => 'single_page_after_comments_ads',
				'type'			=> 'ace_editor',
                'mode'   		=> 'javascript',
                'theme'   		=> 'monokai',
                'desc'          => __('Input Your Ads code for show in your single page after Comments.', 'up_text_domain'),
				),
		),
	));
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => __( 'Section via hook', 'redux-framework-demo' ),
            'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
    function remove_demo() {

        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
            remove_filter( 'plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2 );

            // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
            remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
        }
    }
