<?php include('pw-reset-c.php'); ?>
<h1>Reset your Password</h1>

<!-- EDIT PROFILE FORM -->
<?php if (@$errorsAndAlerts): ?>
	<div style="color: #C00; font-weight: bold; font-size: 14px; font-family: arial;"><br /><?php echo $errorsAndAlerts; ?><br /></div>
<?php endif ?>

<?php if ($showForm): ?>
	<form method="post" action="?">
		<input type="hidden" name="userNum"    value="<?php echo htmlspecialchars(@$_REQUEST['userNum']); ?>" />
		<input type="hidden" name="resetCode"  value="<?php echo htmlspecialchars(@$_REQUEST['resetCode']); ?>" />
		<input type="hidden" name="submitForm" value="1" />


		<table border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><?php et('Username') ?></td>
				<td style="padding: 10px 0px"><?php echo htmlspecialchars( $GLOBALS['user']['username'] ); ?></td>
			</tr>
			<tr>
				<td><?php et('New Password') ?></td>
				<td><input class="text-input" type="password" name="password"  value="<?php echo htmlspecialchars(@$_REQUEST['password']) ?>" /></td>
			</tr>
			<tr>
				<td><?php et('New Password (again)') ?> &nbsp;</td>
				<td><input class="text-input" type="password" name="password:again"  value="<?php echo htmlspecialchars(@$_REQUEST['password:again']) ?>" /></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input class="button" type="submit" name="send" value="<?php et('Update') ?>" /></td>
			</tr>
		</table>
	</form><br/>
<?php endif ?>

<a href="<?php echo $GLOBALS['WEBSITE_LOGIN_LOGIN_FORM_URL'] ?>">&lt;&lt; Login Page</a><br/>