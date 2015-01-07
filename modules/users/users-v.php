<?php include('users-c.php'); ?>

<?php if(checkForNum()): ?>
	<?php $user = loadUser($num); ?>
	<?php $articlesByUser = loadArticlesSingle($user); ?>
	<div class="row-fluid">
		<div class="span3">
			<?php foreach($user['image'] as $k=>$v): ?>
				<img src="<?php echo $v['urlPath'] ?>" width="<?php echo $v['width'] ?>" height="<?php echo $v['height'] ?>" alt=""/>
			<?php endforeach ?>
			<p>Recent Articles:</p>
			<ul class="recent-articles"><?php foreach($articlesByUser as $art): ?>
				<li><a href="article-viewer.php?num=<?php echo $art['num'] ?>"><?php echo $art['title'] ?></a></li>
			<?php endforeach ?></ul>
			<br />
			<p>Last Login: <?php echo date("D, M jS, Y g:i:s a", strtotime($user['lastLoginDate'])) ?></p>
		</div>
		<div class="span9">
			<h1><?php echo htmlencode($user['username']) ?></h1>
			<p>Name: <?php echo htmlencode($user['fullname']) ?></p>
			<p>Title: <?php echo htmlencode($user['title']) ?></p>
			<p>website: <?php echo htmlencode($user['website']) ?></p>
			<p>Email: <?php echo htmlencode($user['email']) ?></p>
			<p>youtube channel: <?php echo htmlencode($user['youtube_channel']) ?></p>
			<p>Bio: <?php echo htmlencode($user['bio']) ?><br/></p>
			<p>Favorite Games: <?php echo htmlencode($user['favorite_games']) ?><br/></p>
			<p>Favorite Movies: <?php echo htmlencode($user['favorite_movies']) ?><br/></p>
		</div>
	</div>
<?php else: ?>
	<?php $split = loadAllUsers(); ?>
	<?php $users = $split[0]; ?>
	<?php $metadata = $split[1]; ?>
	<div class="row-fluid">
		<?php foreach ($users as $record): ?>
			<div class="span2 user">
				<?php foreach ($record['image'] as $index => $upload): ?>
					<a style="margin: 0px 10%;" href="users.php?num=<?php echo $record['num'] ?>"><div class="user-pic" style="background: url('<?php echo $upload['urlPath'] ?>') center;"></div></a>
				<?php endforeach ?>
				<p class="username"><a href="users.php?num=<?php echo $record['num'] ?>"><?php echo htmlencode($record['username']) ?><a href="the-geeks.php?num=<?php echo $record['num'] ?>"></a></p>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>