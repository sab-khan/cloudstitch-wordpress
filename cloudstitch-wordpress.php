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

/*
 * [cloudstitch-handlebars user="ted" app="app"]
 *
 * HEAD
 *
 * HTML
 *  <cloudstitch-handlebars user="foo" app="bar"></cloudstitch-handlebars>
 */
function handle_shortcode_v2_cloudstitch($atts, $container) {
  $a = shortcode_atts( array(
    'user' => '',
    'app' => '',
    'label' => 'sheet'
  ), $atts );

  $inline = "<$container style=\"display: block;\" user=\"{$a['user']}\" app=\"{$a['app']}\" label=\"{$a['label']}\"></$container>";

  $head = "" .
  $head = '<link rel="import" href="https://components.cloudstitch.com/components/$container/$container.vulcanized.html"/>';

  return $inline;
}

function handle_shortcode_cloudstitch_handlebars( $atts ){ handle_shortcode_v2_cloudstitch($atts, "cloudstitch-handlebars"); }
function handle_shortcode_cloudstitch_d3( $atts ){ handle_shortcode_v2_cloudstitch($atts, "cloudstitch-d3"); }
function handle_shortcode_cloudstitch_polymer( $atts ){ handle_shortcode_v2_cloudstitch($atts, "cloudstitch-polymer"); }
function handle_shortcode_cloudstitch_city_spaces( $atts ){ handle_shortcode_v2_cloudstitch($atts, "city-spaces"); }
function handle_shortcode_cloudstitch_dust( $atts ){ handle_shortcode_v2_cloudstitch($atts, "cloudstitch-dust"); }
function handle_shortcode_cloudstitch_jade( $atts ){ handle_shortcode_v2_cloudstitch($atts, "cloudstitch-jade"); }
function handle_shortcode_cloudstitch_mustache( $atts ){ handle_shortcode_v2_cloudstitch($atts, "cloudstitch-mustache"); }

add_shortcode('cloudstitch', 'handle_cloudstitch_shortcode' );

$containers = array('handlebars', 'd3', 'polymer', 'city-spaces', 'dust', 'jade', 'mustache');
foreach ($containers as $container) {
  $underscored = str_replace("-", "_", $container);
  add_shortcode("cloudstitch-$container", "handle_shortcode_cloudstitch_$container");
}

function include_webcomponent_shim() {
  return '<script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.13/webcomponents-lite.min.js"></script>';
}

add_action('wp_head', 'include_webcomponent_shim');