<ul class="col-sm-3 col-md-2 sidebar">
	<h3>Admin:</h3>
	<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="/dev/admin/edit-articles.php">Edit Articles</a></li><?php endif ?>
	<?php if($CURRENT_USER['geek'] == 1 || $CURRENT_USER['video'] == 1): ?><li><a href="/dev/admin/video-admin.php">Post a new Video</a></li><?php endif ?>
	<?php if($CURRENT_USER['geek'] == 1): ?><li><a href="/dev/admin/userlist.php">User List</a></li><?php endif ?>

	<h3>Other</h3>
	<li><a href="/dev/profile.php">Settings</a></li>
	<li><a href="/dev/log-out.php">Logout</a></li>
</ul>