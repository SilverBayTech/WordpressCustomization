<?php

/*
 * Plugin Name: HFH Data Plugin
 * Description: Plugin to manage the custom data storage features for my genealogy site.
 * Version: 0.0.1
 * License: GPLv2 or later
 * Text Domain: hfhd
 */
namespace HFHD;

// Keep script kiddies at bay
if (! defined ( 'ABSPATH' )) {
	exit ();
}

require_once 'autoloader.php';

$hfhd_plugin = new HFHDPlugin ();
$GLOBALS ['HFHD\\HFHD_PLUGIN'] = $hfhd_plugin;
register_activation_hook( __FILE__, array( $hfhd_plugin, 'onPluginActivated' ));
register_deactivation_hook( __FILE__, array( $hfhd_plugin, 'onPluginDeactivated' ));
unset ( $hfhd_plugin );
