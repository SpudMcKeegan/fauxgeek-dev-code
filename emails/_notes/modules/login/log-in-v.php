<?php include('log-in-c.php') ?>
<form action="?" method="post">
	<input type="hidden" name="action" value="login" />

	<table border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td>Username</td>
			<td><input type="text" name="username" value="<?php echo htmlspecialchars(@$_REQUEST['username']); ?>" size="20" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" value="<?php echo htmlspecialchars(@$_REQUEST['password']); ?>" size="20" /></td>
		</tr>

		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="submit" value="Login" />
				<a href="<?php echo $GLOBALS['WEBSITE_LOGIN_SIGNUP_URL'] ?>">or sign-up</a><br/><br/>
				<a href="<?php echo $GLOBALS['WEBSITE_LOGIN_REMINDER_URL'] ?>">Forgot your password?</a>
			</td>
		</tr>
	</table>
</form>
<!-- /USER LOGIN FORM -->