=== Plugin Name ===
Contributors: edwardbenson
Donate link: http://cloudstitch.com/
Tags: spreadsheet, widget, plugin, visualization, data, D3
Requires at least: 4.0
Tested up to: 4.4
Stable tag: 4.4
License: MIT
License URI: http://opensource.org/licenses/MIT

Add the entire Cloudstitch library of spreadsheet-powered visualizations and widgets with just a shortcode.

== Description ==

Cloudstitch is a community of spreadsheet powered widgets you can add to any site -- things like product lists, data visualizations, and conference schedules.

This plugin makes every widget on Cloudstitch available in WordPress with a simple Shortcode.

Adding a shaded electoral map of the US, for example, is as simple as adding the following line: `[cloudstitch widget="project-templates/electoral-map-visualization"]`

== Installation ==

Installation is easy! Just:

1. Upload and unzip `cloudstitch-wordpress.zip` in the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Trying it Out ==

Try out the plugin by injecting demo widget already on Cloudstitch. Just add the following Shortcode to a page or post:

```
[cloudstitch widget="project-templates/electoral-map-visualization"]
```

== Using your own Cloudstitch Widgets ==

You can inject any widget that you've duplicated and customized on Cloudstitch. The general Shortcode format is:

```
[cloudstitch widget="USER-NAME/PROJECT-NAME"]
```

For example, let's say you visited Cloudstitch.io and duplicated [that electoral map widget](http://cloudstitch.io/project-templates/electoral-map-visualization).


Assuming your username is `TheIncredibleHulk`, you would end up with your own copy of the project hosted at a URL like this: `http://cloudstitch.io/TheIncredibleHulk/electoral-map-visualization`.

Your custom Shortcode is thus `[cloudstitch widget="TheIncredibleHulk/electoral-map-visualization"]`

== Screenshots ==

1. Example of using a Cloudstitch shortcode for an electoral map
2. Example result of using that Cloudstitch shortcode

== Changelog ==

= 1.0 =
* Hello, world! Initial submission.
* Basic widget invocation with no special options.

= 1.2 =
* Support for Cloudstitch's new Polymer-based projects, like Stack in a Box and D3 in a Box.

= 1.4 =
* Minor upgrade to link to our latest libraries.

== Upgrade Notice ==

= 1.0 =
This is the first version -- no upgrade notices yet!

= 1.2 =
This version should be backward compatible with version 1.0.

= 1.4 =
This version should be backward compatible with version 1.0.


== Frequently Asked Questions ==

* I've installed the plugin, now how do I find a widget?

Just go to [cloudstitch.io](http://www.cloudstitch.io) to find a directory of widgets.

* What kinds of things can you power with Cloudstitch?

Cloudstitch is great for powering part of your site with Google Spreadsheets. We love spreadsheets, and we loge Wordpress. Cloudstitch lets you have your Wordpress cake and eat it too: use Wordpress for things like pages and posts, and use Cloudstitch to power your data-heavy pages and visualizations.