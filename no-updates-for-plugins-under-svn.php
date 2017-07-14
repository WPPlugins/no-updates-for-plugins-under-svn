<?php
/*
Plugin Name: No Updates for Plugins under SVN
Description: Disables updates for plugins under Subversion revision control. Based on <a href="http://developersmind.com/2010/06/12/preventing-wordpress-from-checking-for-updates-for-a-plugin/">code</a> by PeteMall.
Author: Kawauso
Version: 1.0
License: GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/

add_filter( 'http_request_args', 'svn_prevent_update_check', 10, 2 );
function svn_prevent_update_check( $r, $url ) {
	if ( 0 === strpos( $url, 'http://api.wordpress.org/plugins/update-check/' ) ) {
		$plugins = unserialize( $r['body']['plugins'] );
		$plugins_dir = trailingslashit( WP_PLUGIN_DIR );

		foreach( array_keys( $plugins->plugins ) as $plugin_slug ) {
			$plugin_svn_dir = plugin_dir_path( $plugins_dir . $plugin_slug ) . '.svn';
			if ( $plugin_svn_dir != "$plugins_dir.svn" && file_exists( $plugin_svn_dir ) )
				unset( $plugins->plugins[$plugin_slug], $plugins->active[array_search( $plugin_slug, $plugins->active )] );
		}

		$r['body']['plugins'] = serialize( $plugins );
	}
	return $r;
}