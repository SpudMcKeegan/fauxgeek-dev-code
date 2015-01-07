<?php
	
  $showSignupForm = true;

  // error checking
  if (@$CURRENT_USER) {
    $errorsAndAlerts = "You are already signed up! <a href='{$GLOBALS['WEBSITE_LOGIN_POST_LOGIN_URL']}'>Click here to continue</a>.";
    $showSignupForm = false;
  }

  // process form
  if (@$_REQUEST['save']) {

    // error checking
    $errorsAndAlerts = "";
    if (!@$_REQUEST['email'])                   			{ $errorsAndAlerts .= "You must enter your email!<br/>\n"; }
    else if(!isValidEmail(@$_REQUEST['email'])) 			{ $errorsAndAlerts .= "Please enter a valid email (example: user@example.com)<br/>\n"; }
    if (!@$_REQUEST['username'])                			{ $errorsAndAlerts .= "You must choose a username!<br/>\n"; }
	if (!@$_REQUEST['password'])                			{ $errorsAndAlerts .= "You must enter a password<br/>\n"; }
	if (@$_REQUEST['password2'] != @$_REQUEST['password'])  { $errorsAndAlerts .= "The two passwords must match!<br/>\n"; }

    // check for duplicate usernames and emails
    if (!$errorsAndAlerts) {
      $count = mysql_count($GLOBALS['WSM_ACCOUNTS_TABLE'], "`username` = '".mysql_escape(@$_REQUEST['username'])."'");
      if ($count > 0 && @$_REQUEST['username']) { $errorsAndAlerts .= "That username is already in use, please choose another!<br/>\n"; }

      $count = mysql_count($GLOBALS['WSM_ACCOUNTS_TABLE'], "'".mysql_escape($_REQUEST['email'])."' IN (email, username)");
      if ($count > 0) { $errorsAndAlerts .= "That email is already in use, please choose another!<br/>\n"; }
    }

    // turn off strict mysql error checking for: STRICT_ALL_TABLES
    mysqlStrictMode(false); // disable Mysql strict errors for when a field isn't defined below (can be caused when fields are added later)

    // add user
    if (!$errorsAndAlerts) {

      // generate password
      $password     = mysql_escape( $_REQUEST['password'] ); // example output: c5560251ef0b3eef9
      if (@$SETTINGS['advanced']['encryptPasswords']) { $passwordHash = getPasswordDigest($password); }
      else                                            { $passwordHash = $password; }

      //
      mysql_query("INSERT INTO `{$TABLE_PREFIX}" . @$GLOBALS['WSM_ACCOUNTS_TABLE'] . "` SET
                      email            = '".mysql_escape( $_REQUEST['email'] )."',
                      username         = '".mysql_escape( $_REQUEST['username'] )."',
                      password         = '".mysql_escape( $passwordHash )."',

                      disabled         = '0',
                      expiresDate      = '0000-00-00 00:00:00',
                      neverExpires     = '1',
                      createdDate      = NOW(),
                      updatedDate      = NOW(),
                      createdByUserNum = '0',
                      updatedByUserNum = '0'")
      or die("MySQL Error Creating Record:<br/>\n". htmlspecialchars(mysql_error()) . "\n");
      $userNum = mysql_insert_id();

      // send message
      $emailTemplate = "emails/user-new-signup.php";
      $emailHeaders  = emailTemplate_load(array(
                        'template'     => websiteLogin_pluginDir() . "/$emailTemplate",
                        'subject'      => '', // set in template
                        'from'         => '', // set in template
                        'to'           => $_REQUEST['email'],
                        'placeholders' => array(
                          'username' => array_key_exists('username', $_REQUEST) ? $_REQUEST['username'] : $_REQUEST['email'], // if using email as username then show that instead
                          'password' => $password,
                          'loginUrl' => "http://" . $_SERVER['HTTP_HOST'] . $GLOBALS['WEBSITE_LOGIN_LOGIN_FORM_URL'],
                        ),
                      ));
      $mailErrors   = sendMessage($emailHeaders);
      if ($mailErrors) { die("Mail Error: $mailErrors"); }

      // show thanks
      $errorsAndAlerts  = "Thanks, We've created an account for you and emailed you your password.<br/><br/>\n";
      $errorsAndAlerts .= "If you don't receive an email from us within a few minutes check your spam filter for messages from {$emailHeaders['from']}<br/><br/>\n";
      $errorsAndAlerts .= "<a href='{$GLOBALS['WEBSITE_LOGIN_LOGIN_FORM_URL']}'>Click here to login</a>.";

      $_REQUEST        = array(); // clear form values
      $showSignupForm  = false;
    }
  }

?>