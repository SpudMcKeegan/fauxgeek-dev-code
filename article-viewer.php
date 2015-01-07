<?php include('includes/cms-library.php'); ?>
<!DOCTYPE html>
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
	</head>

	<body>
		<?php include('includes/header.php'); ?>
		<div class="container">
			<div class="row-fluid">
				<div class="span8">
					<?php include('modules/article-viewer/article-viewer-v.php'); ?>
				</div>
				<div class="span4">
					<?php include('includes/right-column.php'); ?>
				</div>
			</div>
			<div class="row">
				<?php include('includes/lower-boxes.php'); ?>
			</div>
			<hr>
			<?php include('includes/footer.php'); ?>
		</div>
	</body>
</html>