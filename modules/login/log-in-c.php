<?php
	// error checking
	$errorsAndAlerts = alert();
	if (@$CURRENT_USER) {
		$errorsAndAlerts = "You are already logged in! <a href='{$GLOBALS['WEBSITE_LOGIN_POST_LOGIN_URL']}'>Click here to continue</a> or <a href='?action=logoff'>Logoff</a>.";
	}

	function errorLogIn($e){
		$error = "";
		if($e == 'l'){ $error = '<p class="alert">Wrong user name or password! Please try again.</p>'; }
		return $error;
	}
?>