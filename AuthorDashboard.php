<?php
/**
 * Plugin Name: AuthorDashboard
 * Plugin URI: https://sabbir-alam.io
 * Description: Show author details(word count etc) in the admin panel.
 * Version: 0.0.1
 * Author: Md. Sabbir Alam
 * Author URI: https://sabbir-alam.io
 * Text Domain: 
 * License: GPLv3
 */

defined('ABSPATH') || die('You can not access this file!');

class AuthorDashboard {
  function __construct() {
  }

  function register(){
    add_action('admin_enqueue_scripts', array(this, 'enqueue'));
    add_action('admin_menu', array($this, 'add_admin_pages'));
  }

  function add_admin_pages() {
      add_menu_page('Author Dashboard', 'Author Dashboard', 'manage_options', 'sabbir_author_dashboard', array($this, 'admin_index'), '', null);
  }

  function admin_index() {
      // Require template here.
  }

  function enqueue() {
    wp_enqueue_style( 'author_dashboard_style', plugins_url( '/assets/style.css', __FILE__ ) );
    wp_enqueue_script('author_dashboard_script', plugins_url( '/assets/script.js', __FILE__ ) );
  }
}

if( class_exists('AuthorDashboard')) {
  $authorDashboard = new AuthorDashboard(' Test ');
  $authorDashboard->register();
}

// activate
require_once plugin_dir_path( __FILE__ ).'includes/AuthorDashboardLifeCycle.php';
register_activation_hook( __FILE__, array('AuthorDashboardLifeCycle', 'activate') );

// deactivate
register_deactivation_hook( __FILE__, array('AuthorDashboardLifeCycle', 'deactivate') );