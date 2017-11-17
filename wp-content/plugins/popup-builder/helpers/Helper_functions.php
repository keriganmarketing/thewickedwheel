<?php
class HelperFunctions {

	private function isFreePluginActive() {

		$sgpbActivePlugins = get_option('active_plugins');

		if(is_array($sgpbActivePlugins)) {
			$hasFreeVersion = in_array('popup-builder/popup-builder.php', $sgpbActivePlugins);
			$mainFileName = basename(__FILE__, ".php");

			if($hasFreeVersion && $mainFileName == 'popup-builderPro') {
				wp_die("Please, deactivate the FREE version of our plugin before upgrading to PRO");
			}
		}
	}

	private function checkPhpVersion() {

		if (version_compare(PHP_VERSION, SG_POPUP_MINIMUM_PHP_VERSION, '<')) {
			wp_die('Popup Builder plugin requires PHP version >= '.SG_POPUP_MINIMUM_PHP_VERSION.' version required. You server using PHP version = '.PHP_VERSION);
		}
	}

	public static function checkRequirements() {

		$helperObj = new self();
		$helperObj->isFreePluginActive();
		$helperObj->checkPhpVersion();
	}
}