<?php include('/home4/fauxgeek/www/dev/includes/cms-library.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Fauxgeek.com - Where Geeks Come to Die</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-width=1.0">
		
		<!-- CSS -->
		<link rel="stylesheet" href="/dev/css/your-face.css">
		
		<!-- Scripts (Hacking starts here) -->
		<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
		<script src="/dev/scripts/bootstrap.js"></script>
		<script src="/dev/modules/article-viewer/record-loader.js" type="text/javascript"></script>
		<script>var subject = "all";</script>
		<script>var view = "main";</script>
	</head>

	<body>
		<?php include('/home4/fauxgeek/www/dev/includes/header.php'); ?>
		<div class="container">
			<div class="row-fluid">
				<div class="span8 well">
					<div class="row-fluid">
						<?php include('/home4/fauxgeek/www/dev/modules/carousel/carousel-v.php'); ?>
					</div>
					<div class="row-fluid">
						<div class="span12" id="article-listing">
							
						</div>
					</div>
					<div class="row-fluid" >
						<div id="show-more" align="center" class="span12">Show More</div>
					</div>
				</div>
				<div class="span4 hidden-phone hidden-tablet">
					<?php include('/home4/fauxgeek/www/dev/includes/right-column.php'); ?>
				</div>
			</div>
			<div class="row" id="footerbuckets">
				<?php include('/home4/fauxgeek/www/dev/includes/lower-boxes.php'); ?>
			</div>
			<hr />
			<?php include('/home4/fauxgeek/www/dev/includes/footer.php'); ?>
		</div>
	</body>
</html>