<?php
	if (!$CURRENT_USER) { websiteLogin_redirectToLogin(); }

	// prepopulate form with current user values
	foreach ($CURRENT_USER as $name => $value) {
		if (array_key_exists($name, $_REQUEST)) { continue; }
		$_REQUEST[$name] = $value;
	}

	// process form
	if (@$_REQUEST['save']) {

		// error checking
		$errorsAndAlerts = "";
		if (!@$_REQUEST['fullname'])                { $errorsAndAlerts .= "You must enter your full name!<br/>\n"; }
		if (!@$_REQUEST['email'])                   { $errorsAndAlerts .= "You must enter your email!<br/>\n"; }
		else if(!isValidEmail(@$_REQUEST['email'])) { $errorsAndAlerts .= "Please enter a valid email (example: user@example.com)<br/>\n"; }
		if (!@$_REQUEST['username'])                { $errorsAndAlerts .= "You must choose a username!<br/>\n"; }

		// new password checking
		if (@$_REQUEST['oldPassword'] || $_REQUEST['newPassword1'] || $_REQUEST['newPassword2']) {
			$oldPasswordHash = (@$SETTINGS['advanced']['encryptPasswords']) ? getPasswordDigest(@$_REQUEST['oldPassword']) : @$_REQUEST['oldPassword'];
			if (!@$_REQUEST['oldPassword'])                                 { $errorsAndAlerts .= "Please enter a value for: Current Password<br/>\n"; }
			elseif ($oldPasswordHash != $CURRENT_USER['password'])          { $errorsAndAlerts .= "Current password isn't correct!<br/>\n"; }
			elseif (!@$_REQUEST['newPassword1'])                            { $errorsAndAlerts .= "Please enter a value for: New Password<br/>\n"; }
			elseif (!@$_REQUEST['newPassword2'])                            { $errorsAndAlerts .= "Please enter a value for: Confirm New Password<br/>\n"; }
			elseif ($_REQUEST['newPassword1'] != $_REQUEST['newPassword2']) { $errorsAndAlerts .= "New passwords don't match!<br/>\n"; }
		}

		// check for duplicate usernames and emails
		if (@$_REQUEST['username'] != $CURRENT_USER['username']) {
			$count = mysql_count($GLOBALS['WSM_ACCOUNTS_TABLE'], "`username` = '".mysql_escape(@$_REQUEST['username'])."'");
			if ($count > 0 && @$_REQUEST['username']) { $errorsAndAlerts .= "That username is already in use, please choose another!<br/>\n"; }
		}
		if (@$_REQUEST['email'] != $CURRENT_USER['email']) {
			$count = mysql_count($GLOBALS['WSM_ACCOUNTS_TABLE'], "'".mysql_escape($_REQUEST['email'])."' IN (email, username)");
			if ($count > 0) { $errorsAndAlerts .= "That email is already in use, please choose another!<br/>\n"; }
		}

		// update user
		if (!$errorsAndAlerts) {
			mysqlStrictMode(false);   // disable Mysql strict errors for when a field isn't defined below (can be caused when fields are added later)
			if (@$_REQUEST['newPassword2']) { $CURRENT_USER['password'] = $_REQUEST['newPassword2']; } // update password

			// update password if needed
			$password         = @$_REQUEST['newPassword2'] ? @$_REQUEST['newPassword2'] : $CURRENT_USER['password'];
			if (@$SETTINGS['advanced']['encryptPasswords']) { $passwordHash = getPasswordDigest($password); }
			else                                            { $passwordHash = $password; }

			//
			$query = "UPDATE `{$TABLE_PREFIX}accounts` SET
						  fullname         = '".mysql_escape( $_REQUEST['fullname'] )."',
						  email            = '".mysql_escape( $_REQUEST['email'] )."',
						  username         = '".mysql_escape( $_REQUEST['username'] )."',
						  password         = '".mysql_escape( $passwordHash )."',

						  updatedByUserNum = '".mysql_escape( $CURRENT_USER['num'] )."',
						  updatedDate      = NOW()
					 WHERE num = '".mysql_escape( $CURRENT_USER['num'] )."'";
			mysql_query($query) or die("MySQL Error:<br/>\n". htmlspecialchars(mysql_error()) . "\n");
			$userNum = mysql_insert_id();

			// on success
			unset($_REQUEST['oldPassword'], $_REQUEST['newPassword1'], $_REQUEST['newPassword2']); // clear password fields
			$errorsAndAlerts = "Thanks, we've updated your profile!";
		}
	}

	  // delete account
	if (@$_POST['deleteAccount']) {
		if ($CURRENT_USER['isAdmin']) { die("Error: Deleting admin accounts is not permitted!"); }

		// delete uploads
		$GLOBALS['tableName'] = $GLOBALS['WSM_ACCOUNTS_TABLE'];
		eraseRecordsUploads( $CURRENT_USER['num'] );

		// delete account
		$query = mysql_escapef("DELETE FROM `{$TABLE_PREFIX}accounts` WHERE num = ?", $CURRENT_USER['num']);
		mysql_query($query) or die("MySQL Error:<br/>\n". htmlspecialchars(mysql_error()) . "\n");

		// redirect to login
		websiteLogin_redirectToLogin();
	}


?>