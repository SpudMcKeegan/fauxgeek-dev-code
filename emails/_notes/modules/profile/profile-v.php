<?php include('profile-c.php'); ?>
<h1>Edit Profile Page</h1>

<!-- EDIT PROFILE FORM -->
<?php if (@$errorsAndAlerts): ?>
	<div style="color: #C00; font-weight: bold; font-size: 14px; font-family: arial;"><br/>
	  <?php echo $errorsAndAlerts; ?><br/><br/>
	</div>
<?php endif ?>

<form method="post" action="?">
	<input type="hidden" name="save" value="1" />

	<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td>Full Name</td>
		<td><input type="text" name="fullname" value="<?php echo htmlspecialchars(@$_REQUEST['fullname']); ?>" size="50" /></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" value="<?php echo htmlspecialchars(@$_REQUEST['email']); ?>" size="50" /></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" name="username" value="<?php echo htmlspecialchars(@$_REQUEST['username']); ?>" size="50" /></td>
	</tr>

	<tr><td colspan="2">&nbsp;</td></tr>

	<tr>
		<td>Current Password</td>
		<td><input type="password" name="oldPassword" value="<?php echo htmlspecialchars(@$_REQUEST['oldPassword']); ?>" size="50" /></td>
	</tr>
	<tr>
		<td>New Password</td>
		<td><input type="password" name="newPassword1" value="<?php echo htmlspecialchars(@$_REQUEST['newPassword1']); ?>" size="50" /></td>
	</tr>
	<tr>
		<td>New Password (again)</td>
		<td><input type="password" name="newPassword2" value="<?php echo htmlspecialchars(@$_REQUEST['newPassword2']); ?>" size="50" /></td>
	</tr>

	<tr>
		<td colspan="2" align="center">
		  <br /><input class="button" type="submit" name="submit" value="Update profile &gt;&gt;" />
		</td>
	</tr>
	</table>

</form><br/>
<!-- /EDIT PROFILE FORM -->


<!-- REMOVE PROFILE FORM -->
<div style="border: 1px solid #000; background-color: #EEE; padding: 20px; width: 500px">
  <b>Delete Account</b>
  <p>If you want to delete your account you can do so here.<br/>
  Please note that all data will be lost and this is irreversible.</p>

  <form method="post" action="?" onsubmit="return confirm('Are you sure you want to delete your account?')">
  <input type="submit" name="deleteAccount" value="Delete Account" />
  </form>
</div>
<!-- /REMOVE PROFILE FORM -->