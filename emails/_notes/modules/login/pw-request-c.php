<?php
	// error checking
	$errorsAndAlerts = alert();
	if (@$CURRENT_USER) {
		$errorsAndAlerts = "You are already logged in! <a href='{$GLOBALS['WEBSITE_LOGIN_POST_LOGIN_URL']}'>Click here to continue</a> or <a href='?action=logoff'>Logoff</a>.";
	}

	### send reset email
	if (@$_REQUEST['action'] == 'sendPasswordReminder') {
		global $SETTINGS, $TABLE_PREFIX;

		// display errors
		if (!@$_REQUEST['usernameOrEmail']) { $errorsAndAlerts .= "No username or email specified!<br/>\n"; }

		// send emails
		if (@$_REQUEST['usernameOrEmail']) {
			$where = mysql_escapef("? IN (`username`,`email`)", $_REQUEST['usernameOrEmail']);
			$user  = mysql_get($GLOBALS['WSM_ACCOUNTS_TABLE'], null, $where);

			// send message
			if ($user) {

			// get reset password url
			$resetCode  = _generatePasswordResetCode( $user['num'] );
			$resetQuery = "?userNum={$user['num']}&resetCode=$resetCode";

			//
			$emailTemplate = "emails/user-password-reset.php";
			$emailHeaders  = emailTemplate_load(array(
                          'template'     => websiteLogin_pluginDir() . "/$emailTemplate",
                          'subject'      => '', // set in template
                          'from'         => '', // set in template
                          'to'           => $user['email'],
                          'placeholders' => array(
                            'username' => $user['username'],
                            'loginUrl' => "http://" . $_SERVER['HTTP_HOST'] . $GLOBALS['WEBSITE_LOGIN_LOGIN_FORM_URL'],
                            'resetUrl' => "http://" . $_SERVER['HTTP_HOST'] . $GLOBALS['WEBSITE_LOGIN_RESET_URL'] . $resetQuery,
                          ),
                        ));
			$mailErrors   = sendMessage($emailHeaders);
			if ($mailErrors) { die("Mail Error: $mailErrors"); }

				//
				$errorsAndAlerts .= "Thanks, we've emailed you instructions on resetting your password.<br/><br/>

				If you don't receive an email within a few minutes check your
				spam filter for messages from {$emailHeaders['from']}<br/>\n";

				// clear form
				$_REQUEST['usernameOrEmail'] = '';
			}

			//
			if (!$user) { $errorsAndAlerts .= "No matching username or email was found!<br/>\n"; }
		}
	}
 ?>