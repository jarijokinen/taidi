<?php

/**
 * Taidi
 *
 * Plugin Name: Taidi
 * Plugin URI: https://github.com/jarijokinen/taidi
 * Description: HTML Tidy plugin for WordPress
 * Version: 0.0.1
 * Author: Jari Jokinen
 * Author URI: https://github.com/jarijokinen
 * License: MIT
 * License URI: https://github.com/jarijokinen/taidi/blob/master/LICENSE.txt
 */

defined('WPINC') || die;

define('TAIDI_NAME', 'taidi');
define('TAIDI_PATH', plugin_dir_path(__FILE__));
define('TAIDI_VERSION', '0.0.1');

// Admin hooks

require_once TAIDI_PATH . 'admin/admin.php';

if (is_admin()) {
  add_action('admin_init', 'taidi_admin_init');
  add_action('admin_menu', 'taidi_admin_menu');
}

// Public hooks

require_once TAIDI_PATH . 'public/public.php';

add_action('get_header', 'taidi_format_buffer');

?>
