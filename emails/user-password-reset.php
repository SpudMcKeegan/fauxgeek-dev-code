<?php

  // load viewer library
  $libraryPath = '/lib/viewer_functions.php';
  $dirsToCheck = array('../','../../','../../../');
  foreach ($dirsToCheck as $dir) { if (@include_once("$dir$libraryPath")) { break; }}
  if (!function_exists('getRecords')) { die("Couldn't load viewer library, check filepath in sourcecode."); }
  if (!@$GLOBALS['WEBSITE_MEMBERSHIP_PLUGIN']) { die("You must activate the Website Membership plugin before you can access this page."); }

  // Override email headers - uncomment these to override the values set by the calling program
  global $SETTINGS, $FROM, $TO, $SUBJECT, $PLACEHOLDERS;
  $FROM      = $SETTINGS['adminEmail'];
  //$TO        = $SETTINGS['adminEmail'];
  $SUBJECT   = "{$_SERVER['HTTP_HOST']} Password Reset";

  // Preview Mode: Allow developers to view email template directly for easy editing
  $isPreviewMode = isBeingRunDirectly();
  if ($isPreviewMode) { // these values only show when previewing email template directly
    $TO      = "preview@example.com";
    $PLACEHOLDERS['user-email'] = 'user@example.com';
    $PLACEHOLDERS['username']   = 'testuser';
    $PLACEHOLDERS['password']   = 'password123';
  }

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
  body, td { font-family: arial }
</style>
</head>
<body>

<?php
  // developer preview mode: show email headers when viewing email template directly
  if ($isPreviewMode) { emailTemplate_showPreviewHeader(); }
?>

Hi <?php echo htmlspecialchars($PLACEHOLDERS['username']) ?>,<br/><br/>

You requested a password reset for <?php echo htmlspecialchars($_SERVER['HTTP_HOST']) ?>.<br/><br/>

To reset your password click this link:<br/>
<a href="<?php echo $PLACEHOLDERS['resetUrl'] ?>"><?php echo $PLACEHOLDERS['resetUrl'] ?></a><br/><br/>

This request was made from IP address: <?php echo $_SERVER['REMOTE_ADDR'] ?><br/>


</body>
</html>
