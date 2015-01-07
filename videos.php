<?php include('/home4/fauxgeek/www/dev/includes/cms-library.php'); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Fauxgeek.com - Where Geeks Come to Die</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-width=1.0">
		
		<!-- CSS -->
		<link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css" />
		<link rel="stylesheet" href="css/your-face.css">
		
		<!-- Scripts (Hacking starts here) -->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="scripts/bootstrap.js"></script>
		<!--script src="scripts/video-loader.js" type="text/javascript"></script-->
	</head>

	<body>
		<?php include('/home4/fauxgeek/www/dev/includes/header.php'); ?>
		<div class="container">
			<div class="row-fluid">
				<div class="span8 well">
					<?php include('/home4/fauxgeek/www/dev/modules/videos/videos-v.php'); ?>
				</div>
				<div class="span4">
					<?php include('/home4/fauxgeek/www/dev/includes/right-column.php'); ?>
				</div>
			</div>
			<div class="row">
				<?php include('/home4/fauxgeek/www/dev/includes/lower-boxes.php'); ?>
			</div>
			<hr>
			<?php include('/home4/fauxgeek/www/dev/includes/footer.php'); ?>
		</div>
	</body>
</html>