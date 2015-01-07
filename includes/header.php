<script>
	//I'm lazy and stupid. This is the best way of adding an active class to the current page
	var loc = document.URL;
	
	$(function(){
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

<!--div class="hero-unit">
	<div class="container">
		<div class="row-fluid">
			<div class="span4">
				<a href="/dev/"><img src="images/logo.png" /></a>
			</div>
			<div class="span8">
				<?php include('social-media-header.php'); ?>
			</div>
		</div>
	</div>
</div-->

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-th-list"></span>
			</a>
			<div class="nav-collapse collapse">
				<ul class="nav" id="gnav">
					<li><a href="/dev/index.php">Home</a></li>
					<li><a href="/dev/geek-stuff.php">Geek Stuff</a></li>
					<li><a href="/dev/games.php">Video Games</a></li>
					<li><a href="/dev/movies.php">Movies</a></li>
					<!--li><a href="/dev/fauxtography.php">Fauxtography</a></li-->
					<li><a href="/dev/videos.php">Videos</a></li>
					<li><a href="/dev/podcasts.php">Podcasts</a></li>
					<li><a href="/dev/the-geeks.php">The Geeks</a></li>
				</ul>
				<?php if(@$CURRENT_USER): ?>
					<ul class="nav pull-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $CURRENT_USER['username']; ?> <strong class="caret" /></strong></a>
							<ul class="dropdown-menu">
								<li><a href="/dev/profile.php">Profile</a></li>
								<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="/dev/admin/edit-articles.php">Edit Articles</a></li><?php endif ?>
								<?php if($CURRENT_USER['geek'] == 1 || $CURRENT_USER['video'] == 1): ?><li><a href="/dev/admin/video-admin.php">Post a new Video</a></li><?php endif ?>
								<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="/dev/admin/userlist.php">User List</a></li><?php endif ?>
								<li><a href="/dev/profile.php">Settings</a></li>
								<li><a href="/dev/log-out.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				<?php else: ?>
					<ul class="nav pull-right">
						<li><a href="/dev/log-in.php">Login</a></li>
						<li><a href="/dev/signup.php">Sign Up</a></li>
					</ul>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>