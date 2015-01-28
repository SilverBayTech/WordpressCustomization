<?php

namespace HFHD;

class HFHDPlugin {
	private $personCustomPostType;

	function __construct() {
		$this->personCustomPostType = new PersonCustomPostType();
	}
	
	public function onPluginActivated() {
		$this->personCustomPostType->onPluginActivated();
	}
	
	public function onPluginDeactivated() {
		$this->personCustomPostType->onPluginDeactivated();
	}
}
