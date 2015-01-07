<?php include('includes/pw-request-c.php'); ?>
<div class="row-fluid">
	<h1>Forgot your password?</h1>
	<p>Don't worry, you probably have a few of them lying around because it would ridiculous to use the same password on multiple sites. So it's completely understandable that you forgot your password to this website. Even though you hurt our feelings... we'll get over it. Maybe</p>

	<!-- PASSWORD REMINDER FORM -->
	<?php if (@$errorsAndAlerts): ?>
		<div style="color: #C00; font-weight: bold; font-size: 14px; font-family: arial;"><br/>
		<?php echo $errorsAndAlerts; ?><br/>
		</div>
	<?php endif ?>

	<?php if (!@$CURRENT_USER): ?>
		<p>Just enter your username or email address to reset your password.</p>

		<form action="?" method="post">
			<input type="hidden" name="action" value="sendPasswordReminder" />
			Email or username:
			<input type="text" name="usernameOrEmail" value="<?php echo htmlspecialchars(@$_REQUEST['usernameOrEmail']) ?>" size="20" />
			<input type="submit" name="submit" value="Lookup" />
		</form>
	<?php endif ?>
	<!-- /USER LOGIN FORM -->
</div>
<div class="row-fluid">
	<div id="show-more" class="span12">Show More</div>
</div>