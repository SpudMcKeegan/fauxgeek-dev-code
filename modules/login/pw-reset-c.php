<?php
	
  // error checking
  $showForm = true;
  if (!@$_REQUEST['userNum'])   { die("No 'userNum' value specified!"); }
  if (!@$_REQUEST['resetCode']) { die("No 'resetCode' value specified!"); }
  $isValidResetCode = _isValidPasswordResetCode(@$_REQUEST['userNum'], @$_REQUEST['resetCode']);
  if (!$isValidResetCode) {
    alert(t("Password reset code has expired or is not valid. Try resetting your password again."));
    $showForm = false;
  }

  // load user
  $user = mysql_get($GLOBALS['WSM_ACCOUNTS_TABLE'], @$_REQUEST['userNum']);

  //
  if (@$_REQUEST['submitForm'] && $isValidResetCode) {

    // error checking
    $errors = '';
    if      (!@$_REQUEST['password'])                                  { $errors .= t("Please enter your new password!") . "\n"; }
    else if (!@$_REQUEST['password:again'])                            { $errors .= t("Please enter your new password again!") . "\n"; }
    else if ($_REQUEST['password'] != $_REQUEST['password:again'])     { $errors .= t("New passwords do not match!") . "\n"; }
    if ($errors) { alert($errors); }

    // update password
    if (!alert()) {
      if (@$SETTINGS['advanced']['encryptPasswords']) { $newPassword = getPasswordDigest($_REQUEST['password']); }
      else                                            { $newPassword = $_REQUEST['password']; }
      mysql_update($GLOBALS['WSM_ACCOUNTS_TABLE'], $user['num'], null, array('password' => $newPassword));

      // show message
      alert(t('Password updated!'));
      $_REQUEST = array();
      $showForm = false;
    }
  }

  $errorsAndAlerts = alert();

?>