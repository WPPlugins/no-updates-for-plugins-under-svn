=== No Updates for Plugins under SVN ===
Contributors: Kawauso
Tags: svn, plugins, updates
Requires at least: 3.0
Tested up to: 3.1
Stable tag: 1.0

Prevents plugins from being updated by the WordPress updater if they are under Subversion revision control.

== Description ==

Checks for the presence of the `.svn` directory in each plugin's directory. Disabled for plugins with their files directly in the `/plugins/` directory to prevent false positives.

Based on <a href="http://developersmind.com/2010/06/12/preventing-wordpress-from-checking-for-updates-for-a-plugin/">code</a> by PeteMall.

== Installation ==

1. Upload `no-updates-for-plugins-under-svn.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.0 =
* First public release