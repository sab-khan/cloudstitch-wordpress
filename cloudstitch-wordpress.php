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
 *
 * @package WordPress
 * @author Ted Benson
 * @since 1.0.0
 */


//[cloudstitch]
function handle_cloudstitch_shortcode( $atts ){
  $a = shortcode_atts( array(
    'widget' => ''
  ), $atts );
  $html = "" .
  "  <div style=\"display: block;\" widget=\"{$a['widget']}\"></div>" .
  "  <script>" .
  "    if (typeof CTS == 'undefined') {" .
  "      var s = document.createElement( 'script' );" .
  "      s.setAttribute( 'src', '//static.cloudstitch.io/cloudstitch.js');" .
  "      document.body.appendChild( s );" .
  "    }" .
  "  </script>";
  return $html;
}

add_shortcode('cloudstitch', 'handle_cloudstitch_shortcode' );