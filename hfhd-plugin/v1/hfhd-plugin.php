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

$GLOBALS ['HFHD\\HFHD_PLUGIN'] = new HFHDPlugin ();