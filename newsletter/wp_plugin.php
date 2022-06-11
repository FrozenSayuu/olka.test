<?php
/**
    * Plugin Name: Newsletter Plugin
    * Plugin URI: https://example.com/plugins/the-basics/
    * Description: Display your reviews easy with this plugin.
    * Version: 1.0.0
    * Requires at least: 5.9
    * Requires PHP: 7.4
    * Author: John Smith
    * Author URI: https://author.example.com/
    * License: GPL v2 or later
    * License URI: https://www.gnu.org/licenses/gpl-2.0.html
    * Text Domain: newsletter-plugin
    * Domain Path: /languages
*/

register_activation_hook( __FILE__, 'newsletter_activated');

ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting (E_ALL);
//register_deactivation_hook(__FILE__, 'plugin_deactivated');

function newsletter_activated()
{
	// create custom post types 
	flush_rewrite_rules();
}

/**
 * Here is where we put our javscript file for the plugin. We register it and ques it.
*/
add_action('init', 'scripts_loader');
function scripts_loader() 
{
	/* registering the script */
	wp_register_script('newsletter_script',
		plugins_url('/js/newsletter_script.js', __FILE__ ),
		['jquery'],
		'1.0.0',
		true );

	/* registering the script */
	wp_enqueue_script('newsletter_script');
}

/**
 * To be able to recieve our Ajax request, we must have a function that handles it.
 * You add it with these two add_actions,the first one is for logged in users,
 * and the other is for non-logged in users.
*/
add_action("wp_ajax_newsletter_action", "save_newsletter_form");
add_action("wp_ajax_nopriv_newsletter_action", "save_newsletter_form");
function save_newsletter_form()
{
	// nonce check for an extra layer of security, the function will exit if it fails
	if (!wp_verify_nonce( $_REQUEST['nonce'], "newsletter_nonce"))
    {
		exit("Woof Woof Woof");
	}

    createNewPost();
    
	echo json_encode(['type' => 'success', 'message' => 'Newsletter subscribed']);
	wp_die();
}

/**
 * Here we create a short code to be used on the website page according to: [search_hello]
 * The first name inside [] is the first parameter with add_shortcode().
*/
add_shortcode('newsletter_hello', 'newsletter_says_hello');
function newsletter_says_hello( $atts = [], $content = null ) 
{
	//$latestPosts = new WP_Query();

    newsletter_showForm();
}

function newsletter_showForm()
{
    include plugin_dir_path( __FILE__ ) . 'newsletter.php';
}

/**
 * Here we create a new menu for admin
 */ 
add_action( 'admin_menu', 'admin_view' );
function admin_view()
{
	add_menu_page(
		'Newsletter Subcribers',
		'Newsletter',
		'manage_options',
		'newsletter_menu',
		'newsletter_admin_page',
		'dashicons-email-alt',
		20
	);
}

/* We have extracted view code for the menu page and included it here */
function newsletter_admin_page()
{
	include plugin_dir_path( __FILE__ ) . 'admin/admin_view.php';
}

/**
 * This is how we create a new post.
*/
function createNewPost()
{
    global $wpdb;
    $user_id = get_current_user_id();

    wp_insert_post(
	array(
		'post_title'   => wp_strip_all_tags(option),
		'post_content' => 'Mail: ' . $_POST['mail'],
		'post_status'  => 'pending',
		'post_author'  => 1,
		'post_type'    => 'newsletter',

		'meta_input'    => [
			'Option' => wp_strip_all_tags($_POST['opt1']),
            'Mail' => $_POST['mail'],
			'post_author_id' => $user_id
		    ])
    );
    
}

?>