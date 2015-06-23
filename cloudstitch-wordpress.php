<?php
/*
 * Plugin Name: Cloudstitch
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


//[foobar]
function handle_cloudstitch_shortcode( $atts ){
  $a = shortcode_atts( array(
    'widget' => ''
  ), $atts );
  return "<div widget=\"{$a['widget']}]\"></div>";
}
add_shortcode('cloudstitch', 'handle_cloudstitch_shortcode' );
