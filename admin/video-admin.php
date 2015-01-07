<?php include('/home4/fauxgeek/www/dev/includes/cms-library.php'); ?>
<?php if(@$CURRENT_USER['geek'] != 1){header('LOCATION: /dev/');} ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Fauxgeek.com - Where Geeks Come to Die</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-width=1.0">
		
		<!-- CSS -->
		<link rel="stylesheet" href="/dev/css/bootstrap-responsive.css" type="text/css" />
		<link rel="stylesheet" href="/dev/css/your-face.css">
		
		
		<!-- Scripts (Hacking starts here) -->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="/dev/scripts/bootstrap.js"></script>
	</head>

	<body>
		<?php include('/home4/fauxgeek/www/dev/includes/header.php'); ?>
		<div class="container">
			<div class="row-fluid">
				<div class="span3 well">
					<?php include('/home4/fauxgeek/www/dev/modules/admin/sidebar.php'); ?>
				</div>
				<div class="span9">
					<?php include('/home4/fauxgeek/www/dev/modules/admin/edit-videos-v.php'); ?>
				</div>
			</div>
			<hr />
			<?php include('/home4/fauxgeek/www/dev/includes/footer.php'); ?>
		</div>
	</body>
</html>