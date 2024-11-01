<?php
/**
 * Observer class used to add a free product to the cart if the user spends more than $x
 *
 */
class logoffWordPress extends base {


	function logoffWordPress() {
		global $zco_notifier;
		$zco_notifier->attach($this, array('NOTIFY_HEADER_START_LOGOFF'));
	}

	function update (&$callingClass, $notifier, $paramsArray) {
		wp_logout();
	}
}
?>