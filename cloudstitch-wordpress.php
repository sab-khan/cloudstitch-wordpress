<?php
/*
 * Plugin Name: Cloudstitch WordPress Plugin
 * Version: 1.0
 * Plugin URI: http://www.cloudstitch.io/wordpress
 * Description: This plugin lets you inject Cloudstitch widgets into your WordPress blog.
 * Author: Ted Benson
 * Author URI: http://www.edwardbenson.com/
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: cloudstitch-wordpress
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author Ted Benson
 * @since 1.0.0
 */


function wphipe_filter_example($title) {
  return 'Hooked: '.$title;
}
add_filter('the_title', 'wphipe_filter_example');