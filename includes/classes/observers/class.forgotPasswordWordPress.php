<?php
/**
 * Observer class used to add a free product to the cart if the user spends more than $x
 *
 */
class forgotPasswordWordPress extends base {


	function forgotPasswordWordPress() {
		global $zco_notifier;
		$zco_notifier->attach($this, array('NOTIFY_HEADER_BEFORE_PASSWORD_FORGOTTEN'));
	}

	function update (&$callingClass, $notifier, $paramsArray) {
		global $error, $new_password, $wpdb;
		if (isset($_GET['action']) && ($_GET['action'] == 'process')) {
			$userdata = get_userdata(email_exists($_POST['email_address']));
			
			$user_id = $userdata->ID;
			$_POST['pass1'] = $new_password;
			$_POST['pass2'] = $new_password;
			$_POST['email'] = $userdata->user_login;
			foreach ($userdata as $key => $value) {
				$_POST[$key] = $value;
			}
//			print_r($_POST);
			edit_user($user_id);
//			die();
		}
	}
}
?>