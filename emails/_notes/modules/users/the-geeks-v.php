<?php include('the-geeks-c.php'); ?>

<?php if(checkForNum()): ?>
	<?php $geek = loadGeek($num); ?>
	<?php $articlesByUser = loadArticlesSingle($geek); ?>
	<div class="row-fluid">
		<div class="span3">
			<?php foreach($geek['image'] as $k=>$v): ?>
				<img src="<?php echo $v['urlPath'] ?>" width="<?php echo $v['width'] ?>" height="<?php echo $v['height'] ?>" alt=""/>
			<?php endforeach ?>
			<p>Recent Articles:</p>
			<ul class="recent-articles"><?php foreach($articlesByUser as $art): ?>
				<li><a href="article-viewer.php?num=<?php echo $art['num'] ?>"><?php echo $art['title'] ?></a></li>
			<?php endforeach ?></ul>
			<br />
			<p>Last Login: <?php echo date("D, M jS, Y g:i:s a", strtotime($geek['lastLoginDate'])) ?></p>
		</div>
		<div class="span9">
			<h1><?php echo htmlencode($geek['username']) ?></h1>
			<p>Name: <?php echo htmlencode($geek['fullname']) ?></p>
			<p>Title: <?php echo htmlencode($geek['title']) ?></p>
			<p>website: <?php echo htmlencode($geek['website']) ?></p>
			<p>Email: <?php echo htmlencode($geek['email']) ?></p>
			<p>youtube channel: <?php echo htmlencode($geek['youtube_channel']) ?></p>
			<p>Bio: <?php echo htmlencode($geek['bio']) ?><br/></p>
			<p>Favorite Games: <?php echo htmlencode($geek['favorite_games']) ?><br/></p>
			<p>Favorite Movies: <?php echo htmlencode($geek['favorite_movies']) ?><br/></p>
		</div>
	</div>
<?php else: ?>
	<?php $split = loadAllGeeks(); ?>
	<?php $geeks = $split[0]; ?>
	<?php $metadata = $split[1]; ?>
	<?php $articlesByUser = loadArticlesMultiple($geeks, $metadata); ?>
	<?php foreach ($geeks as $record): ?>
		<div class="row-fluid">
			<div class="span12" id="article-listing">
				<div class="row-fluid">
					<div class="span3">
						<?php foreach ($record['image'] as $index => $upload): ?>
							<a href="the-geeks.php?num=<?php echo $record['num'] ?>"><img src="<?php echo $upload['thumbUrlPath'] ?>" width="<?php echo $upload['thumbWidth'] ?>" height="<?php echo $upload['thumbHeight'] ?>" alt="" style="margin: 10px; float: left;"  /></a>
						<?php endforeach ?>
					</div>
					<div class="span9">
						<h3><a href="the-geeks.php?num=<?php echo $record['num'] ?>"><?php echo htmlencode($record['username']) ?><a href="the-geeks.php?num=<?php echo $record['num'] ?>"></a></h3>
						<h4><?php echo htmlencode($record['title']) ?></h4>
						Recent Articles:
						<ul class="recent-articles"><?php foreach($articlesByUser[$record['username']] as $art): ?>
							<li><a href="article-viewer.php?num=<?php echo $art['num'] ?>"><?php echo $art['title'] ?></a></li>
						<?php endforeach ?></ul>
					</div>
				</div>
			</div>
		</div>
		<hr />
	<?php endforeach ?>
<?php endif ?>