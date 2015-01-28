<?php
define ( 'HFHD\\HFHD_PLUGIN_DIR', plugin_dir_path ( __FILE__ ) );
define ( 'HFHD\\HFHD_PLUGIN_URL', plugin_dir_url ( __FILE__ ) );

spl_autoload_register ( function ($classname) {
	$namespacePrefix = 'HFHD\\';
	$namespacePrefixLen = 5;
	
	if (substr ( $classname, 0, $namespacePrefixLen ) === $namespacePrefix) {
		$classnameWithoutNamespace = substr ( $classname, $namespacePrefixLen );
		$classnameRelativePath = str_replace ( '\\', '/', $classnameWithoutNamespace );
		
		require_once HFHD\HFHD_PLUGIN_DIR . 'src/' . $classnameRelativePath . '.php';
	}
} );
