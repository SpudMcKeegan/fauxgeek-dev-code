<?php include('signup-c.php'); ?>
<h1>Sample User Signup Form</h1>

<!-- USER SIGNUP FORM -->
  <?php if (@$errorsAndAlerts): ?>
	<div style="color: #C00; font-weight: bold; font-size: 14px; font-family: arial;"><br/>
	  <?php echo $errorsAndAlerts; ?><br/>
	</div>
  <?php endif ?>

<?php if ($showSignupForm): ?>
	<form method="post" action="?">
	<input type="hidden" name="save" value="1" />

	<table border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo htmlspecialchars(@$_REQUEST['email']); ?>" size="50" /></td>
		</tr>
		<tr>
			<td>Username:</td>
			<td><input type="text" name="username" value="<?php echo htmlspecialchars(@$_REQUEST['username']); ?>" size="50" /></td>
		</tr>
		<tr>
			<td>Password:</td>	
			<td><input type="password" name="password" value="" size="50" /></td>
		</tr>
		<tr>
			<td>Password:<br /><span style="font-size:8">(again)</span></td>	
			<td><input type="password" name="password2" value="" size="50" /></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input class="button" type="submit" name="submit" value="Sign up &gt;&gt;" /></td>
		</tr>
  </table>

  </form>
<?php endif ?>
<!-- /USER SIGNUP FORM -->