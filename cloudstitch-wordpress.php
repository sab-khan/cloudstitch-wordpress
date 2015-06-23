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

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-wordpress-plugin-template.php' );
require_once( 'includes/class-wordpress-plugin-template-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-wordpress-plugin-template-admin-api.php' );
require_once( 'includes/lib/class-wordpress-plugin-template-post-type.php' );
require_once( 'includes/lib/class-wordpress-plugin-template-taxonomy.php' );

/**
 * Returns the main instance of Cloudstitch_Wordpress to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Cloudstitch_Wordpress
 */
function Cloudstitch_Wordpress () {
	$instance = Cloudstitch_Wordpress::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Cloudstitch_Wordpress_Settings::instance( $instance );
	}

	return $instance;
}

Cloudstitch_Wordpress();