<?php
/**********
* Plugin Name: Nebula Login Logs
* Description: Log all user logins, and display for administrators.
* Version: 1.0.0
* Author: Katrine-Marie Burmeister
* Author URI: https://fjordstudio.dk
* License:     GNU General Public License v3.0
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

namespace nebula\logging;

if(!defined('ABSPATH')){
	exit('Go away!');
}

// Create custom 'logs' posttype
class LoggingPosttype {
	private $labels;

	function __construct($labels){
		$this->labels = $labels;
		add_action('init', array($this,'create_post_type'));
	}

	function create_post_type(){
		register_post_type('logs', array('labels' => $this->labels,
			'public' => true,
			'has_archive' => true,
			'show_in_nav_menus' => true,
			'menu_icon' => 'dashicons-book-alt',
			'taxonomies' => array('category', 'post_tag')
			)
		);
	}

}

$labels = array(
	'name' => __('Login Logs'),
	'singular_name' => __('Login Log'),
	'add_new_item' => __('Add New Login Log'),
	'edit_item' => __('Edit Login Log'),
	'new_item' => __('New Login Log'),
	'view_item' => __('View Login Log'),
	'view_items' => __('View Login Logs'),
	'search_items' => __('Search Login Logs'),
	'all_items' => __('All Login Logs')
);

$posttype = new LoggingPosttype($labels);
