<?php
/*
 * Plugin Name: Cloudstitch
 * Version: 1.3
 * Plugin URI: http://www.cloudstitch.io/wordpress
 * Description: This plugin lets you inject Cloudstitch widgets into your WordPress blog.
 * Author: Ted Benson
 * Author URI: http://www.edwardbenson.com/
 * Requires at least: 4.0
 * Tested up to: 4.4
 *
 * Text Domain: cloudstitch-wordpress
 *
 * @package WordPress
 * @author Ted Benson
 * @since 1.0.0
 */

/*
 * [cloudstitch container="handlebars" user="ted" app="app"]
 *
 * HEAD
 *
 * HTML
 *  <cloudstitch-handlebars user="foo" app="bar"></cloudstitch-handlebars>
 */
function handle_cloudstitch_container_shortcode($atts) {
  $a = shortcode_atts( array(
    'container' => '',
    'user' => '',
    'app' => '',
    'label' => 'sheet'
  ), $atts );
  if ($a['container'] == 'handlebars') $a['container'] = 'cloudstitch-handlebars';
  if ($a['container'] == 'mustache') $a['container'] = 'cloudstitch-mustache';
  if ($a['container'] == 'polymer') $a['container'] = 'cloudstitch-polymer';
  if ($a['container'] == 'jade') $a['container'] = 'cloudstitch-jade';
  if ($a['container'] == 'd3') $a['container'] = 'cloudstitch-d3';
  if ($a['container'] == 'dust') $a['container'] = 'cloudstitch-dust';
  $component= "https://components.cloudstitch.com/{$a['container']}.html";
  $inline = "<{$a['container']} user=\"{$a['user']}\" app=\"{$a['app']}\" label=\"{$a['label']}\"></{$a['container']}>" .
    "<link href=\"$component\" rel=\"import\" />";
  $script = "<script>maybeAdd('link', 'href', '$component', 'rel', 'import')</script>";
  return $inline;
}

//[cloudstitch]
function handle_cloudstitch_shortcode( $atts ){
  $a = shortcode_atts( array(
    'widget' => '',
    'container' => ''
  ), $atts );
  if ($a['container'] == '') {
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
  } else {
    return handle_cloudstitch_container_shortcode($atts);
  }
}

add_shortcode('cloudstitch', 'handle_cloudstitch_shortcode' );

function include_webcomponent_shim() {
  $output = '<script src="https://cdnjs.cloudflare.com/ajax/libs/webcomponentsjs/0.7.22/webcomponents-lite.min.js"></script>' .
    '<script>' .
    'function isAdded(tag, attr, val) {' .
    '  var x = document.getElementsByTagName(tag);' .
    '  for (var i=0; i< x.length; i++) { '.
    '    if (x[i][attr] == val) { return true }'.
    '  }'.
    '  return false;'.
    '}'.
    "function maybeAdd(tag, attr, val, attr2, val2) {\n" .
    " debugger;\n if (!isAdded(tag, attr, val)) {\n".
    "    var x = document.createElement(tag);\n".
    "    x[attr] = val;\n".
    "    if (attr2) { x[attr2] = val2 }\n".
    "    document.head.appendChild(x);\n".
    "  }\n" .
    "}".
    '</script>';
  echo $output;
}

add_action('wp_head', 'include_webcomponent_shim');
