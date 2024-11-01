<?php
/**
 * Observer class used to add a free product to the cart if the user spends more than $x
 *
 */
class loginWordPress extends base {


	function loginWordPress() {
		global $zco_notifier;
		$zco_notifier->attach($this, array('NOTIFY_LOGIN_SUCCESS'));
	}

	function update (&$callingClass, $notifier, $paramsArray) {
	
		$email = $_POST['email_address'];
		$user_pass = $_POST['password'];

		$user = wp_authenticate($email, $user_pass);
		wp_set_auth_cookie($user->ID, true);
		
		if ($_SESSION['cart']->get_products()) {
			$inCart = true;
		} else {
			$inCart = false;
		}
		vtu_checkUserWS($email, $inCart);
	}
}
?>