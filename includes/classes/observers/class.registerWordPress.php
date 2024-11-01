<?php
/**
 * Observer class used to add a free product to the cart if the user spends more than $x
 *
 */
class registerWordPress extends base {


	function registerWordPress() {
		global $zco_notifier;
		$zco_notifier->attach($this, array('NOTIFY_HEADER_START_CREATE_ACCOUNT'));
	}

	function update (&$callingClass, $notifier, $paramsArray) {
		
		$email = $_POST['email_address'];
		$user_id = username_exists($email);
		if (!$user_id) {
			$user_id = email_exists($email); 
		}
		if (!$user_id) {
			if ($_POST['password'] == '') {
				$user_pass = wp_generate_password();
			} else {
				$user_pass = $_POST['password'];
			}
			$user_id = wp_create_user( $email, $user_pass, $email );
			update_usermeta($user_id,'first_name',$_POST['firstname']);
			update_usermeta($user_id,'last_name',$_POST['lastname']);
			
			$user = wp_authenticate($email, $user_pass);
			wp_set_auth_cookie($user->ID, true);

			vtu_checkUserWS($email, true);

		}
	}
}
?>