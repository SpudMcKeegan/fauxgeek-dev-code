<script>
	//I'm lazy and stupid. This is the best way of adding an active class to the current page
	var loc = document.URL;
	
	$(document).ready(function(){
		if(loc.indexOf(".php") <= 0){
			$('#gnav li:nth-child(1)').addClass("active");
			$('#fnav li:nth-child(1)').addClass("active");
		}else{
			$('li a').each(function(){
				if(loc.indexOf($(this).attr('href')) > 0){
					$(this).parent().addClass("active");
				}
			});
		}
	});
</script>

<div class="hero-unit">
	<div class="container">
		<div class="row-fluid">
			<div class="span4">
				<a href="/home4/fauxgeek/www/dev/"><img src="images/logo.png" /></a>
			</div>
			<div class="span8">
				<?php include('/home4/fauxgeek/www/dev/includes/social-media-header.php'); ?>
			</div>
		</div>
	</div>
</div>

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-th-list"></span>
			</a>
			<div class="nav-collapse collapse">
				<ul class="nav" id="gnav">
					<li><a href="/home4/fauxgeek/www/dev/index.php">Home</a></li>
					<li><a href="/home4/fauxgeek/www/dev/geek-stuff.php">Geek Stuff</a></li>
					<li><a href="/home4/fauxgeek/www/dev/games.php">Video Games</a></li>
					<li><a href="/home4/fauxgeek/www/dev/movies.php">Movies</a></li>
					<li><a href="/home4/fauxgeek/www/dev/fauxtography.php">Fauxtography</a></li>
					<li><a href="/home4/fauxgeek/www/dev/videos.php">Videos</a></li>
					<li><a href="/home4/fauxgeek/www/dev/podcasts.php">Podcasts</a></li>
					<li><a href="/home4/fauxgeek/www/dev/the-geeks.php">The Geeks</a></li>
				</ul>
				<?php if(@$CURRENT_USER): ?>
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $CURRENT_USER['username']; ?> <strong class="caret" /></strong></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_PROFILE_URL']; ?> ">Profile</a></li>
								<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_EDIT_ARTICLES_URL'] ?>">Edit Articles</a></li><?php endif ?>
								<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_NEW_VIDEO_URL'] ?>">Post a new Video</a></li><?php endif ?>
								<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_USER_LIST_URL']  ?>">User List</a></li><?php endif ?>
								<li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_EDIT_PROFILE_URL']; ?> ">Settings</a></li>
								<li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_LOG_OUT_URL']; ?>">Logout</a></li>
							</ul>
						</li>
					</ul>
				<?php else: ?>
					<ul class="nav pull-right">
						<li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_LOGIN_FORM_URL']; ?>">Login</a></li>
						<li><a href="<?php echo $GLOBALS['WEBSITE_LOGIN_SIGNUP_URL']; ?>">Sign Up</a></li>
					</ul>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>