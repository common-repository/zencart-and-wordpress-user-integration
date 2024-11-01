<?php
/**
 * Observer class used to add a free product to the cart if the user spends more than $x
 *
 */
class changePasswordWordPress extends base {


	function changePasswordWordPress() {
		global $zco_notifier;
		$zco_notifier->attach($this, array('NOTIFY_HEADER_START_ACCOUNT_PASSWORD'));
	}

	function update (&$callingClass, $notifier, $paramsArray) {
		global $error, $userdata;
		if (isset($_POST['action']) && ($_POST['action'] == 'process')) {
			get_currentuserinfo();
			
			$user_id = $userdata->ID;
			$_POST['pass1'] = $_POST['password_new'];
			$_POST['pass2'] = $_POST['password_new'];
			$_POST['email'] = $userdata->user_login;
			foreach ($userdata as $key => $value) {
				$_POST[$key] = $value;
			}
//			print("<pre>" . $user_id);
//			print_r($userdata);
//			print_r($_POST);
			edit_user($user_id);
//			die();
		}
	}
}
?>